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
		<title>Sag mir was ich daraus kochen kann - Login</title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
    </head>

    <body>
        <div id="nav">
<?php
    @require ("nav.php");
?>
        </div>
        <div id="content">
            <h1>Anmeldefehler</h1>
<?php
    @require ('login.inc.php');

    class Loginfehler {
        public function fehler(){
            echo
                "<h4>Die Anmeldedaten waren leider falsch</h4>".
                "<a href='login.php'>Neu anmelden</a>";
        }
    }
    $loginobj = new Loginfehler();
    $loginobj -> fehler();
?>
        </div>
    </body>
</html>