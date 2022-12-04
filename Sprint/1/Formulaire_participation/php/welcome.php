<!--
    Page crée le 27/11/2022 par Eliott FERTILLE dans le cadre du projet GED'IMAGINATION en 2ème année de BTS
    Le but de cette page est de vérifier préalablement si l'utilisateur a déjà participé ou pas.
    Dernière modif : 01/12/2022
-->
<?php
    require 'fonction.inc.php';
    // Variable contenant le message d'erreur
    $error_msg = "";
    // Variable de la date du jour actuel
    $date_ajd = date('Y-m-d');
    // Lien pour retenter
    $retry = '';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Souhaitez vous participer</title>
    <!----===== Boxicons CSS =====---->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <!----===== lien de la fiche de style =====---->
    <link rel="stylesheet" href="../css/style.css">
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
    <div class="verif_participation">
        <form action="#" method="get">
            <?php
            // On verifie si le boutton est actionné
            if(isset($_GET['verif_submit']))
            {
                if(datesConcours($date_ajd)==true)
                {
                    if(dejaParticipe($id)==false)
                    {
                        echo "<script>location='index.php'</script>";
                    }
                    else
                    {
                        $error_msg = "Vous avez déjà participé";
                        $retry = "Réessayer";
                    }
                }
                else
                {
                    $error_msg = "Nous ne sommes pas dans la période de participation";
                    $retry = "Réessayer";
                }
            }
            ?>
            <h1 class="verif_title">Si vous souhaitez participer, cliquer sur le bouton !</h1>
            <h2><?php echo $error_msg ?></h2>
            <button type="submit" name="verif_submit">Participer</button>
            <a href="welcome.php"><?php echo $retry ?></a>
        </form>
    </div>
</body>
</html>

