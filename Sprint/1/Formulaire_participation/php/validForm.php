<!--
    Page crée le 10/11/2022 par Eliott FERTILLE dans le cadre du projet GED'IMAGINATION en 2ème année de BTS
    Cette page a pour but de traiter les données du formulaire de publication de réalisation du jeu concours de Gédimat
    Dernière modif : 24/11/2022
-->

<?php
    // Appel de mon fichier fonction pour me connecter à la base de donnée
    require '../php/fonction.inc.php';

    // Definition d'une constante pour le poid maximum accepté pour la photo
    define("MAX_FILE_SIZE", 10485760);

    //verifie si le boutton submit a bien été actioner
    if(isset($_POST['submit']))
    {
        // Verifie si une photo a été déposée
        if(isset($_FILES['photo']) && !empty($_FILES['photo']) && isset($_POST['titre']) && !empty($_POST['titre']) && isset($_POST['description']) && !empty($_POST['description']) 
        && isset($_POST['debut']) && !empty($_POST['debut']) && isset($_POST['fin']) && !empty($_POST['fin']))
        {
            /* =====--- Création de variable pour simplifier le travail ---===== */
            // contient les infos sur la photo déposé par le participant
            $file = $_FILES['photo'];
            // Contient le nom complet de la photo
            $file_name = $file['name'];
            // Contient la taille en octet de la photo
            $file_size = $file['size'];
            // Contient la date du jour
            $date_ajd = date('Y/m/d');

            var_dump(getDates());
            
            
            // Contient le nom temporaire de la photo en attendant de la stocé définitivement dans le dossier upload
            $file_tmp_name = $_FILES['photo']['tmp_name'];
            // Donne la destination d'upload de la photo
            $file_dest = '../upload/'.$file_name;

            /* =====--- Traitement de la photo ---===== */
            // Bloquage des fichiers qui ne correspondent pas au niveau des extensions
            if(pathinfo($file_name, PATHINFO_EXTENSION) == 'png' || pathinfo($file_name, PATHINFO_EXTENSION) == 'jpg' || pathinfo($file_name, PATHINFO_EXTENSION) == 'jpeg' 
            || pathinfo($file_name, PATHINFO_EXTENSION) == 'PNG' || pathinfo($file_name, PATHINFO_EXTENSION) == 'JPG' || pathinfo($file_name, PATHINFO_EXTENSION) == 'JPEG')
            {
                if($file_size < MAX_FILE_SIZE)
                {
                    // Si l'extension de fichiers est bonne et que le poid correspond on envoie la photo vers le server web
                    if(move_uploaded_file($file_tmp_name, $file_dest) && $_FILES['photo']['error'] == 0)
                    {
                        // Insertion de l'url de la photo et de son nom vers la bdd
                        $req = $cnx->prepare('INSERT INTO realisation(photo_name, photo_url) VALUES(?,?)');
                        $req->execute(array($file_name, $file_dest));
                    }
                    else
                    {
                        echo "Une erreur est survenue lors de la publication de votre réalisation";
                    }
                }
                else
                {
                    echo "Photo trop volumineuse";
                }
            }
            else
            {
                echo "Extension de fichiers non acceptée";
            }
            /* =====--- Fin traitement de la photo ---===== */
            
            // if(getDates($date_part_debut) < $date_ajd > getDates($date_part_fin))
            // {
                
            // }
            // else
            // {
            //     echo "pas les bonnes dates";
            // }
        }
        else
        {
            echo "Information(s) manquante(s)";
        }
    }
?>