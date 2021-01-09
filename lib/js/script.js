var pm = document.getElementsByClassName('pflichtmarker');
var fm = document.getElementsByClassName('fehlermeldung');
var resOb = new XMLHttpRequest();
function plausi(f){
    var fehler = 0;
    for (var i=0; i < f.length -1; i++){
        if (f[i].value == "") {
            fehler++;
            pm[i].getElementsByClassName.collor = "#6c0610";
            fm[i].innerHTML = "Pflichtfeld";
            window.setTimeout(re, 3000);
        }
    };
    if (fehler > 0) {
        document.getElementById("meldung").style.visibility = "visible";
        document.getElementById("meldung").innerHTML = 
         "Alle Pflichtfelder müssen ausgefüllt werden";

        return false;
    }
}
function re() {
    for (var i = 0; i < pm.length; i++) {
        pm[i].style.collor = "#145d05";
    }
    for (var i = 0; i < fm.length; i++) {
        fm[i].innerHTML = "";
    }
    document.getElementById("meldung").style.visibility = "hidden";
    document.getElementById("meldung").innerHTML = "";
}
function eingabefehler(key){
    var m = document.getElementById("meldung");
    if (key == 0) {
        resOb.open('get', 'logintext.txt', true);
    } else {
        resOb.open('get', 'registrierungstext.txt', true);
    }
    resOb.onreadystatechange = function(){
        
        if (resOb.readyState == 4){
            m.style.visibility = "visible";
            m.style.textAlign = "left";
            m.innerHTML = resOb.responseText;
            window.setTimeout(re, 6000);
        }
    };
    resOb.send(null);
}        