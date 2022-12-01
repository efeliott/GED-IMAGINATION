<!--
    Page crée le 10/11/2022 par Eliott FERTILLE dans le cadre du projet GED'IMAGINATION en 2ème année de BTS
    Cette page a pour but de traiter les données du formulaire de publication de réalisation du jeu concours de Gédimat
    Dernière modif : 01/12/2022
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
        if(isset($_FILES['photo']) && !empty($_FILES['photo']) && isset($_POST['titre']) && !empty($_POST['titre']) && isset($_POST['descriptif']) && !empty($_POST['descriptif']) 
        && isset($_POST['debut']) && !empty($_POST['debut']) && isset($_POST['fin']) && !empty($_POST['fin']))
        {
            /* =====--- Création de variable pour simplifier le travail ---===== */                            
            // contient les infos sur la photo déposé par le participant                               
            $file = $_FILES['photo'];                              
            // Contient le nom complet de la photo                             
            $file_name = $file['name'];                        
            // Contient le nom retenue sans la base de donnée                              
            $file_name_bdd = $id.'.'.pathinfo($file_name, PATHINFO_EXTENSION);                             
            // Contient la taille en octet de la photo                             
            $file_size = $file['size'];                            
            // Contient la date du jour                            
            $date_ajd = date('Y-m-d');                             
            // Titre de la réalisation                             
            $titre = $_POST['titre'];                              
            // Descriptif de la realisation                            
            $descriptif = $_POST['descriptif'];                            
            // Date du debut des travaux                               
            $date_debut = $_POST['debut'];                             
            // Date de fin des travaux                             
            $date_fin = $_POST['fin'];                             
            


            // Contient le nom temporaire de la photo en attendant de la stocé définitivement dans le dossier upload
            $file_tmp_name = $_FILES['photo']['tmp_name'];
            // Donne la destination d'upload de la photo
            $file_dest = '../upload/'.$file_name_bdd;

            /* =====--- Traitement de la photo ---===== */
            // Bloquage des fichiers qui ne correspondent pas au niveau des extensions
            if(extensionVerif($file_name)==true)
            {
                if($file_size < MAX_FILE_SIZE)
                {
                    if($date_debut < $date_fin)
                    {
                        // Si l'extension de fichiers est bonne et que le poid correspond on envoie la photo vers le server web
                        if(move_uploaded_file($file_tmp_name, $file_dest))
                        {
                            // Insertion de l'url de la photo et de son nom vers la bdd
                            sendReal($file_dest, $file_name_bdd, $titre, $descriptif, $date_debut, $date_fin, $date_ajd, $id);
                            echo '<script>alert("Votre participation a bien été prise en compte")</script>';
                            echo "<script>location='../welcome.php'</script>";
                        }
                        else
                        {
                            echo '<script>alert("Une erreur est survenue lors de la publication de votre réalisation")</script>';
                        }
                    }
                    else
                    {
                        echo '<script>alert("Les dates des travaux ne sont pas possibles")</script>';
                    }
                    
                }
                else
                {
                    echo '<script>alert("Photo trop volumineuse")</script>';
                }
            }
            else
            {
                echo '<script>alert("Extension de fichiers non acceptée")</script>';
            }
            /* =====--- Fin traitement de la photo ---===== */
            
        }
        else
        {

            echo '<script>alert("Information(s) manquante(s)")</script>';
        }
    }
?>