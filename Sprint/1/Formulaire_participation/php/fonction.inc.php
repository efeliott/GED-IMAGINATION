<!--
    Page crée le 17/11/2022 par Eliott FERTILLE dans le cadre du projet GED'IMAGINATION en 2ème année de BTS
    Cette page a pour but de contenir les fonctions nécessaire au code php du projet GED'IMAGINATION
    Dernière modif : 27/11/2022
-->

<?php

    /*=====--- Fonction de connexion à la base de donnée ---=====*/
    function dbConnector()
    {
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

        // On retourne la variable qui contient l'objet PDO de connexion
        return $cnx;
    };



    /*=====--- Fonction qui permet de vérifier si la participation n'est pas hors période ---=====*/
    function datesConcours($date_participation)
    {
        // Execution de la requète permettant de connaitre les dates de participation du concours
        $request = dbConnector()->query('SELECT * FROM concours');

        // Variable conntenant le resulatat du de la fonction
        $result = false;

        // Organisation du résultat de la requète dans un tableau associatif
        while($data = $request->fetch(PDO::FETCH_ASSOC))
        {
            // Variable de la date de début de la période de participation autorisée
            $date_part_debut = $data['participation_debut'];
            // Variable de la date de fin de la période de participation autorisée
            $date_part_fin = $data['participation_fin'];
        }
        
        // On vérifie que la date de participation est bien comprise dans les temps impartie
        if($date_part_debut <= $date_participation && $date_participation <= $date_part_fin)
        {
            $result = true;
        }

        // On retourne la variable qui indique avec true ou false si la date est bonne
        return $result;
    };



    /*=====--- Fonction qui renvoie le prenom de l'utilistaur ---=====*/
    function getPrenom($id_user)
    {
        // Requète pour aller chercher le nom de l'utilisateur qui correspond à l'id resseigné
        $request = dbConnector()->query('SELECT prenom FROM utilisateur WHERE id_user ="'.$id_user.'"');
        
        // Organisation du résultat de la requète dans un tableau associatif
        while($data = $request->fetch(PDO::FETCH_ASSOC))
        {
            $result = $data['prenom'];
        }
        
        return $result;
    };



    /*=====--- Fonction pour savoir si l'utilisateur a déja participé ---=====*/
    function dejaParticipe($id_user)
    {
        $participe = true;
        
        $request = dbConnector()->query('SELECT photo_name FROM realisation WHERE id_utilisateur ="'.$id_user.'"');
        
        while($data = $request->fetch())
        {
            $boolean = $data['photo_name'];
        }

        if(empty($boolean))
        {
            $participe = false;
        }

        return $participe;
    };
?>