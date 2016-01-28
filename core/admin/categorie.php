<?php
if(isset($_POST['action']) && $_POST['action'] == 'add-categories')
{
    require "../../app/classe.php";
    if(isset($_FILES['images_cat']) && $_FILES['images_cat']['error'] == 0)
    {
        $infoFichier = pathinfo($_FILES['images_cat']['name']);
        $extension_upload = $infoFichier['extension'];
        $extension_auth = array('jpg', 'png', 'jpeg');
        if(in_array($extension_upload, $extension_auth))
        {
            $connect = ssh2_connect("icegest.com", 22);
            if(!$connect){echo "Echec de la connexion au réseau SSH";}

            $ssh2_login = ssh2_auth_password($connect, 'root', 't2X7qaGzM4we');
            if(!$ssh2_login){echo "Connexion refuser !";}

        }
        var_dump($infoFichier, $extension_upload);
        die();
    }else{
        echo "Erreur";
    }
}