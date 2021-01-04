window.onload = function() {
    document.getElementById("regform").onsubmit = function() {
        var f = document.getElementsByTagName('input');
        var fehler = 0 ;
        for (var i =0; i < f.length -1; i++) {
            if (f[i].value =="")
                fehler++;
        };
        if (fehler>0){
            alert('Alle Pflichtfelder müssen ausgefüllt sein');
            return false;
        
        }
    };
};