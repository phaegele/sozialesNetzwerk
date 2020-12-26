<?php
    try{
        $pdo = new PDO("mysql:host=localhost; dbname=sozialesnetzwerk", "root", "");
    }
    catch(PDOException $e) {

        echo 'Fehler bei der Verbindung!'.$e->get_message();
        exit();

    }
?>