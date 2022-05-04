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
var keys_info = [];
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

window.addInfo = function(elem) {
    let tag = elem.querySelector("input");
    if (tag.value === '') {
        window.alert('inserisci l\'etichetta!');
        return;
    }
    if (keys_info.includes(tag.value)) {
        window.alert('esiste già questa etichetta!');
        return;
    }
    keys_info.push(tag.value);
    let clone = info_template.content.firstElementChild.cloneNode(true);
    let label = clone.querySelector("label");
    let input = clone.querySelector("input");
    input.name = "info[" + tag.value + "]";
    input.id = "info[" + tag.value + "]";
    input.value = '';
    label.htmlFor = "info[" + tag.value + "]";
    label.textContent = tag.value;
    info_container.appendChild(clone);
    tag.value = '';
}

window.removeInfo = function(elem) {
    let key = elem.querySelector('label');
    keys_info.splice(keys_info.indexOf(key.value),1);
    elem.remove();
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

window.imagePreview = function(poster, id_preview) {
    var image_preview = document.getElementById(id_preview);
    const [file] = poster.files;
    if (file) {
        image_preview.src = URL.createObjectURL(file);
    }
}

window.onlyAccept = function(button) {
    if (!button.classList.contains('text-blue-600')) {
        button.classList.add('text-blue-600', 'bg-gray-200')
        document.getElementById('payments-button').classList.remove('text-blue-600', 'bg-gray-200');
        var acceptButtons = document.querySelectorAll("button#accept-button");
        var payButtons = document.querySelectorAll("button#pay-button")
        for (var i = 0; i < acceptButtons.length; i++) {
            acceptButtons[i].classList.remove('hidden');
            payButtons[i].classList.add('hidden');
        }
    }
}

window.alsoPayments = function(button) {
    if (!button.classList.contains('text-blue-600')) {
        button.classList.add('text-blue-600', 'bg-gray-200')
        document.getElementById('requests-button').classList.remove('text-blue-600', 'bg-gray-200');
        var acceptButtons = document.querySelectorAll("button#accept-button");
        var payButtons = document.querySelectorAll("button#pay-button")
        for (var i = 0; i < acceptButtons.length; i++) {
            acceptButtons[i].classList.add('hidden');
            payButtons[i].classList.remove('hidden');
        }
    }
}

/*var httpRequest;

window.searchSoci = function (input) {
    var search = input.value;
    if (search) {
        httpRequest = new XMLHttpRequest();

        if (!httpRequest) {
            alert('Giving up :( Cannot create an XMLHTTP instance');
            return false;
        }
        httpRequest.onreadystatechange = alertContents;
        httpRequest.open('GET', 'soci/ajax-search');
        httpRequest.send();
    }
}

function alertContents() {
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
        if (httpRequest.status === 200) {
            alert(httpRequest.responseText);
        } else {
            alert('There was a problem with the request.');
        }
    }
}
*/
