var pm = document.getElementsByClassName('pflichtmarker');
var fm = document.getElementsByClassName('fehlermeldung');
function plausi(f){
    var fehler = 0;
    for (var i=0; i<f.length -1; i++){
        if (f[i].value == "") {
            fehler++;
            pm[i].getElementsByClassName.collor = "#6c0610";
            fm[i].innerHTML = "Pflichtfeld";
            window.setTimeout(re, '3000');
        }
    };
    if (fehler > 0) {
        document.getElementsByID("meldung").style.visibility = "visible";
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
}