<!--
    Page crée le 17/11/2022 par Eliott FERTILLE dans le cadre du projet GED'IMAGINATION en 2ème année de BTS
    Cette page a pour but de contenir les fonctions nécessaire au code php du projet GED'IMAGINATION
    Dernière modif : 01/12/2022
-->

<?php
    // Variable contenant l'id en abscence temporaire d'un vraie id
    $id = 2;

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


    /*=====--- Fonction de verification pour la validité de l'extension du fichier déposé ---=====*/
    function extensionVerif($file_name)
    {
        // Resultat de la fonction
        $result = false;

        try{
            // Verification de la validité de l'extension de fichier
            if(pathinfo($file_name, PATHINFO_EXTENSION) == 'png' || pathinfo($file_name, PATHINFO_EXTENSION) == 'jpg' || pathinfo($file_name, PATHINFO_EXTENSION) == 'jpeg' 
            || pathinfo($file_name, PATHINFO_EXTENSION) == 'PNG' || pathinfo($file_name, PATHINFO_EXTENSION) == 'JPG' || pathinfo($file_name, PATHINFO_EXTENSION) == 'JPEG')
            {
                $result = true;
            }
        }
        catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }
        
        // Retourne false si l'extension n'est pas accepté et true dans le cas contraire
        return $result;
    };


    /*=====--- Fonction qui permet de vérifier si la participation n'est pas hors période ---=====*/
    function datesConcours($date_participation)
    {
        // Variable conntenant le resulatat du de la fonction
        $result = false;
        
        try{
            // Execution de la requète permettant de connaitre les dates de participation du concours
            $request = dbConnector()->query('SELECT * FROM concours');

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
        }
        catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }

        // On retourne la variable qui indique avec true si la date est bonne et false dans le cas contraire
        return $result;
    };


    /*=====--- Fonction qui renvoie le prenom de l'utilistaur ---=====*/
    function getPrenom($id_user)
    {
        try{
            // Requète pour aller chercher le nom de l'utilisateur qui correspond à l'id resseigné
            $request = dbConnector()->query('SELECT prenom FROM utilisateur WHERE id_user ="'.$id_user.'"');
            
            // Organisation du résultat de la requète dans un tableau associatif
            while($data = $request->fetch(PDO::FETCH_ASSOC))
            {
                $result = $data['prenom'];
            }
        }
        catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }
        
        
        return $result;
    };


    /*=====--- Fonction pour savoir si l'utilisateur a déja participé ---=====*/
    function dejaParticipe($id_user)
    {
        // Variable qui contient le résultat de la fonction
        $participe = true;
        try{
            // Requête pour vérifier si une photo est déja liée à l'id de l'utilisateur en cours
            $request = dbConnector()->query('SELECT photo_name FROM realisation WHERE id_utilisateur ="'.$id_user.'"');
            
            // Organisation du résultat de la requète dans un tableau associatif
            while($data = $request->fetch())
            {
                $boolean = $data['photo_name'];
            }

            // Verification de la présence ou non d'une photo
            if(empty($boolean))
            {
                $participe = false;
            }
        }
        catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }

        // Retourne true si l'utilisateur a déjà participé et false si non
        return $participe;
    };


    /*=====--- Fonction qui envoie les infos de la réalisation complète dans la base de donnée ---=====*/
    function sendReal($file_dest, $file_name_bdd, $titre, $descriptif, $date_debut, $date_fin, $date_ajd, $id)
    {
        try{
            // Requête préparée pour l'insert dans la bdd
            $req = dbConnector()->prepare('INSERT INTO realisation(photo_url, photo_name, titre, descriptif, date_debut, date_fin, date_participation, id_utilisateur) VALUES(?,?,?,?,?,?,?,?)');
            // Execution de la requête si toute les infos sont bonnes
            $req->execute(array($file_dest, $file_name_bdd, $titre, $descriptif, $date_debut, $date_fin, $date_ajd, $id));
        }
        catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }
    };
?>