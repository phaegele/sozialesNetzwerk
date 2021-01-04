<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <title>Image2Food - Sag mir, was ich daraus kochen kann - Upload</title>
        <meta name="viewport" content="width=device-width; initial-scale= 1.0">
        <link rel="stylesheet" type="text/css" href="lib/css/stil.css" />
    </head>
    <body>
        <div id="nav">
            <?php
            @require("navmitglieder.php");
            ?>
        </div>
        <div id="content">
            <h1>Registrierungsfehler</h1>
            <?php 
            class UpFehler {
                public function fehler(){
                    echo "<h4>Der Upload und die Registrierung der Datei ".
                      "im System hat leider nicht funktioniert.</h4>".
                      "<h5>Versuchen Sie es bitte erneut.</h5>";
                }
            }
            $obj = new UpFehler();
            $obj -> fehler();
            ?>
            <hr /><a href="index.php">Zur Homepage</a>
        </div>
    </body>
</html>

