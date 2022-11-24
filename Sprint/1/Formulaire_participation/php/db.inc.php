<!--
    Page crée le 18/11/2022 par Eliott FERTILLE dans le cadre du projet GED'IMAGINATION en 2ème année de BTS
    Cette page a pour but de fournir les infos de bdd dans un objet PDO
    Dernière modif : 23/11/2022
-->

<?php
    // db data
    $servername = 'localhost';
    $username = 'Eliott';
    $password = '08082003';
    
    //On établit la connexion
    $cnx = new PDO("mysql:host=$servername;dbname=bdd_gedimagination", $username, $password);
?>