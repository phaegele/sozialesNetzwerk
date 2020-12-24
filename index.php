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
	<div id="content"></div>
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
		function besucher () {
			if ((isset($_SESSION['login'])) && $_SESSION['login'] == true) {

				echo 	"<h3>Mitgliederbereich.</h3> 
						<h5>Sie sind angemeldet.</h5>";

			} else if ((isset($_SESSION['login'])) && $_SESSION['login'] == false) {
				
				echo 	"<h3>Sie können sich jetzt zum Mitgliederbereich anmelden.</h3>";

			} else if (isset($_COOKIE['Image2Food'])) {

				echo "<h3>Schön, Sie wiederzusehen!</h3>
					<h5>Melden Sie sich an, um in den geshloessenen Mitgliederbereich zu gelangen,
					wenn Sie sich schon registriert haben.</h5>";

			} else {
				echo "<div id='indextext'>Willkommen ".
					"auf unserer Website. " .
					"schauen Sie sich um. " .
					"Sie können sich hier registrieren  und dann " .
					"in einem geschlossenen " .
					"Mitgliederbereich anmelden.</div>";
			}
		} 
	}
	$obj= new Index();
	$obj -> besucher();
	?>
</body>
</html>
