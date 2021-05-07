function accetta_socio(id_socio) {
    var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            var risposta = JSON.parse(this.responseText);
            
            //rimozione socio se operazione corretta
            if (risposta == true) {
                document.getElementById(id_socio).remove();
            }
        }
    }
    xmlhttp.open("GET","/ApolloUndici/public/ajax.php?route=socio/accettazione&id_socio="+id_socio,true);
    xmlhttp.send();
} 