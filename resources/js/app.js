require('./bootstrap');

window.burgerButton = function () {
    var menu = document.getElementById('menu');
    var l1 = document.getElementById('l1');
    var l2 = document.getElementById('l2');
    var l3 = document.getElementById('l3');
    menu.classList.toggle('hidden');
    l1.classList.toggle('translate-y-1.5');
    l1.classList.toggle('rotate-45');
    l3.classList.toggle('hidden');
    l2.classList.toggle( '-rotate-45');
    l2.classList.toggle('-translate-y-1.5');
}

