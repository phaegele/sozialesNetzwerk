<?php
session_start();
class Bemerkungen {
    function bemerk_db($bild){
        require_once("lib/php/db.inc.php");
        if ($stmt = $pdo->prepare("SELECT zusatzinfos FROM fragen WHERE bild='$bild'")){
            
            $stmt -> execute();
            while ($row = $stmt ->fetch()) {
                if ($row['zusatzinfos'] == ""){
                    echo "<div class='vorschauinfos'>" .
                        "Es sind keine zusatzlichen Informationen".
                        " zu dem Bild in der Datenbank hinterlegt.</div>";
                } else {
                    echo "<div class='vorschauinfos'>" .
                        "<h5>Zusatzinformationen</h5>" .
                        $row['zusatzinfos'] ."</div>";
                    break;
                }
            }
        }
    }
}
$obj = new Bemerkungen ();
$obj -> bemerk_db ($_GET['bild']);
?>