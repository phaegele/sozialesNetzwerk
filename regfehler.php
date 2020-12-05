<?php
    session_start();

    if (0 > version_compare(PHP_VERSION, '5')) {
        die('<h1>Für diese Anwendung ' .
        'ist mindestens PHP 5 notwendig</h1>');
    }
?>

<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8" />
		<title>Sag mir was ich daraus kochen kann - Registrierung</title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
    </head>

    <body>
        <div id="nav">
<?php
    @require ("nav.php");
?>
        </div>

        <div id="content">
            <h1>Registrierungsfehler</h1>
<?php
    @require ("registrieren.inc.php");
    
    class RegFehler {
        public function fehler() {
            echo "<h4>Die Registrierung hat leider" .
                " nicht funktioniert.</h4>".
                "<h5>Wählen Sie eine andere Userid und " .
                "versuchen Sie es erneut.</h5>";
        }
    }

    $regobj = new RegFehler();
    $regobj -> fehler();

?>
        </div>
    </body>
</html>