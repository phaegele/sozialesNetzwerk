<?php
session_start();
if(0>version_compare(PHP_VERSION, '5')) {
    die ('<h1>Für diese Anwendung ist mindestens PHP 5 notwendig</h1>');
}
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <title>Image2Food - Sag mir, was ich 
            daraus kochen kann - Upload</title>
        <meta name="viewport" content="width=device-width; 
            initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="lib/css/stil.css" />
    </head>
    <body>
        <div id="nav">
            <?php
            @require("navmitglieder.php");
            ?>
        </div>
        <div id="content">
            <h1>Dateiupload OK</h1><hr />
            <a href="index.php">Zur Homepage</a>
        </div>
    </body>
</html>
