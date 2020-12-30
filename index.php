<?php 
	setcookie ("Image2Food" , time(), time()+ 60*60*24*120);
    session_start();
/**
* Festlegung der Untergrenze der PHP-Version
* @version 1.0
*/
if(0>version_compare(PHP_VERSION, '5')){
    die ('<h1>Für diese Anwendung ist mindestens PHP 5 notwendig</h1>');
}

/* Fehlerklasse für das Einbinden ext. Dateien */
class MeineAusnahme extends Exception {}

?>
<!DOCTYPE html>

<html lang="de">
<head>
	<meta charset="utf-8">
	<title>Image2Food - Sag mir was ich daraus kochen kann - Index</title>
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="lib/css/stil.css" />
</head>
<body>
	<div id="nav">
	<?php
		try{
			
			/* Fehlervariable für Navi-Einbinde-Fehler */
			$navFehler = false;

			if ( (isset($_SESSION['login']) ) && ($_SESSION['login']  == true)){
				if (!@include('navmitglieder.php')){
					throw new MeineAusnahme();
				}
			} else {
				if (!@include('nav.php')){
					throw new MeineAusnahme();					
				}
			}
		}
		catch (MeineAusnahme $e) {
			$navFehler = true;
		}

	?>
	</div>
	<div id="content">
	<h1>Image2Food - Sag mir was ich daraus kochen kann</h1>
	<h2>Das soziale, multimediale Netzwerk für Kochideen</h2>
	<?php 

	/**Ausgabe Fehlermeldung für Navi-Fehler */
	if ($navFehler == true) {
		die ('Leider gibt es ein Problem mit der Website.
		Wir arbeiten mi Hochdruck daran.
		Besuchen Sie uns in Kürze wieder.');
	}


	/** 
	 * Das soziale Netzwerk für Kochideen
	 * Die Einstiegsseite mit der Hauptklasse
	 */
	class Index {
		function besucher() {
					
			if (isset($_SESSION["login"]) && ($_SESSION["login"] == "true")) {
			echo "<div id='indextext'><h3>Mitgliederbereich</h3>" . "Sie sind angemeldet.</div>";
			@require("uploadformular.inc.php");
			echo "<a href='vorschaubilder.php'" .
					" target='vorschau'>Vorschau</a>";
			
			} else if (isset($_SESSION["login"]) && ($_SESSION["login"] == "false")) {
			echo "<div id='indextext'>Sie können sich jetzt zum Mitgliederbereich anmelden.</div>";
			} else if (isset($_COOKIE['Image2Food'])) {
			echo "<div id='indextext'>Sch&ouml;n, Sie wiederzusehen. " . "Melden Sie sich an, um in den geschlossenen Mitgliederbereich zu gelangen, wenn Sie sich schon registriert haben.</div>";
			} else {
		   echo "<div id='indextext'>Willkommen " . "auf unserer Webseite. " . "Schauen Sie sich um. " . "Sie können sich hier registrieren und dann in " . "einem geschlossenen " . "Mitgliederbereich anmelden.</div>";

			}
	   }
	}
	$obj= new Index();
	$obj -> besucher();
	?>
	</div>
</body>
</html>
