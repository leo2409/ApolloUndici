//VALIDO LO ELABORIAMO SOLO CON JAVASCRIPT
function ricerca_soci() {
    var nome = document.getElementById("nome").value;
    var cognome = document.getElementById("cognome").value;
    var valido = document.getElementById("nome").checked;
    var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            document.querySelector('tbody').innerHTML=this.responseText;
        }
    }
    xmlhttp.open("GET","/ApolloUndici/public/ajax.php?route=socio/ricerca&nome=" + nome + "&cognome=" + cognome + "&valido=" + valido, true);
    xmlhttp.send();
}

function paga_socio(id_socio) {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            ricerca_soci();
        }
    }
    xmlhttp.open("GET","/ApolloUndici/public/ajax.php?route=socio/paga&id_socio=" + id_socio, true);
    xmlhttp.send();
}

function saveTessara() {
    var xmlhttp = new XMLHttpRequest();
    var form = document.getElementById('form-tessera');
    var formData = new FormData(form);

    xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            ricerca_soci();
            form.reset();
            alert(this.responseText);
        }
    }

    xmlhttp.open('POST', '/ApolloUndici/public/ajax.php?route=socio/save', true);
    xmlhttp.send(formData);
}

function sociExcel() {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            alert(this.responseText);
        }
    }

    xmlhttp.open('GET', '/ApolloUndici/public/ajax.php?route=socio/excel', true);
    xmlhttp.send();
}