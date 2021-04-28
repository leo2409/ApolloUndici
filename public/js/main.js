const menuBtn = document.querySelector('.burger_Btn');
const line1 = document.querySelector('.line1');
const line2 = document.querySelector('.line2');
const line3 = document.querySelector('.line3');
const nav = document.querySelector('.hide-ul');
const locandine = document.querySelectorAll('.evento');
const informazioni = document.querySelectorAll('.informazioni');
const date = document.querySelectorAll('.data');

for (let i = 0; i < date.length; i++) {
    var data = date[i].innerHTML;
    data = data.replace(/Monday/, 'Lunedì');
    data = data.replace(/Tuesday/, 'Martedì');
    data = data.replace(/Wednesday/, 'Mercoledì');
    data = data.replace(/Thursday/, 'Giovedì');
    data = data.replace(/Friday/, 'Venerdì');
    data = data.replace(/Suturday/, 'Sabato');
    data = data.replace(/Sunday/, 'Domenica');
    data = data.replace(/Jan/, 'gen');
    data = data.replace(/Feb/, 'feb');
    data = data.replace(/Mar/, 'mar');
    data = data.replace(/Apr/, 'apr');
    data = data.replace(/May/, 'may');
    data = data.replace(/Jun/, 'giu');
    data = data.replace(/Jul/, 'lug');
    data = data.replace(/Aug/, 'ago');
    data = data.replace(/Sept/, 'set');
    data = data.replace(/Oct/, 'ott');
    data = data.replace(/Nov/, 'nov');
    data = data.replace(/Dec/, 'dic');
    date[i].innerHTML = data;
}

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






