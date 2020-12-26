<?php 
session_start();
class Bildspeichern {
    public function datup() {
        if (isset($_FILES['datei'])){
            if (($_FILES['datei']['size'] > 100000) |
             ($_FILES['datei']['tmp_name'] > 100000)){
                echo "Die Dateigr&ouml;&#946;e ist auf ".
                "100.000 Byte beschr&auml;nkt. <br/>".
                "Verkleinern Sie das Bild bitte mit ".
                "einem geeignetem Grafikprogramm.<br/>";
            } else if(($_FILES['datei']['type'] != "image/png") &&
             ($_FILES['datei']['type'] != "image/pjepg") && 
             ($_FILES['datei']['type'] != "image/jpeg")) {
                echo "Es d&uuml;rfen nur Bilddateien vom Typ PNG ".
                "oder JPEG hochgeladen werden.";
            } elseif (!empty($_FILES['datei']['name'])){
                $dateiname = $_SESSION["name"]. time();
                if ($_FILES['datei']['type'] != "image/png"){
                    $dateiname .= ".jpg";
                } else {
                    $dateiname .= ".png";
                }
                $_SESSION["dateiname"] = $dateiname;
                if (move_uploaded_file(
                 $_FILES['datei']['tmp_name'], 'images/'.$dateiname)){
                    @require_once('db.inc.php');
                    if ($stmt = $pdo -> prepare
                     ("SELECT userid, id_mitglied FROM mitglieder")){
                        $stmt -> execute();
                        //$stmt -> bind_result($userid, $id_mitglied);
                        while ($stmt -> fetch()){
                            if ($_SESSION["name"] == $userid){
                                $_SESSION["id_mitglied"] = $id_mitglied;
                                break;
                            }
                        }
                        //$stmt -> close();
                    }
                    if ($stmt = $pdo /*$mysqli*/ -> prepare(
                     "INSERT INTO fragen (bild, zusatzinfos, id_mitglied) ".
                     "VALUES (?, ?, ?)")){
                        $userid = $_SESSION["id_mitglied"];
                        $bild = $_SESSION["dateiname"];
                        $zusatzinfos = $_POST["zusatzinfos"];
                        $stmt -> bind_param("sss", $bild, $zusatzinfos, $userid);
                        if ($stmt->execute()){
                            $dat = "upload_ok.php";
                        } else {
                            $dat = "upload_fehler.php";
                        }
                        $stmt -> close();
                        $pdo /*$mysqli*/ -> close();
                        header("Location: $dat");
                    }
                }
            }
            echo "<hr /><a href='index.php'>Zur Homepage</a>";
        }
    }
}
$obj = new Bildspeichern();
$obj -> datup();
?>
</html>