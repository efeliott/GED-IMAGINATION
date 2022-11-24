<!--
    Page crée le 18/11/2022 par Eliott FERTILLE dans le cadre du projet GED'IMAGINATION en 2ème année de BTS
    Cette page a pour but de contenir les fonctions nécessaire au code php du projet
    Dernière modif : 23/11/2022
-->

<?php
    // Appel du fichier db.inc.php qui donne les info de bdd dans l'objet PDO
    require 'db.inc.php';

    //On essaie de se connecter
    try{
      $cnx = new PDO("mysql:host=$servername;dbname=bdd_gedimagination", $username, $password);
      //On définit le mode d'erreur de PDO sur Exception
      $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    /*On capture les exceptions si une exception est lancée et on affiche
      *les informations relatives à celle-ci*/
    catch(PDOException $e){
      echo "Erreur : " . $e->getMessage();
    }
?>