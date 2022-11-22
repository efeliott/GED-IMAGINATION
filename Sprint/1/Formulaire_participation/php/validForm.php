<?php
    //verifie si le boutton submit a bien été actioner
    if(isset($_POST['submit']))
    {
        if(isset($_POST['photo']) and isset($_POST['titre']) and isset($_POST['description']) and isset($_POST['debut']) and isset($_POST['fin']))
        {
            if(!empty($_POST['photo']) and !empty($_POST['titre']) and !empty($_POST['description']) and !empty($_POST['debut']) and !empty($_POST['fin']))
            {
                
            }
        }
    }
?>