<!--
    Page crée le 27/11/2022 par Eliott FERTILLE dans le cadre du projet GED'IMAGINATION en 2ème année de BTS
    Le but de cette page est de vérifier préalablement si l'utilisateur a déjà participé ou pas.
    Dernière modif : 01/12/2022
-->
<?php
    require 'php\fonction.inc.php';
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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="user">
        <i class='bx bx-user-circle'></i>
        <?php echo getPrenom($id) ?>
    </div>
    <div class="verif_participation">
        <form action="#" method="get">
            <h1 class="verif_title">Si vous souhaitez participer, cliquer sur le bouton !</h1>
            <button type="submit" name="verif_submit">Participer</button>
        </form>
    </div>
</body>
</html>

<?php
    $date_ajd = date('Y-m-d');

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
                echo '<script>alert("Vous avez déjà participé")</script>';
            }
        }
        else
        {
            echo '<script>alert("Nous ne sommes pas dans la période de participation")</script>';
        }
         
    }
?>