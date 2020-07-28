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
    xmlhttp.open("GET","/ApolloUndici/public/pesce.php?q="+stringa,true);
    xmlhttp.send();
}

function inserisciDati(id, titolo) {
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
       if (this.readyState==4 && this.status==200) {
       document.getElementById("form-event").innerHTML=this.responseText;
       document.getElementById("results").innerHTML = "";
       document.getElementById("event-content").value = titolo;
       }
   }
   xmlhttp.open("GET","/ApolloUndici/public/ADAG.php?route=find-film&id="+id,true);
   xmlhttp.send();
}