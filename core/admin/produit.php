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
        header("Location: ../../index.php?view=admin_sha&sub=produits&data=edit-produit&error=add-produit&text=$text");
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

