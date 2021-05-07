const menuBtn = document.querySelector('.burger_btn');
const line1 = document.querySelector('.line1');
const line2 = document.querySelector('.line2');
const line3 = document.querySelector('.line3');
const nav = document.querySelector('.ul');
const locandine = document.querySelectorAll('.evento');
const informazioni = document.querySelectorAll('.informazioni');
const date = document.querySelectorAll('.data');



for (let i = 0; i < locandine.length; i++) {

    locandine[i].addEventListener("click", function() {
        for (let x = 0; x < informazioni.length; x++) {
            informazioni[x].classList.remove('open');
            
        }
        informazioni[i].classList.add('open');
        location.href = "#" + informazioni[i].id;
    });
}

let showMenu = false;
menuBtn.addEventListener('click', toggleMenu);

function toggleMenu() {
if (!showMenu) {
        menuBtn.classList.add('open');
        line1.classList.add('open');
        line2.classList.add('open');
        line3.classList.add('open');
        nav.classList.add('open');

        showMenu = true;
    } else {
        menuBtn.classList.remove('open');
        line1.classList.remove('open');
        line2.classList.remove('open');
        line3.classList.remove('open');
        nav.classList.remove('open');

        showMenu = false;
    }
}






