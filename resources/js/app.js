require('./bootstrap');

// TODO: dividere javascript public e admin
// TODO: rimuovere alpine

const menu = document.getElementById('menu');
const l1 = document.getElementById('l1');
const l2 = document.getElementById('l2');
const l3 = document.getElementById('l3');

window.burgerButton = function () {
    menu.classList.toggle('hidden');
    l1.classList.toggle('translate-y-1.5');
    l1.classList.toggle('rotate-45');
    l3.classList.toggle('hidden');
    l2.classList.toggle( '-rotate-45');
    l2.classList.toggle('-translate-y-1.5');
}

