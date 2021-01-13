
var detailber = document.getElementById('detailbereich');
function details(b){
    detailber.innerHTML = "<table class='rezepttab'><tr>" +
        "<td class='detailbildcontainer'>" + 
        "<img class='detailbild' src='images/" + b + "'/>" +
        "</td><td id='detailinfo'></td></tr></table>" +
        "<form id='rezeptformular'>" +
        "<h3>Ihr Vorschlag für ein Rezept</h3>" +
        "<textarea cols='105' rows='4'" +
        " id='rezeptvorschlag'></textarea>" +
        "<br/><input class='hlink' " +
        "type='button' value='Vorschlag abgeben' " +
        "onclick=rezepteintragen('" + b + "')></form>";
    
    var m = document.getElementById('detailinfo');
    resOb.open('get', 'bemerkungen.class.php?bild=' + b, true);
    resOb.onreadystatechange = function() {
        if (resOb.readyState == 4) {
            m.innerHTML = resOb.responseText;
        }
    };
    resOb.send(null);
}

function rezepte(b) {
    detailber.innerHTML = "<table class='rezepttab'><tr>" +
        "<td class='detailbildcontainer'>" +
        "<img class='detailbild' src='images/" + b + "'/>" +
        "</td><td id='detailinfo'></td></tr></table>";
    var m = document.getElementById("detailinfo");
    resOb.open('get', 'rezepteanzeigen.class.php?bild=' + b, true);
    resOb.onreadystatechange = function() {
        if (resOb.readyState == 4) {
            m.innerHTML = resOb.responseText;
        }
    };
    resOb.send(null);
}

function rezepteintragen(b) {
    var m = document.getElementById('detailinfo');
    if (document.getElementById("rezeptvorschlag").value == "") {
        var m_alt=m.innerHTML;
        m.innerHTML = "<h3 class='fehlermeldung'>" +
            "Sie müssen schon einen Vorschlag machen, " +
            "wenn das Formular abgeschickt werden soll!</h3>";
        
        setTimeout(function() {
            re(m_alt);
        }, 4000);
        return;
    }
    resOb.open('get', 'rezepteeintragen.class.php?bild=' + b +
        "&antwort=" + document.getElementById("rezeptvorschlag").value, true);
    resOb.onreadystatechange = function() {
        if (resOb.readyState == 4) {
            m.innerHTML = resOb.responseText;
            document.getElementById("rezeptvorschlag").value = "";
        }
    };
    resOb.send(null);
};

function re(alt) {
    document.getElementById('detailinfo').innerHTML = alt;
}