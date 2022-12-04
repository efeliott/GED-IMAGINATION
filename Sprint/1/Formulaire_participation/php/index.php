<!-- 
    Page crée le 10/11/2022 par Eliott FERTILLE dans le cadre du projet GED'IMAGINATION en 2ème année de BTS
    Cette page affiche un formulaire dans lequel un participant du concours GED'IMAGINATION peut poster ça réalisation
    Dernière modif : 01/12/2022
 -->
<?php
    require 'fonction.inc.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- lien de la fiche de style -->
    <link rel="stylesheet" href="../css/style.css">
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>Poster une réalisation</title>
</head>
<body>
    <div class="logo_container">
        <div class="logo">
            <img src="../img/logo_gedimat 1.svg">
        </div>
    </div>
    <div class="user">
        <i class='bx bx-user-circle'></i>
        <?php echo getPrenom($id) ?>
    </div>
    <!-- Div contenant le formulaire -->
    <div class="form">
        <span class="form_title">Votre réalisation</span>
        <!-- Formulaire pour le dépot des cractéristiques de la réalisation du participant -->
        <form action="../php/validForm.php" method="post" enctype="multipart/form-data">
            <!-- Case pour déposer la photo -->
            <div class="form_input_file">
                <span>Charger votre photo ici (png, jpg, jpeg) : </span>
                <!-- icon upload -->
                <label for="photo"><div><i class='bx bx-cloud-upload'></i></div></label>
                <input type="hidden" name="MAX_FILE_SIZE" value="10485760">
                <input type="file" 
                name="photo"
                id="photo"
                accept="image/png, image/jpeg, image/jpg"
                pattern="^[A-Z]([a-z0-9]|\s|[,'çéà']){0,}[.!?]$"
                oninvalid="this.setCustomValidity('Veuillez ajouter un fichier accepté')" 
                oninput="this.setCustomValidity('')"
                required>
            </div>
            <!-- Case pour le titre -->
            <div class="form_input">
                <input type="text" 
                placeholder="Titre" 
                class="input-title" 
                name="titre" 
                pattern="^[A-Z]([a-z0-9]|\s|[,'çéà']){0,}[.!?]$"
                oninvalid="this.setCustomValidity('Veuillez renseigner un titre avec une majuscule et un point')" 
                oninput="this.setCustomValidity('')" 
                required>
            </div>
            <!-- Zone de saisie de la description -->
            <div class="form_input">
                <textarea type="text" 
                placeholder="Description" 
                class="input-title" 
                name="descriptif" 
                pattern="^[A-Z]([a-z0-9]|\s|[,'çéà']){0,}[.!?]$"
                oninvalid="this.setCustomValidity('Veuillez renseigner une description avec une majuscule et un point')" 
                oninput="this.setCustomValidity('')" 
                required></textarea>
            </div>
            <!-- Zone de saisie de la date de début des travaux -->
            <div class="form_input">
                <span>Début des travaux : </span>
                <input type="date" name="debut" required>
            </div>
            <!-- Zone de saisie de la date de fin des travaux -->
            <div class="form_input">
                <span>Fin des travaux : </span>
                <input type="date" name="fin" required>
            </div>
            <!-- Boutton de type submit qui valide le formulaire -->
            <button type="submit" class="form_button" name="submit">Valider</button>
        </form>
    </div>
</body>
</html>