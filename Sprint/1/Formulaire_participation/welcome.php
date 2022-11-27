<!--
    Page crée le 27/11/2022 par Eliott FERTILLE dans le cadre du projet GED'IMAGINATION en 2ème année de BTS
    Le but de cette page est de vérifier préalablement si l'utilisateur a déjà participé ou pas.
    Dernière modif : 27/11/2022
-->
<?php
    require 'php\fonction.inc.php';
    $id = 2;
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
        <h1 class="verif_title">Si vous souhaitez participer, cliquer sur le bouton !</h1>
        <button type="button" name="verif_submit">Participer</button>
    </div>
</body>
</html>

<?php
    if(isset($_POST['verif_submit']) && isset($_POST['hidden']))
    {
        if(dejaParticipe($id)==false)
        {
            $message='C\'est bon';
            echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
        }
        else
        {
            $message='C\'est pas bon';
            echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
        } 
    }
?>