<?php
    $servername = 'localhost';
    $username = 'Eliott';
    $password = '08082003';
    
    //On établit la connexion
    $cnx = new PDO("mysql:host=$servername;dbname=bdd_gedimagination", $username, $password);

    //On essaie de se connecter
    try{
        $cnx = new PDO("mysql:host=$servername;dbname=bdd_gedimagination", $username, $password);
        //On définit le mode d'erreur de PDO sur Exception
        $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Connexion réussie';
    }
    
    /*On capture les exceptions si une exception est lancée et on affiche
      *les informations relatives à celle-ci*/
    catch(PDOException $e){
      echo "Erreur : " . $e->getMessage();
    }

    //On ferme la connexion à la bdd
    $cnx = null;
?>