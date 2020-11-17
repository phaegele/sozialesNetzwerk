<?php 
   /** 
    * Festlegung der Untergrenze für die PHP-Version 
    *@version: 1.0 
    **/
if (0>version_compare(PHP_VERSION, '5')){
    die ('<h1>Für diese Anwendung ict mindesens PHP 5 notwendig</h1>');
}
    
?>
<!DOCTYPE HTML>
<html lang="de">
	<head>
		<meta charset="utf-8" />
		<title>Sag mir was ich daraus kochen kann - Registrierung</title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
	</head>
	<body>
		<?php 
            require_once ('nav.php');
            require_once ('plausi.inc.php');
		?>
		<h1>Registrierung</h1>
		<?php 
		require ('registrieren.inc.php');
		/**
		 * Foto2Gericht
		 * Das soziale Netzwerk für Kochideen
		 * Die Registrierungsseite
		 */
		class  Registrierung {
		    
		    public function registrieren(){
		        
		    }
		}
		$regobj = new Registrierung();
		if(sizeof($_POST)>0){
		    $regobj -> registrieren();
		    
		}
		?>
	</body>
</html>