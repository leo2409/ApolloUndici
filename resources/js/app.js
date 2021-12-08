require('./bootstrap');

//ALPINE
import Alpine from 'alpinejs'
window.Alpine = Alpine
Alpine.start()

window.toggleDropDown = function (elem) {
    var aperto = false;
    if (!elem.classList.contains("hidden")) {
        aperto = true;
    }
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (!openDropdown.classList.contains('hidden')) {
            openDropdown.classList.add('hidden');
        }
    }
    if (!aperto) {
        elem.classList.remove("hidden");
    }
}

var info_container = document.querySelector('div#info-container');
var info_template = document.querySelector('template#info-template');
var events_container = document.querySelector('div#events-container');
var date_time_template = document.querySelector('template#date-time-template');
var n_info = document.querySelectorAll("div#info-div").length;
var n_events = 0;

window.addEvent = function (elem) {
    let inputs_old = elem.querySelectorAll("input");
    if (inputs_old[0].value === '' || inputs_old[1].value === '') {
        window.alert('inserisci data e orario')
        return;
    }
    let clone = date_time_template.content.firstElementChild.cloneNode(true);
    let inputs = clone.querySelectorAll("input");
    let spans = clone.querySelectorAll("span");
    n_events++;
    inputs[0].name = "events[" + n_events.toString() + "]" + "[date]";
    inputs[1].name = "events[" + n_events.toString() + "]" + "[time]";
    inputs[0].value = inputs_old[0].value;
    inputs[1].value = inputs_old[1].value;
    spans[0].textContent = inputs_old[0].value;
    spans[1].textContent = inputs_old[1].value;
    inputs_old[0].value = "";
    inputs_old[1].value = "";
    events_container.appendChild(clone);
}

window.addInfo = function() {
    let clone = info_template.content.firstElementChild.cloneNode(true);
    let inputs = clone.querySelectorAll("input");
    let label = clone.querySelectorAll("label");
    n_info++;
    inputs[0].name = "info[" + n_info.toString() + "]" + "[tag]";
    inputs[0].id = "info[" + n_info.toString() + "]" + "[tag]";
    label[0].htmlFor = "info[" + n_info.toString() + "]" + "[tag]";
    inputs[1].name = "info[" + n_info.toString() + "]" + "[body]";
    inputs[1].id = "info[" + n_info.toString() + "]" + "[body]";
    label[1].htmlFor = "info[" + n_info.toString() + "]" + "[tag]";
    info_container.appendChild(clone);
}

window.onclick = function(event) {
    if (!event.target.matches('.edit-icon')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (!openDropdown.classList.contains('hidden')) {
                openDropdown.classList.add('hidden');
            }
        }
    }
}

window.viewDeleteButton = function(elem) {
    var delete_buttons = document.getElementsByClassName("delete-button");
    var i;
    for (i = 0; i < delete_buttons.length; i++) {
        var delete_button = delete_buttons[i];
        if (!delete_button.classList.contains('hidden')) {
            delete_button.classList.add('hidden');
        }
    }
    elem.querySelector('#delete-event-form').classList.remove('hidden');
}

window.onclick = function(event) {
    if (!event.target.parentNode.matches('.event-container') && !event.target.parentNode.parentNode.matches('.event-container')) {
        var delete_buttons = document.getElementsByClassName("delete-button");
        var i;
        for (i = 0; i < delete_buttons.length; i++) {
            var delete_button = delete_buttons[i];
            if (!delete_button.classList.contains('hidden')) {
                delete_button.classList.add('hidden');
            }
        }
    }
}

window.burgerButton = function (burger) {
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

var poster_preview = document.getElementById('poster_preview');

window.posterChange = function(poster) {
    const [file] = poster.files;
    if (file) {
        poster_preview.src = URL.createObjectURL(file);
    }
}
