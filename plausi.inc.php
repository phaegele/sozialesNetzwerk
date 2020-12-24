<?php 
/**
 * Klasse mit Testmethoden, ob die offensichtlichen
 * Regeln für das Netzwerk erfüllt sind
 */
class plausi {
    


    public function namentest($wert){
        
        if (preg_match("/^\w{2,30}$|Ü|ü|Ö|ö|Ä|ä|ß$/", $wert)) {
            if (!preg_match("/\d/", $wert)){
                echo "<hr />(Vor)Namen OK";
                return 0;
            }
            else {
                echo "<hr />Fehler in (Vor)Namen. Keine Leerzeichen zulässig...";
                return 1;
            }
        } 
        else {
            echo "<hr />Fehler in (Vor)Namen. Keine Leerzeichen zulässig...";
            return 1;
        }
        
    }
    
    public function emailtest($wert){
        
        $fehler = 0;
         
        // Test notwendige E-Mail-Struktur
        
        if (!preg_match("/^\w+@\w+\.[a-z]{2,}$/i", $wert)) {
            $fehler ++;
        }
        
        // nichtalphanumerische Zeichen – außer dem Zeichen @
        // ist vorerst überflüssig
        /*if (preg_match("/\W/", $wert, $ergarray)) {
            if ($ergarray[0] != "@"){
                $fehler++;
            }
        
        }*/
        if($fehler>0){
            echo "<hr />Email Fehler: ".$fehler;
            return $fehler;
        }
        echo "<hr />Email OK";
        return $fehler;
       
    }
    
    public function nutzerdatentest($wert){
        
        $fehler = 0;
        if (!preg_match("/^\w{8,20}$/", $wert)) {
            $fehler++;
        }
        // Keine Zahl
        if (!preg_match("/\d/", $wert)) {
            $fehler++;
        }
        // Kein Großbuchstabe
        if (!preg_match("/[A-Z]/", $wert)) {
            $fehler++;
        }
        // Kein Kleinbuchstabe
        if (!preg_match("/[a-z]/", $wert)) {
            $fehler++;
        }
        if($fehler>0){
            echo "<hr />ID oder PW Fehler: ".$fehler. "<br />";
            echo "Ihre UserId sowie Passwort müssen....";
            return $fehler;
        }
        echo "<hr />UserID oder PW OK.";
        return $fehler;
    }
    
}
?>