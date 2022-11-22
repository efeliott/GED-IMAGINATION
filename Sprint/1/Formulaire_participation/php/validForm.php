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

            // Bloquage des fichiers qui ne correspondent pas au niveau des extensions
            if(pathinfo($fileName, PATHINFO_EXTENSION) == 'png' || pathinfo($fileName, PATHINFO_EXTENSION) == 'jpg' || pathinfo($fileName, PATHINFO_EXTENSION) == 'jpeg')
            {
                echo "C'est bon pour l'extension";
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