<?php
if(isset($_POST['action']) && $_POST['action'] == 'add-produit')
{
    require "../../app/classe.php";

    //Import Variable
    $ref_produit = $_POST['ref_produit'];
    $designation = htmlentities(addslashes($_POST['designation']));
    $short_description = htmlentities(addslashes($_POST['short_description']));
    $long_description = htmlentities(addslashes($_POST['long_description']));
    $prix_vente = $_POST['prix_vente'];
    $revenue_point = $_POST['revenue_point'];
    $cout_point = $_POST['cout_point'];
    $idcategorie = $_POST['idcategorie'];
    $idsubcategorie = $_POST['idsubcategorie'];
    $date_sortie = $date_format->format_strt($_POST['date_sortie']);
    $stock = $_POST['stock'];
    $poids = $_POST['poids'];
    $editeur = htmlentities(addslashes($_POST['editeur']));
    $genre = $_POST['genre'];
    if(isset($_POST['multijoueur'])) {$multijoueur = 1;}else{$multijoueur = 0;}
    if(isset($_POST['internet'])){$internet = 1;}else{$internet = 0;}
    $option = $_POST['option'];
    $couleur = $_POST['couleur'];
    $cap_hdd = $_POST['cap_hdd'];
    if(isset($_POST['eth'])){$eth = 1;}else{$eth = 0;}
    if(isset($_POST['wifi'])){$wifi = 1;}else{$eth = 1;}
    $nb_usb = $_POST['nb_usb'];
    $compatibilite = $_POST['compatibilite'];


    //Verification des Information entrées
    if(empty($ref_produit)){
        $text = "Le champs <strong>Référence du produit</strong> est Vide";
        header("Location ../../index.php?view=admin_sha&sub=produits&data=add-produit&warning=add-produit&text=$text");
    }
    if(empty($designation)){
        $text = "Le champs <strong>Désignation du produit</strong> est Vide";
        header("Location ../../index.php?view=admin_sha&sub=produits&data=add-produit&warning=add-produit&text=$text");
    }
    if(empty($prix_vente)){
        $text = "Le champs <strong>Prix de Vente</strong> est Vide";
        header("Location ../../index.php?view=admin_sha&sub=produits&data=add-produit&warning=add-produit&text=$text");
    }

    //Envoie des Images
        //Image du Produit
        if(isset($_FILES['images_produit']) AND $_FILES['images_produit']['error'] == 0)
        {
            if($_FILES['images_produit']['size'] <= 3145728)
            {
                $infoFichier = pathinfo($_FILES['images_produit']['name'])
            }
        }

    

}
