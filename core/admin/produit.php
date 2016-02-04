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
    $tag_produit = "";
    $banner = $ref_produit;
    $editeur = htmlentities(addslashes($_POST['editeur']));
    $genre = $_POST['genre'];
    if(isset($_POST['multijoueur'])) {$multijoueur = 1;}else{$multijoueur = 0;}
    if(isset($_POST['internet'])){$internet = 1;}else{$internet = 0;}
    $options = $_POST['option'];
    $couleur = $_POST['couleur'];
    $cap_hdd = $_POST['cap_hdd'];
    if(isset($_POST['eth'])){$eth = 1;}else{$eth = 0;}
    if(isset($_POST['wifi'])){$wifi = 1;}else{$eth = 1;}
    $nb_usb = $_POST['nb_usb'];
    $compatibilite = $_POST['compatibilite'];

    //Verif INTERNE
        /*
         * STATUT GLOBAL
         * 1: Courant
         * 2: Précommande
         * 3: Promotion
         * 4: Nouveauté
         */

    if($date_sortie >= $date_format->date_jour_strt())
    {
        $statut_global = 2;
    }elseif($date_sortie < $date_format->date_jour_strt())
    {
        $statut_global = 4;
    }else{
        $statut_global = 1;
    }

        /*
         * STATUT STOCK
         * 0: Rupture
         * 1: Réassort
         * 2: OK
         * 3: Précommande
         */
    if($statut_global == 2)
    {
        $statut_stock = 3;
    }
    elseif($stock == 0)
    {
        $statut_stock = 0;
    }else{
        $statut_stock = 2;
    }

    //FIN DES VERIF INTERNE

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
                $infoFichier = pathinfo($_FILES['images_produit']['name']);
                $extensionUpload = $infoFichier['extension'];
                $extensionAuthorized = array('jpg', 'jpeg', 'png', 'gif');
                if(in_array($extensionUpload, $extensionAuthorized))
                {
                    $connect = ssh2_connect("icegest.com", 22);
                    if(!ssh2_auth_password($connect, "root", "1992maxime"))
                    {
                        $text = "Impossible de ce Connecter à la session pour le transfert d'images.<br><strong>ARRET DE L'INSERTION DU PRODUIT !</strong>.<br>Veuillez contacter un administrateur.";
                        header("Location ../../index.php?view=admin_sha&sub=produits&data=add-produit&error=add-produit&text=$text");
                    }
                    $envoie = ssh2_scp_send($connect, $_FILES['images_produit']['tmp_name'], "/var/www/vhosts/icegest.com/ns342142.ip-5-196-76.eu/sources/gameshop/produit/cards/".$ref_produit.".".$extensionUpload, 0777);
                    if(!$envoie)
                    {
                        $text = "Erreur lors de l'envoie du fichier d'image au serveur.<br><strong>ARRET DE L'INSERTION DU PRODUIT !</strong>.<br>Veuillez contacter un administrateur.";
                        header("Location ../../index.php?view=admin_sha&sub=produits&data=add-produit&error=add-produit&text=$text");
                    }
                }
            }
        }

        //Image de la Bannière
        if(isset($_FILES['images_banner']) AND $_FILES['images_banner']['error'] == 0)
        {
            if($_FILES['images_banner']['size'] <= 8388608)
            {
                $infoFichier = pathinfo($_FILES['images_banner']['name']);
                $extensionUpload = $infoFichier['extension'];
                $extensionAuthorized = array('jpg', 'jpeg', 'png', 'gif');
                if(in_array($extensionUpload, $extensionAuthorized))
                {
                    $connect = ssh2_connect("icegest.com", 22);
                    if(!ssh2_auth_password($connect, "root", "1992maxime"))
                    {
                        $text = "Impossible de ce Connecter à la session pour le transfert d'images.<br><strong>ARRET DE L'INSERTION DU PRODUIT !</strong>.<br>Veuillez contacter un administrateur.";
                        header("Location ../../index.php?view=admin_sha&sub=produits&data=add-produit&error=add-produit&text=$text");
                    }
                    $envoie = ssh2_scp_send($connect, $_FILES['images_banner']['tmp_name'], "/var/www/vhosts/icegest.com/ns342142.ip-5-196-76.eu/sources/gameshop/produit/banner/banner_".$ref_produit.".".$extensionUpload, 0777);
                    if(!$envoie)
                    {
                        $text = "Erreur lors de l'envoie du fichier d'image au serveur.<br><strong>ARRET DE L'INSERTION DU PRODUIT !</strong>.<br>Veuillez contacter un administrateur.";
                        header("Location ../../index.php?view=admin_sha&sub=produits&data=add-produit&error=add-produit&text=$text");
                    }
                }
            }
        }

    //Insertion dans les Bases de données
    $sql_produit = $DB->execute("INSERT INTO produits(id, ref_produit, designation, short_description, long_description, tag_produit, date_sortie, prix_vente, revenue_point, cout_point, banner, stock, statut_global, statut_stock, date_reassort, poids) VALUES
                                (NULL, :ref_produit, :designation, :short_description, :long_description, :tag_produit, :date_sortie, :prix_vente, :revenue_point, :cout_point, :banner, :stock, :statut_global, :statut_stock, '', :poids)", array(
        "ref_produit"           => $ref_produit,
        "designation"           => $designation,
        "short_description"     => $short_description,
        "long_description"      => $long_description,
        "tag_produit"           => $tag_produit,
        "date_sortie"           => $date_sortie,
        "prix_vente"            => $prix_vente,
        "revenue_point"         => $revenue_point,
        "cout_point"            => $cout_point,
        "banner"                => $banner,
        "stock"                 => $stock,
        "statut_global"         => $statut_global,
        "statut_stock"          => $statut_stock,
        "poids"                 => $poids
    ));

    $sql_caracteristique = $DB->execute("INSERT INTO produits_caracteristique(id, ref_produit, editeur, genre, multijoueur, internet, `options`, couleur, cap_hdd, eth, wifi, nb_usb, compatibilite) VALUES
                                        (NULL, :ref_produit, :editeur, :genre, :multijoueur, :internet, :option, :couleur, :cap_hdd, :eth, :wifi, :nb_usb, :compatibilite)", array(
        "ref_produit"           => $ref_produit,
        "editeur"               => $editeur,
        "genre"                 => $genre,
        "multijoueur"           => $multijoueur,
        "internet"              => $internet,
        "options"                => $options,
        "couleur"               => $couleur,
        "cap_hdd"               => $cap_hdd,
        "eth"                   => $eth,
        "wifi"                  => $wifi,
        "nb_usb"                => $nb_usb,
        "compatibilite"         => $compatibilite
    ));

    $sql_categorie = $DB->execute("INSERT INTO produits_categorie(id, ref_produit, idcategorie) VALUES (NULL, :ref_produit, :idcategorie)", array(
        "ref_produit"           => $ref_produit,
        "idcategorie"           => $idcategorie
    ));

    $sql_subcategorie = $DB->execute("INSERT INTO produits_subcategorie(id, ref_produit, idsubcategorie) VALUES (NULL, :ref_produit, :idsubcategorie)", array(
        "ref_produit"           => $ref_produit,
        "idsubcategorie"        => $idsubcategorie
    ));

    if($sql_produit == 1 AND $sql_caracteristique == 1 AND $sql_categorie == 1 AND $sql_subcategorie == 1)
    {
        $text = "L'article <strong>".$designation."</strong> à été ajouté avec succès à la base de données.";
        header("Location: ../../index.php?view=admin_sha&sub=produits&success=add-produit&text=$text");
    }else{
        $text = "Une erreur à été rencontrée lors de l'insertion de l'article <strong>".$designation."</strong> dans la base de données.<br>Veuillez contacter l'administrateur.";
        header("Location: ../../index.php?view=admin_sha&sub=produits&data=add-produit&error=add-produit&text=$text");
    }



}
if(isset($_POST['action']) && $_POST['action'] == 'edit-produit')
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
    $tag_produit = "";
    $banner = $ref_produit;
    $editeur = htmlentities(addslashes($_POST['editeur']));
    $genre = $_POST['genre'];
    if(isset($_POST['multijoueur'])) {$multijoueur = 1;}else{$multijoueur = 0;}
    if(isset($_POST['internet'])){$internet = 1;}else{$internet = 0;}
    $options = $_POST['option'];
    $couleur = $_POST['couleur'];
    $cap_hdd = $_POST['cap_hdd'];
    if(isset($_POST['eth'])){$eth = 1;}else{$eth = 0;}
    if(isset($_POST['wifi'])){$wifi = 1;}else{$eth = 1;}
    $nb_usb = $_POST['nb_usb'];
    $compatibilite = $_POST['compatibilite'];

    //Verif INTERNE
    /*
     * STATUT GLOBAL
     * 1: Courant
     * 2: Précommande
     * 3: Promotion
     * 4: Nouveauté
     */

    if($date_sortie >= $date_format->date_jour_strt())
    {
        $statut_global = 2;
    }elseif($date_sortie < $date_format->date_jour_strt())
    {
        $statut_global = 4;
    }else{
        $statut_global = 1;
    }

    /*
     * STATUT STOCK
     * 0: Rupture
     * 1: Réassort
     * 2: OK
     * 3: Précommande
     */
    if($statut_global == 2)
    {
        $statut_stock = 3;
    }
    elseif($stock == 0)
    {
        $statut_stock = 0;
    }else{
        $statut_stock = 2;
    }

    //FIN DES VERIF INTERNE

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
            $infoFichier = pathinfo($_FILES['images_produit']['name']);
            $extensionUpload = $infoFichier['extension'];
            $extensionAuthorized = array('jpg', 'jpeg', 'png', 'gif');
            if(in_array($extensionUpload, $extensionAuthorized))
            {
                $connect = ssh2_connect("icegest.com", 22);
                if(!ssh2_auth_password($connect, "root", "1992maxime"))
                {
                    $text = "Impossible de ce Connecter à la session pour le transfert d'images.<br><strong>ARRET DE L'INSERTION DU PRODUIT !</strong>.<br>Veuillez contacter un administrateur.";
                    header("Location ../../index.php?view=admin_sha&sub=produits&data=add-produit&error=add-produit&text=$text");
                }
                $envoie = ssh2_scp_send($connect, $_FILES['images_produit']['tmp_name'], "/var/www/vhosts/icegest.com/ns342142.ip-5-196-76.eu/sources/gameshop/produit/cards/".$ref_produit.".".$extensionUpload, 0777);
                if(!$envoie)
                {
                    $text = "Erreur lors de l'envoie du fichier d'image au serveur.<br><strong>ARRET DE L'INSERTION DU PRODUIT !</strong>.<br>Veuillez contacter un administrateur.";
                    header("Location ../../index.php?view=admin_sha&sub=produits&data=add-produit&error=add-produit&text=$text");
                }
            }
        }
    }

    //Image de la Bannière
    if(isset($_FILES['images_banner']) AND $_FILES['images_banner']['error'] == 0)
    {
        if($_FILES['images_banner']['size'] <= 8388608)
        {
            $infoFichier = pathinfo($_FILES['images_banner']['name']);
            $extensionUpload = $infoFichier['extension'];
            $extensionAuthorized = array('jpg', 'jpeg', 'png', 'gif');
            if(in_array($extensionUpload, $extensionAuthorized))
            {
                $connect = ssh2_connect("icegest.com", 22);
                if(!ssh2_auth_password($connect, "root", "1992maxime"))
                {
                    $text = "Impossible de ce Connecter à la session pour le transfert d'images.<br><strong>ARRET DE L'INSERTION DU PRODUIT !</strong>.<br>Veuillez contacter un administrateur.";
                    header("Location ../../index.php?view=admin_sha&sub=produits&data=add-produit&error=add-produit&text=$text");
                }
                $envoie = ssh2_scp_send($connect, $_FILES['images_banner']['tmp_name'], "/var/www/vhosts/icegest.com/ns342142.ip-5-196-76.eu/sources/gameshop//produit/banner/banner_".$ref_produit.".".$extensionUpload, 0777);
                if(!$envoie)
                {
                    $text = "Erreur lors de l'envoie du fichier d'image au serveur.<br><strong>ARRET DE L'INSERTION DU PRODUIT !</strong>.<br>Veuillez contacter un administrateur.";
                    header("Location ../../index.php?view=admin_sha&sub=produits&data=add-produit&error=add-produit&text=$text");
                }
            }
        }
    }

    //Insertion dans les Bases de données
    $sql_produit = $DB->execute("UPDATE produits SET designation = :designation, short_description = :short_description, long_description = :long_description, tag_produit = :tag_produit, date_sortie = :date_sortie, prix_vente = :prix_vente, revenue_point = :revenue_point, cout_point = :cout_point, banner = :banner, stock = :stock, statut_global = :statut_global, statut_stock = :statut_stock, poids = :poids WHERE ref_produit = :ref_produit", array(
        "ref_produit"           => $ref_produit,
        "designation"           => $designation,
        "short_description"     => $short_description,
        "long_description"      => $long_description,
        "tag_produit"           => $tag_produit,
        "date_sortie"           => $date_sortie,
        "prix_vente"            => $prix_vente,
        "revenue_point"         => $revenue_point,
        "cout_point"            => $cout_point,
        "banner"                => $banner,
        "stock"                 => $stock,
        "statut_global"         => $statut_global,
        "statut_stock"          => $statut_stock,
        "poids"                 => $poids
    ));

    $sql_caracteristique = $DB->execute("UPDATE produits_caracteristique SET editeur = :editeur, genre = :genre, multijoueur = :multijoueur, internet = :internet, options = :options, couleur = :couleur, cap_hdd = :cap_hdd, eth = :eth, wifi = :wifi, nb_usb = :nb_usb, compatibilite = :compatibilite WHERE ref_produit = :ref_produit", array(
        "ref_produit"           => $ref_produit,
        "editeur"               => $editeur,
        "genre"                 => $genre,
        "multijoueur"           => $multijoueur,
        "internet"              => $internet,
        "options"                => $options,
        "couleur"               => $couleur,
        "cap_hdd"               => $cap_hdd,
        "eth"                   => $eth,
        "wifi"                  => $wifi,
        "nb_usb"                => $nb_usb,
        "compatibilite"         => $compatibilite
    ));

    $sql_categorie = $DB->execute("UPDATE produits_categorie SET idcategorie = :idcategorie WHERE ref_produit = :ref_produit", array(
        "ref_produit"           => $ref_produit,
        "idcategorie"           => $idcategorie
    ));

    $sql_subcategorie = $DB->execute("UPDATE produits_subcategorie SET idsubcategorie = :idsubcategorie WHERE ref_produit = :ref_produit", array(
        "ref_produit"           => $ref_produit,
        "idsubcategorie"        => $idsubcategorie
    ));

    if($sql_produit == 1 AND $sql_caracteristique == 1 AND $sql_categorie == 1 AND $sql_subcategorie == 1)
    {
        $text = "L'article <strong>".$designation."</strong> à été modifier avec succès à la base de données.";
        header("Location: ../../index.php?view=admin_sha&sub=produits&success=edit-produit&text=$text");
    }else{
        $text = "Une erreur à été rencontrée lors de la modification de l'article <strong>".$designation."</strong> dans la base de données.<br>Veuillez contacter l'administrateur.";
        header("Location: ../../index.php?view=admin_sha&sub=produits&data=edit_produit&error=edit-produit&text=$text");
    }



}
if(isset($_GET['action']) && $_GET['action'] == 'supp-produit')
{
    require "../../app/classe.php";
    $ref_produit = $_GET['ref_produit'];

    //Vérification commande produit
    if($produit_cls->count_nbArticle_cmd($ref_produit) != 0)
    {
        $text = "L'article <strong>".$ref_produit."</strong> ne peut pas être supprimer car il est commander ou réserver dans une commande effectuer.<br>Veuillez Supprimer la commande ou la réservation avant de supprimer le produit.";
        header("Location: ../../index.php?view=admin_sha&sub=produits&data=view_produit&ref_produit=$ref_produit&warning=supp-produit&text=$text");
    }

    $sql_caracteristique = $DB->execute("DELETE FROM produits_caracteristique WHERE ref_produit = :ref_produit", array("ref_produit" => $ref_produit));
    $sql_categorie = $DB->execute("DELETE FROM produits_categorie WHERE ref_produit = :ref_produit", array("ref_produit"  => $ref_produit));
    $sql_images = $DB->execute("DELETE FROM produits_images WHERE ref_produit = :ref_produit", array("ref_produit" => $ref_produit));
    $sql_subcategorie = $DB->execute("DELETE FROM produits_subcategorie WHERE ref_produit = :ref_produit", array("ref_produit" => $ref_produit));
    $sql_bonus = $DB->execute("DELETE FROM produits_bonus WHERE ref_produit = :ref_produit", array("ref_produit" => $ref_produit));
    $sql_promotion = $DB->execute("DELETE FROM produits_promotion WHERE ref_produit = :ref_produit", array("ref_produit" => $ref_produit));
    $sql_video = $DB->execute("DELETE FROM produits_videos WHERE ref_produit = :ref_produit", array("ref_produit" => $ref_produit));
    $sql_produit = $DB->execute("DELETE FROM produits WHERE ref_produit = :ref_produit", array("ref_produit" => $ref_produit));

    if($sql_produit == 1)
    {
        $text = "L'article de référence <strong></strong> à bien été supprimer !";
        header("Location: ../../index.php?view=admin_sha&sub=produits&success=supp-produit&text=$text");
    }else{
        $text = "Une Erreur s'est produite lors de la suppression de l'article de référence <strong>".$ref_produit."</strong>.<br>Veuillez contacter l'administrateur.";
        header("Location: ../../index.php?view=admin_sha&sub=produits&data=view_produit&ref_produit=$ref_produit&error=supp-produit&text=$text");
    }


}



