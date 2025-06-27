let lastScrollY = window.scrollY;
window.addEventListener('scroll', function () {
    var header = document.getElementById('header');
    var contact = document.getElementById('contact_btn');
    var navbar = document.getElementById('main-header');
    let currentScrollY = window.scrollY;

    if (window.scrollY > 50) {
        contact.classList.add("btn-outline-dark");
        contact.classList.remove("btn-outline-light");
        header.classList.add('bg-white');
        header.classList.add('navbar-light');
        header.classList.add('shadow-sm');
        header.classList.remove('bg-transparent');
        header.classList.remove('navbar-dark');
    } else {
        contact.classList.remove("btn-outline-dark");
        contact.classList.add("btn-outline-light");
        header.classList.remove('bg-white');
        header.classList.remove('shadow-sm');
        header.classList.remove('navbar-light');
        header.classList.add('bg-transparent');
        header.classList.add('navbar-dark');
    }
    lastScrollY = currentScrollY;
});