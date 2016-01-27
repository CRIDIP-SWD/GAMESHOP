<?php
if(isset($_POST['action']) && $_POST['action'] == 'add-categorie')
{
    require "../../app/classe.php";
    if(isset($_FILES['images_cat']) && $_FILES['images_cat']['error'] == 0)
    {
        $infoFichier = pathinfo($_FILES['images_cat']['name']);
        $extension_upload = $infoFichier['extension'];
        var_dump($infoFichier, $extension_upload);
        die();
    }else{
        echo "Erreur";
    }
}