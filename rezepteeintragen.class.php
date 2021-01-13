<?php
session_start ();
class RezeptEintragen {
    function eintragen_db($bild, $antwort) {
        require_once ("lib/php/db.inc.php");
        $userid = $_SESSION ["name"];
        if ($stmt = $pdo->prepare ("SELECT id_mitglied FROM mitglieder " ."where userid='$userid'" )) {
            $stmt->execute ();
            while ( $row = $stmt->fetch () ) {
                $id_antwortgeber = $row ['id_mitglied'];
                break;
            }
        }
        if ($stmt = $pdo->prepare ("SELECT id_frage,id_mitglied FROM fragen " ."where bild='$bild'" )) {
            $stmt->execute ();
            while ( $row = $stmt->fetch () ) {
                $id_frage = $row ['id_frage'];
                $id_fragesteller = $row ['id_mitglied'];
                break;
            }
        }
        if ($stmt = $pdo->prepare ("INSERT INTO antworten (id_fragesteller, " 
         ."id_antwortgeber, id_frage, antwort) " 
         ." VALUES (:id_fragesteller, :id_antwortgeber, :id_frage, :antwort)" )) {
            if ($stmt->execute ( array (':id_fragesteller' => $id_fragesteller,
             ':id_antwortgeber' => $id_antwortgeber,
             ':id_frage' => $id_frage,
             ':antwort' => $antwort) )) {
                require_once ("lib/php/wertupdate.class.php");
                new WertUpdate ( "antworten",$id_antwortgeber );
                echo "Ihr Rezeptvorschlag wurde eingetragen";
            }
        }
    }
}
$obj = new RezeptEintragen ();
$obj -> eintragen_db($_GET['bild'], $_GET['antwort']);
?>