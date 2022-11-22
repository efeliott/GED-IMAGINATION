<!--
    Page crée le 10/11/2022 par Eliott FERTILLE dans le cadre du projet GED'IMAGINATION en 2ème année de BTS
    Cette page a pour but de traiter les données du formulaire de publication de réalisation du jeu concours de Gédimat
    Dernière modif : 22/11/2022
-->

<?php
    //verifie si le boutton submit a bien été actioner
    if(isset($_POST['submit']))
    {
        // Verifie si une photo a été déposée
        if(isset($_FILES['photo']) && !empty($_FILES['photo']) && isset($_POST['titre']) && !empty($_POST['titre']) && isset($_POST['description']) && !empty($_POST['description']) 
        && isset($_POST['debut']) && !empty($_POST['debut']) && isset($_POST['fin']) && !empty($_POST['fin']))
        {
            // Création de variable pour simplifier le travail
            $file = $_FILES['photo'];
            $fileName = $file['name'];
            
            $file_tmp_name = $_FILES['photo']['tmp_name'];
            $file_dest = 'upload/'.$fileName;

            // Bloquage des fichiers qui ne correspondent pas au niveau des extensions
            if(pathinfo($fileName, PATHINFO_EXTENSION) = 'png' || pathinfo($fileName, PATHINFO_EXTENSION) = 'jpg' || pathinfo($fileName, PATHINFO_EXTENSION) = 'jpeg' || pathinfo($fileName, PATHINFO_EXTENSION) = 'PNG' || pathinfo($fileName, PATHINFO_EXTENSION) = 'JPG' || pathinfo($fileName, PATHINFO_EXTENSION) = 'JPEG')
            {
                if(move_uploaded_file($file_tmp_name, $file_dest))
                {
                    echo "ok up";
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