<?php 
    session_start();
   /** 
    * Festlegung der Untergrenze für die PHP-Version 
    *@version: 1.0 
    **/
if (0>version_compare(PHP_VERSION, '5')){
    die ('<h1>Für diese Anwendung ist mindesens PHP 5 notwendig</h1>');
}
    
?>
<!DOCTYPE HTML>
<html lang="de">
	<head>
		<meta charset="utf-8" />
		<title>Sag mir was ich daraus kochen kann - Anmeldung</title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="lib/css/stil.css" />
    </head>

	<body>
        <div id="nav">
		<?php 
            @require ('nav.php');
            @require ('plausi.inc.php');
        ?>
        </div>
        <div id="content">
		<h1>Login</h1>
        <?php
            @require ('login.inc.php');
       
        /**
		 * Foto2Gericht
		 * Das soziale Netzwerk für Kochideen
		 * Die Anmeldeseite
		 */
		class Login {
            /** 
            * Anmeldemethode 
            * – Erst Eingaben des Anwenders plausibilisieren 
            * – Dann in der MySQL-Datenbank abfragen, wenn die Plausibilisierung keine Fehler ergeben hat 
            */
            public function _login() {
                if ($this -> plausibilisieren()) {
                    $this -> anmelden_db();
                }
            }
            
            /** 
             * Plausibilisierungsmethode 
             * Testet die einzelnen Eingabefelder des 
             * Anmeldeformulars gegenüber 
             * – den Notwendigkeiten in der MySQL-Datenbank und 
             * – weiteren Anforderungen, die die Logik 
             * des Netzwerks fordert. 
             * Die Eingaben stehen im globalen Array $_POST 
             * zur Verfügung 
             * @return true, wenn die Plausibilisierung 
             * keine Fehler ergab – sonst false 
             */
             private function plausibilisieren() {
                 // Fehlervariable
                 $anmelden = 0;
                 $p = new plausi();
                 $anmelden += $p -> nutzerdatentest($_POST['userid']);
                 $anmelden += $p -> nutzerdatentest($_POST['pw']);
                 $anmelden += $p -> captchatest($_POST['captcha']);
                 // Testausgaben für den derzeitigen Stand
                 // des Projekts
                 echo "<hr /> Die Eingaben: <hr />";
                 print_r($_POST);
                 echo "<br />Fehleranzahl: " . $anmelden . "<hr />";
                 if ($anmelden == 0){
                     return true;
                 } else {
                     return false;
                 }
             }
            
             /** 
             * Eintragen der Anmeldedaten in die Datenbank 
             * Die Eingaben stehen im globalen Array $_POST 
             * zur Verfügung 
             */
            private function anmelden_db() {
                $vorhanden = false;
                @require_once('db.inc.php');
                 
                if($stmt = $pdo -> prepare("SELECT userid, pw FROM mitglieder")){
                    $stmt -> execute();
                    while ($row=$stmt->fetch()){
                       if(isset($_POST['userid']) &&
                           $_POST['userid'] == $row['userid'] &&
                           md5($_POST['pw']) == $row['pw']){

                                $vorhanden = true;
                                break;
                        }
                    }
                }
                if($vorhanden){
                    $_SESSION['name'] = $_POST['userid'];
                    $_SESSION['login'] = true;
                    $dat = "index.php";
                } else {
                    $_SESSION['login'] = false;
                    $dat = "loginfehler.php";
                }
                header("Location: $dat");
            }
        }
        $logobj = new Login();
		if(sizeof($_POST)>0){
		    $logobj -> _login();
		}
		?>
        </DIV>
	</body>
</html>