function showResult(stringa) {
    if (stringa.length==0) {
        document.getElementById("results").innerHTML="";
        return;
    }
    var xmlhttp=new XMLHttpRequest();
     xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            document.getElementById("results").innerHTML=this.responseText;
        }
    }
    xmlhttp.open("GET","/ApolloUndici/public/ajax.php?route=ajaxFilmSearch&s="+stringa,true);
    xmlhttp.send();
}

function inserisciDati(id) {
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
       if (this.readyState==4 && this.status==200) {
            document.getElementById("form-event").innerHTML=this.responseText;
            document.getElementById("event-content").value = document.getElementById(id).innerHTML;
            document.getElementById("results").innerHTML = "";
       }
   }
   xmlhttp.open("GET","/ApolloUndici/public/ADAG.php?route=find-film&id="+id,true);
   xmlhttp.send();
}


function elimina_prenotazione(id_prenotazione) {
    var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            var risposta = JSON.parse(this.responseText);
            alert(risposta);
            if (risposta == 'eliminato correttamente') {
                document.getElementById(id_prenotazione).remove();
            }
        }
    }
    xmlhttp.open("GET","/ApolloUndici/public/ajax.php?route=prenotazione/elimina&id_prenotazione="+id_prenotazione,true);
    xmlhttp.send();
} 

