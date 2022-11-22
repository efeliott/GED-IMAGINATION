<!--
    Page crée le 10/11/2022 par Eliott FERTILLE dans le cadre du projet GED'IMAGINATION en 2ème année de BTS
    Cette page a pour but de traiter les données du formulaire de publication de réalisation du jeu concours de Gédimat
    Dernière modif : 22/11/2022
-->

<?php
    // Appel de mon fichier fonction pour me connecter à la base de donnée
    require '../php/fonction.inc.php';

    //verifie si le boutton submit a bien été actioner
    if(isset($_POST['submit']))
    {
        // Verifie si une photo a été déposée
        if(isset($_FILES['photo']) && !empty($_FILES['photo']) && isset($_POST['titre']) && !empty($_POST['titre']) && isset($_POST['description']) && !empty($_POST['description']) 
        && isset($_POST['debut']) && !empty($_POST['debut']) && isset($_POST['fin']) && !empty($_POST['fin']))
        {
            // Création de variable pour simplifier le travail
            $file = $_FILES['photo'];
            $file_name = $file['name'];
            $file_size = $file['size'];
            
            $file_tmp_name = $_FILES['photo']['tmp_name'];
            $file_dest = '../upload/'.$file_name;

            // Bloquage des fichiers qui ne correspondent pas au niveau des extensions
            if(pathinfo($file_name, PATHINFO_EXTENSION) == 'png' || pathinfo($file_name, PATHINFO_EXTENSION) == 'jpg' || pathinfo($file_name, PATHINFO_EXTENSION) == 'jpeg' 
            || pathinfo($file_name, PATHINFO_EXTENSION) == 'PNG' || pathinfo($file_name, PATHINFO_EXTENSION) == 'JPG' || pathinfo($file_name, PATHINFO_EXTENSION) == 'JPEG')
            {
                if($file_size < 300000)
                {
                    // Si l'extension de fichiers est bonne et que le poid correspond on envoie la photo vers le server web
                    if(move_uploaded_file($file_tmp_name, $file_dest) && $_FILES['photo']['error'] == 0)
                    {
                        $req = $cnx->prepare('INSERT INTO realisation(name_photo, url_photo) VALUES(?,?)');
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
                echo "Extension de fichiers son acceptée";
                // header('Location: http://localhost/Formulaire_participation/');
                // exit();
            }
        }
    }
?>