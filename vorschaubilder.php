<!DOCTYPE html>
<html>
    <head>
        <title>Vorschau</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="lib/css/stil.css" />
    </head>
    <body>
        <h1>Vorschau</h1>
        <?php
        class Thumber {
            function thumbernail_erstellen(){
                $bv = "images";
                $vb = "thumb";
                $verzeichnis = opendir($bv);
                $bilder = Array();
                while (($datei = readdir($verzeichnis)) !== false){
                    if ((preg_match("/\.jpe?g$/i", $datei)) | 
                        (preg_match("/\.png$/i", $datei)  )){
                            $bilder[] = $datei;
                    } 
                }
                closedir($verzeichnis);
                $verzeichnis = opendir($vb);
                while(($datei = readdir($verzeichnis)) !== false) {
                    if (($datei != ".") && ($datei != "..")) {
                        @unlink("$vb/$datei");
                        //echo "<h2>$datei</h2>";
                    }
                }
                closedir($verzeichnis);
                foreach($bilder as $bild){
                    if (preg_match("/\.png$/i", $bild)){
                        $b = imagecreatefrompng("$bv/$bild");
                        $bild = (explode(".",$bild)[0]).".jpg";
                    } else {
                        $b = imagecreatefromjpeg("$bv/$bild");
                    }
                    $originalbreite = imagesx($b);
                    $originalhoehe = imagesy($b);
                    $neuebreite = 120;
                    $neuehoehe = floor($originalhoehe * $neuebreite / $originalbreite);
                    $neuesbild = imagecreatetruecolor($neuebreite, $neuehoehe);
                    imagecopyresampled($neuesbild, $b, 0,0,0,0, $neuebreite, $neuehoehe, $originalbreite, $originalhoehe);
                    imagejpeg($neuesbild, "$vb/$bild");
                    imagedestroy($neuesbild);
                }
            }
            function thumbernail_anzeigen(){
                $bv = "thumb";
                $verzeichnis = opendir($bv);
                while (($datei = readdir($verzeichnis)) !== false) {
                    if (preg_match("/\.jpe?g$/i", $datei)) {
                        echo "<a href=''><img src='$bv/$datei'"
                        ." alt='Vorschaubild' /></a>";
                    }
                }
                closedir($verzeichnis);
            }
        }

        $obj = new Thumber;
        $obj -> thumbernail_erstellen();
        $obj -> thumbernail_anzeigen();
        ?>
    </body>

</html>