if(isset($_POST['action']) && $_POST['action'] == 'add-reassort')
{
    require "../../app/classe.php";
    $params = array(
        "ref_produit"       => $_POST['ref_produit'],
        "date_reassort"     => $date_format->format_strt($_POST['date_reassort']),
        "statut_stock"      => 1
    );
    $ref_produit = $_POST['ref_produit'];

    $sql = $DB->execute("UPDATE produits SET date_reassort = :date_reassort, statut_stock = :statut_stock WHERE ref_produit = :ref_produit", $params);

    if($sql == 1)
    {
        $text = "Votre demande de réassort pour la date du <strong>".$date_format->formatage('d-m-Y', $params['date_reassort'])."</strong> à été enregistré.";
        header("Location: ../../index.php?view=admin_sha&sub=produits&data=view_produit&ref_produit=$ref_produit&success=add-reassort&text=$text");
    }else{
        $text = "Une Erreur à eu lieu lors de l'enregistrement de votre demande de réassort !<br>Veuillez contacter l'administrateur.";
        header("Location: ../../index.php?view=admin_sha&sub=produits&data=view_produit&ref_produit=$ref_produit&error=add-reassort&text=$text");
    }
}
if(isset($_POST['action']) && $_POST['action'] == 'add-stock')
{
    require "../../app/classe.php";

    $ref_produit = $_POST['ref_produit'];

    $produit = $DB->query("SELECT * FROM produits WHERE ref_produit = :ref_produit", array(
        "ref_produit"   => $ref_produit
    ));

    if($_POST['augdim'] == 0)
    {
        $stock = $produit[0]->stock - $_POST['new_stock'];
    }else{
        $stock = $produit[0]->stock + $_POST['new_stock'];
    }

    if($stock >= 1)
    {
        $statut = 2;
    }else{
        $statut = 0;
    }



    $sql = $DB->execute("UPDATE produits SET stock = :stock, statut_stock = :statut_stock WHERE ref_produit = :ref_produit", array(
        "ref_produit"       => $ref_produit,
        "stock"             => $stock,
        "statut_stock"      => $statut
    ));


    if($sql == 1)
    {
        $text = "Votre Stock est maintenant de <strong>".$stock."</strong>.";
        header("Location: ../../index.php?view=admin_sha&sub=produits&data=view_produit&ref_produit=$ref_produit&success=add-stock&text=$text");
    }else{
        $text = "Une Erreur à eu lieu lors de l'enregistrement de votre mise à jour de Stock !<br>Veuillez contacter l'administrateur.";
        header("Location: ../../index.php?view=admin_sha&sub=produits&data=view_produit&ref_produit=$ref_produit&error=add-stock&text=$text");
    }
}
if(isset($_POST['action']) && $_POST['action'] == 'add-images')
{
    require "../../app/classe.php";

    $ref_produit = $_POST['ref_produit'];
    $name_image = $_POST['name_images'];

    if(isset($_FILES['images']) AND $_FILES['images']['error'] == 0)
    {
        if($_FILES['images']['size'] <= 8388608)
        {
            $infoFichier = pathinfo($_FILES['images']['name']);
            $extensionUpload = $infoFichier['extension'];
            $extensionAuthorized = array('jpg', 'jpeg', 'png', 'gif');
            if(in_array($extensionUpload, $extensionAuthorized))
            {
                $connect = ssh2_connect("icegest.com", 22);
                if(!ssh2_auth_password($connect, "root", "1992maxime"))
                {
                    $text = "Impossible de ce Connecter à la session pour le transfert d'images.<br><strong>ARRET DE L'INSERTION DE L'IMAGE !</strong>.<br>Veuillez contacter un administrateur.";
                    header("Location: ../../index.php?view=admin_sha&sub=produits&data=view_produit&ref_produit=$ref_produit&warning=add-images&text=$text");
                }
                if($produit_cls->count_images($ref_produit) == 0)
                {
                    ssh2_exec($connect, "mkdir /var/www/vhosts/icegest.com/ns342142.ip-5-196-76.eu/sources/gameshop/produit/gallery/".$ref_produit);
                }
                $envoie = ssh2_scp_send($connect, $_FILES['images']['tmp_name'], "/var/www/vhosts/icegest.com/ns342142.ip-5-196-76.eu/sources/gameshop/produit/gallery/".$ref_produit."/".$ref_produit."_".$name_image.".".$extensionUpload, 0777);
                $sql = $DB->execute("INSERT INTO produits_images(id, ref_produit, images) VALUES (NULL, :ref_produit, :images)", array(
                    "ref_produit"   => $ref_produit,
                    "images"        => $ref_produit."_".$name_image
                ));

                if($sql == 1 && $envoie)
                {
                    $text = "Image importer avec succès.";
                    header("Location: ../../index.php?view=admin_sha&sub=produits&data=view_produit&ref_produit=$ref_produit&success=add-images&text=$text");
                }else{
                    $text = "Une erreur à eu lors de l'insertion de l'image dans la gallerie !<br>Veuillez contacter l'administrateur.";
                    header("Location: ../../index.php?view=admin_sha&sub=produits&data=view_produit&ref_produit=$ref_produit&error=add-images&text=$text");
                }
            }
        }
    }else{
        switch($_FILES['images']['error'])
        {
            case 1:
                echo "Taille du fichier dépasser par rapport au fichier php.ini ( upload_max_filesize ).";
                break;

            case 2:
                echo "Taille du fichier dépasser par rapport à la configuration initial !";
                break;

            case 3:
                echo "Fichier uploader partiellement !";
                break;

            case 4:
                echo "Fichier non uploader";
                break;

            case 6:
                echo "Fichier temporaire manquant !";
                break;

            case 7:
                echo "Echec de l'écriture du fichier !";
                break;

            case 8:
                echo "Extension Bloquante !";
                break;

            default:
                echo "Fichier non Envoyée";
                break;
        }
    }

}
if(isset($_GET['action']) && $_GET['action'] == 'supp-images')
{
    require "../../app/classe.php";
    $ref_produit = $_GET['ref_produit'];
    $id = $_GET['id'];

    $images = $DB->query("SELECT * FROM produits_images WHERE id = :id", array("id" => $id));
    $name_image = $images[0]->images.".jpg";

    //Suppression du fichier serveur
    $connect = $ssh2->connexion("icegest.com", "22", "root", "1992maxime", true);
    $command = ssh2_exec($connect, "rm -rf /var/www/vhosts/icegest.com/ns342142.ip-5-196-76.eu/sources/gameshop/produit/gallery/".$ref_produit."/".$name_image);
    $sql = $DB->execute("DELETE FROM produits_images WHERE id = :id", array("id" => $id));

    if($command AND $sql == 1){
        $text = "L'image à bien été supprimé.";
        header("Location: ../../index.php?view=admin_sha&sub=produits&data=view_produit&ref_produit=$ref_produit&success=supp-images&text=$text");
    }else{
        $text = "Une Erreur c'est produite lors de la suppression lors de la suppression de l'images.<br>Veuillez contacter l'administrateur.";
        header("Location: ../../index.php?view=admin_sha&sub=produits&data=view_produit&ref_produit=$ref_produit&error=supp-images&text=$text");
    }

}
if(isset($_POST['action']) && $_POST['action'] == 'add-video')
{
    require "../../app/classe.php";
    $ref_produit = $_POST['ref_produit'];
    $video = $_POST['video'];
    $images_video = $_POST['images_video'];
    $titre_video = $_POST['titre_video'];

    $sql = $DB->execute("INSERT INTO produits_videos(id, ref_produit, video, images_video, title_video) VALUES (NULL, :ref_produit, :video, :images_video, :titre_video)", array(
        "ref_produit"   => $ref_produit,
        "video"         => $video,
        "images_video"  => $images_video,
        "titre_video"   => $titre_video
    ));

    if($sql == 1)
    {
        $text = "La Vidéo <strong>".$titre_video."</strong> à été ajouter à la Gallerie des vidéos.";
        header("Location: ../../index.php?view=admin_sha&sub=produits&data=view_produit&ref_produit=$ref_produit&success=add-video&text=$text");
    }else{
        $text = "Une erreur à eu lors de l'insertion de la vidéo dans la gallerie des vidéos !<br>Veuillez contacter l'administrateur.";
        header("Location: ../../index.php?view=admin_sha&sub=produits&data=view_produit&ref_produit=$ref_produit&error=add-video&text=$text");
    }
}
if(isset($_GET['action']) && $_GET['action'] == 'supp-video')
{
    require "../../app/classe.php";
    $ref_produit = $_GET['ref_produit'];
    $id = $_GET['id'];

    $sql = $DB->execute("DELETE FROM produits_videos WHERE id = :id", array("id" => $id));

    if($sql == 1){
        $text = "La vidéo à bien été supprimé.";
        header("Location: ../../index.php?view=admin_sha&sub=produits&data=view_produit&ref_produit=$ref_produit&success=supp-video&text=$text");
    }else{
        $text = "Une Erreur c'est produite lors de la suppression lors de la suppression de la vidéo.<br>Veuillez contacter l'administrateur.";
        header("Location: ../../index.php?view=admin_sha&sub=produits&data=view_produit&ref_produit=$ref_produit&error=supp-video&text=$text");
    }
}
if(isset($_POST['action']) && $_POST['action'] == 'add-promo')
{
    require "../../app/classe.php";
    $ref_produit = $_POST['ref_produit'];
    $new_price = $_POST['new_price'];
    $date_debut = strtotime($_POST['date_debut']);
    $date_fin = strtotime($_POST['date_fin']);

    $sql = $DB->execute("INSERT INTO produits_promotion(id, ref_produit, new_price, date_debut, date_fin) VALUES (NULL, :ref_produit, :new_price, :date_debut, :date_fin)", array(
        "ref_produit"   => $ref_produit,
        "new_price"     => $new_price,
        "date_debut"    => $date_debut,
        "date_fin"      => $date_fin
    ));

    $sql = $DB->execute("UPDATE produits SET statut_global = :statut WHERE ref_produit = :ref_produit", array(
        "ref_produit"   => $ref_produit,
        "statut"        => 3
    ));

    if($sql == 1)
    {
        $text = "La Promotion pour l'article de référence <strong></strong> à été ajouter avec succès.";
        header("Location: ../../index.php?view=admin_sha&sub=produits&data=view_produit&ref_produit=$ref_produit&success=add-promo&text=$text");
    }else{
        $text = "Une erreur à eu lors de l'insertion de la promotion.<br>Veuillez contacter l'administrateur.";
        header("Location: ../../index.php?view=admin_sha&sub=produits&data=view_produit&ref_produit=$ref_produit&error=add-promo&text=$text");
    }

}
if(isset($_GET['action']) && $_GET['action'] == 'supp-promo')
{
    require "../../app/classe.php";
    $ref_produit = $_GET['ref_produit'];
    $id = $_GET['id'];

    $sql = $DB->execute("DELETE FROM produits_promotion WHERE id = :id", array("id" => $id));
    $sql = $DB->execute("UPDATE produits SET statut_global = :statut WHERE ref_produit = :ref_produit", array(
        "ref_produit"   => $ref_produit,
        "statut"        => 1
    ));

    if($sql == 1){
        $text = "La Promotion à bien été supprimé.";
        header("Location: ../../index.php?view=admin_sha&sub=produits&data=view_produit&ref_produit=$ref_produit&success=supp-promo&text=$text");
    }else{
        $text = "Une Erreur c'est produite lors de la suppression lors de la suppression de la Promotion.<br>Veuillez contacter l'administrateur.";
        header("Location: ../../index.php?view=admin_sha&sub=produits&data=view_produit&ref_produit=$ref_produit&error=supp-promo&text=$text");
    }
}
