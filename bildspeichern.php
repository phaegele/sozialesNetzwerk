<?php 
session_start();
class Bildspeichern {
    public function datup() {
        $_SESSION['upload'] = "";
        if (isset($_FILES['datei'])){
            if (($_FILES['datei']['size'] > 100000) |
             ($_FILES['datei']['tmp_name'] > 100000)){

                $_SESSION['upload'] =
                 "Die Dateigr&ouml;&#946;e ist auf ".
                 "100.000 Byte beschr&auml;nkt. <br/>".
                 "Verkleinern Sie das Bild bitte mit ".
                 "einem geeignetem Grafikprogramm.<br/>";
                header("Location: index.php");
                        
            } else if(($_FILES['datei']['type'] != "image/png") &&
             ($_FILES['datei']['type'] != "image/pjepg") && 
             ($_FILES['datei']['type'] != "image/jpeg")) {

                $_SESSION['upload'] =
                 "Es d&uuml;rfen nur Bilddateien vom Typ PNG ".
                 "oder JPEG hochgeladen werden.<br/>";
                header("Location: index.php");
   
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
                    @require_once('lib/php/db.inc.php');
                    if ($stmt = $pdo -> prepare
                     ("SELECT userid, id_mitglied FROM mitglieder")){
                        $stmt -> execute();
                        while ($row = $stmt -> fetch()){
                            if ($_SESSION["name"] == $row['userid']){
                                $_SESSION["id_mitglied"] = $row['id_mitglied'];
                                break;
                            }
                        }
                    }
                    if ($stmt = $pdo -> prepare(
                     "INSERT INTO fragen (bild, zusatzinfos, id_mitglied) ".
                     "VALUES (:bild, :zusatzinfos, :id_mitglied)")){
                        $userid = $_SESSION["id_mitglied"];
                        $bild = $_SESSION["dateiname"];
                        $zusatzinfos = $_POST["zusatzinfos"];
                        if ($stmt->execute(array(
                            ':bild' => $bild,
                            ':zusatzinfos' => $zusatzinfos,
                            ':id_mitglied' => $userid))){
                                //$dat = "upload_ok.php";
                                $_SESSION['upload'] = 
                                "Der Dateiupload war OK";
                        } else {
                            //$dat = "upload_fehler.php";
                            $_SESSION['upload'] = 
                            "<h4>Der Upload und die Registrierung" .
                            "der Datei im System hat" . 
                            "leider nicht funktioniert.</h4>".
                            "<h5>Versuchen Sie es bitte erneut.</h5>";
                        }

                        header("Location: index.php");
                    }
                }
            }
            //echo "<hr /><a href='index.php'>Zur Homepage</a>";
        }
    }
}
$obj = new Bildspeichern();
$obj -> datup();
?>