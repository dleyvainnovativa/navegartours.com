
function removeExp(span){
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
        content.onclick = function() {
  removeExp(this);
};

        content.setAttribute("exp-id", id);
        list.appendChild(content);
    }
}

// document.getElementById("book-btn").addEventListener("click", book);

function book(event){
    event.preventDefault();
    console.log("book");
    let experiences_list  = document.getElementById("experience_list");
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

let message = `Hola, quiero reservar un yate con los siguientes datos:
- Embarcación: ${boat}
- Fecha y hora: ${date}
- Número de pasajeros: ${passenger}
- Ruta seleccionada: ${route}
- Experiencias seleccionadas:
${experiencesText}`;

let phone = "2291645189"; // Replace with the number
let url = `https://wa.me/${phone}?text=${encodeURIComponent(message)}`;

window.open(url, "_blank");



}


window.addExperience = addExperience;
window.book = book;
window.removeExp = removeExp;
