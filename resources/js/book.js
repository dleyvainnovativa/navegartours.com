function removeExp(span) {
    console.log(span);
    span.remove();
}

function addExperience(id, name) {
    console.log(id);
    console.log(name);
    let list = document.getElementById("experience_list");
    // list.innerHTML = "";
    let flag = true;
    for (let span of list.children) {

        if (span.getAttribute("exp-id") == id) {
            flag = false;
        }
    };
    if (flag) {
        let content = document.createElement("span");
        content.classList.add("badge");
        content.classList.add("exp-badge");
        content.classList.add("text-bg-primary");
        content.classList.add("mx-1");
        content.textContent = name;
        content.onclick = function () {
            removeExp(this);
        };

        content.setAttribute("exp-id", id);
        list.appendChild(content);
    }
}

// document.getElementById("book-btn").addEventListener("click", book);

function book(event) {
    event.preventDefault();
    console.log("book");
    const form = event.target.closest("form");
    const isValid = form.checkValidity();
    form.classList.add('was-validated');
    if (isValid) {
        let experiences_list = document.getElementById("experience_list");
        let experiences = [];

        for (let exp of experiences_list.children) {
            experiences.push(exp.textContent);
        };

        let experiencesText = "Ninguna";
        if (experiences.length > 0) {
            experiencesText = experiences.map(e => `        - ${e}`).join("\n");
        }

        let boat = document.getElementById("book-boat").value;
        let date = document.getElementById("book-date").value;
        let passenger = document.getElementById("book-passengers").value;
        let routeSelect = document.getElementById("book-route");
        let route = routeSelect.options[routeSelect.selectedIndex].text;
        let timeSelect = document.getElementById("book-time");
        let time = timeSelect.options[timeSelect.selectedIndex].text;

        let message = `Hola, quiero reservar un yate con los siguientes datos:
- Embarcación: ${boat}
- Fecha y hora: ${date} ${time}
- Número de pasajeros: ${passenger}
- Ruta seleccionada: ${route}
- Experiencias seleccionadas:
${experiencesText}`;

        let phone = "2291216567"; // Replace with the number
        let url = `https://wa.me/${phone}?text=${encodeURIComponent(message)}`;

        window.open(url, "_blank");
    }
}

const reservations = window.reservations || [];




document.addEventListener("DOMContentLoaded", function () {
    const reservations = window.reservations || [];
    const reservationCounts = {};
    reservations.forEach(res => {
        const date = res.date;
        if (!reservationCounts[date]) {
            reservationCounts[date] = 0;
        }
        reservationCounts[date]++;
    });
    flatpickr("#book-date", {
        locale: Spanish,
        dateFormat: "Y-m-d",
        disableMobile: "true",
        minDate: "today",
        maxDate: new Date().fp_incr(365),
        onDayCreate: function (dObj, dStr, fp, dayElem) {
            const dateISO = dayElem.dateObj.toISOString().split("T")[0];
            const count = reservationCounts[dateISO] || 0;

            if (count >= 3) {
                dayElem.classList.add("red-highlight");
            } else if (count >= 1) {
                dayElem.classList.add("yellow-highlight");
            }
        },
        onChange: function (selectedDates, dateStr, instance) {
            const bookTimeSelect = document.getElementById("book-time");
            bookTimeSelect.innerHTML = "";
            if (!dateStr) return;

            const selectedDate = new Date(dateStr);

            const slots = generateTimeSlots(9, 21);

            const now = new Date();

            slots.forEach(time => {
                const optionDateTime = new Date(`${dateStr}T${time}`);
                let conflict = false;

                // If selected date is today, enforce "4 hours from now"
                const minSelectableTimeToday = new Date(now.getTime() + 4 * 60 * 60 * 1000);
                if (selectedDate.toDateString() === now.toDateString() && optionDateTime < minSelectableTimeToday) {
                    conflict = true;
                }

                // For each reservation on that date:
                reservations.forEach(res => {
                    if (res.date === dateStr) {
                        const resStart = new Date(`${res.date}T${res.start_time}`);
                        const resEnd = new Date(`${res.date}T${res.end_time}`);

                        // Rule 1: Prevent overlapping (start time in any reservation period)
                        if (optionDateTime >= resStart && optionDateTime < resEnd) {
                            conflict = true;
                        }

                        // Rule 2: Prevent starting so late you can't fit 4h before the reservation
                        const optionEndTime = new Date(optionDateTime.getTime() + 4 * 60 * 60 * 1000);
                        if (optionEndTime > resStart && optionDateTime < resStart) {
                            conflict = true;
                        }
                    }
                });

                if (!conflict) {
                    const opt = document.createElement("option");
                    opt.value = time;
                    opt.textContent = time;
                    bookTimeSelect.appendChild(opt);
                }
            });

            if (bookTimeSelect.options.length === 0) {
                const opt = document.createElement("option");
                opt.value = "";
                opt.textContent = "No available times";
                bookTimeSelect.appendChild(opt);
            }
        }

    });
});


function generateTimeSlots(startHour = 7, endHour = 21) {
    const slots = [];
    for (let hour = startHour; hour < endHour; hour++) {
        slots.push(`${hour.toString().padStart(2, '0')}:00`);
        slots.push(`${hour.toString().padStart(2, '0')}:30`);
    }
    slots.push(`${endHour.toString().padStart(2, '0')}:00`);
    return slots;
}










window.addExperience = addExperience;
window.book = book;
window.removeExp = removeExp;
