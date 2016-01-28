<?php
if(isset($_POST['action']) && $_POST['action'] == 'add-categories')
{
    require "../../app/classe.php";
    $designation_cat = htmlentities(addslashes($_POST['designation_cat']));
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

            $move = ssh2_scp_send($connect, $_FILES['images_cat']['tmp_name'], "/var/www/vhosts/icegest.com/".\App\constante::IP_SRC."/sources/gameshop/marque/".$designation_cat.".".$extension_upload);
            $images_cat = $designation_cat.".".$extension_upload;
            if(!$move)
            {
                $text = "Impossible d'effectuer l'envoie de l'images !";
                header("Location: ../../index.php?view=admin_sha&sub=categorie&error=add-categorie&text=$text");
            }

        }
    }else{
        if($_FILES['images_cat']['error'] == 1) {$text = "Votre images est trop volumineuse !";header("Location: ../../index.php?view=admin_sha&sub=categorie&warning=add-categorie&text=$text");}
        if($_FILES['images_cat']['error'] == 2) {$text = "Votre images est trop volumineuse !";header("Location: ../../index.php?view=admin_sha&sub=categorie&warning=add-categorie&text=$text");}
        if($_FILES['images_cat']['error'] == 3) {$text = "Téléchargement incomplet !";header("Location: ../../index.php?view=admin_sha&sub=categorie&warning=add-categorie&text=$text");}
        if($_FILES['images_cat']['error'] == 4) {$text = "Pas de Fichier !";header("Location: ../../index.php?view=admin_sha&sub=categorie&warning=add-categorie&text=$text");}
        if($_FILES['images_cat']['error'] == 6) {$text = "Fichier Temporaire Manquant !";header("Location: ../../index.php?view=admin_sha&sub=categorie&warning=add-categorie&text=$text");}
        if($_FILES['images_cat']['error'] == 7) {$text = "Impossible d'écrire les droits sur le fichier envoyer !";header("Location: ../../index.php?view=admin_sha&sub=categorie&warning=add-categorie&text=$text");}
        die();
    }

    $sql = $DB->execute("INSERT INTO categorie(id, designation_cat, images_cat) VALUES (NULL, :designation_cat, :images_cat)", array(
        "designation_cat"       => $designation_cat,
        "images_cat"            => $images_cat
    ));

    if($sql == 1)
    {
        $text = "La catégorie <strong>".$designation_cat."</strong> à bien été créer";
        header("Location: ../../index.php?view=admin_sha&sub=categories&success=add-categorie&text=$text");
    }else{
        $text = "Une Erreur à eu lieu lors de la création de la catégorie";
        header("Location: ../../index.php?view=admin_sha&sub=categories&error=add-categorie&text=$text");
    }


}
if(isset($_GET['action']) && $_GET['action'] == 'supp-categorie')
{
    require "../../app/classe.php";
    $idcategorie = $_GET['idcategorie'];

    $cat = $DB->query("SELECT * FROM categorie WHERE id = :idcategorie", array(
        "idcategorie"   => $idcategorie
    ));

    if(!empty($cat[0]->images_cat))
    {
        $connect = ssh2_connect("icegest.com", 22);
        if(!$connect){echo "Echec de la connexion au réseau SSH";}

        $ssh2_login = ssh2_auth_password($connect, 'root', 't2X7qaGzM4we');
        if(!$ssh2_login){echo "Connexion refuser !";}

        $def = ssh2_exec($connect, "chmod 777 /var/www/vhosts/icegest.com/".\App\constante::IP_SRC."/sources/gameshop/marque/".$cat[0]->images_cat.".png");
        $supp_img = ssh2_exec($connect, "rm -rf /var/www/vhosts/icegest.com/".\App\constante::IP_SRC."/sources/gameshop/marque/".$cat[0]->images_cat.'.png');

        if(!$supp_img)
        {
            $text = "Impossible de supprimer l'images !";
            header("Location: ../../index.php?view=admin_sha&sub=categories&warning=supp-categorie&text=$text");
        }

    }

    $count_sub = $categorie_cls->count_sub($idcategorie);
    if($count_sub != 0)
    {
        $sql = $DB->execute("DELETE FROM subcategorie WHERE idcategorie = :idcategorie", array(
            "idcategorie" => $idcategorie
        ));
    }

    $sql = $DB->execute("DELETE FROM categorie WHERE id = :idcategorie", array(
        "idcategorie"   => $idcategorie
    ));

    if($sql == 1)
    {
        $text = "La suppression de la catégorie à été un succès.";
        header("Location: ../../index.php?view=admin_sha&sub=categories&success=supp-categorie&text=$text");
    }else{
        $text = "Une erreur à eu lieu lors de la suppression de la catégorie !";
        header("Location: ../../index.php?view=admin_sha&sub=categories&error=supp-categorie&text=$text");
    }
}