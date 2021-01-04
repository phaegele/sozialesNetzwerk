function plausi(f){
    var fehler = 0;
    for (var i=0; i<f.length -1; i++){
        if (f[i].value == "")
            fehler++;
    };
    if (fehler > 0) {
        alert ('Alle Pflichtfelder müssen asugefüllt werden');
        return false;
    }
}