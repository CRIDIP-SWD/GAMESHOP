<?php

use App\api\paypal\paypal;
use App\constante;

if(isset($_POST['action']) && $_POST['action'] == 'login')
{
    include "../app/classe.php";
    if((isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['password']) && !empty($_POST['password'])))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $pass_crypt = sha1($email."_".$password);

        $data = $DB->count("SELECT count(*) FROM client WHERE email = '$email' AND password = '$pass_crypt'");

        if($data[0] == 1)
        {
            session_start();
            $client = $DB->query("SELECT * FROM client WHERE email = '$email'");
            $_SESSION['logged'] = true;
            $_SESSION['email'] = $email;
            header("Location: ../index.php?view=checkout");
        }elseif($data[0] == 0)
        {
            header("Location: ../index.php?view=checkout&error=no-compte");
        }else{
            header("Location: ../index.php?view=checkout&error=bdd");
        }
    }else{
        header("Location: ../index.php?view=checkout&warning=champs");
    }
}
if(isset($_GET['action']) && $_GET['action'] == 'adresse')
{
    session_start();
    require "../app/classe.php";
    $data = array(
        "num_commande"          => "CMD".rand(1000000,9999999),
        "date_commande"         => strtotime(date("d-m-Y h:i")),
        "idclient"              => $info_client[0]->idclient,
        "total_commande"        => $panier_cls->MontantGlobal(),
        "date_livraison"        => "",
        "destination"           => "",
        "statut"                => 0,
        "adresse_fact"          => "",
        "adresse_liv"           => "",
        "methode_livraison"      => "",
        "methode_paiement"       => "",
        "prix_envoie"           => ""
    );

    $num_commande = $data['num_commande'];
    $nbArticles = count($_SESSION['panier']['refProduit']);

    $sql = $DB->execute("INSERT INTO commande(idcommande, num_commande, date_commande, idclient, total_commande, date_livraison, destination, statut, adresse_fact, adresse_liv, methode_livraison, methode_paiement, prix_envoie)
                          VALUES (NULL, :num_commande, :date_commande, :idclient, :total_commande, :date_livraison, :destination, :statut, :adresse_fact, :adresse_liv, :methode_livraison, :methode_paiement, :prix_envoie)", $data);

    for($i=0;$i<$nbArticles;$i++)
    {
        $ref_produit = $_SESSION['panier']['refProduit'][$i];
        $qte = $_SESSION['panier']['qteProduit'][$i];
        $prix_article = $_SESSION['panier']['prixProduit'][$i];
        $total_article_commande = $prix_article * $qte;

        $sql_article = $DB->execute("INSERT INTO commande_article(idcommandearticle, num_commande, ref_produit, qte, total_article_commande) VALUES (NULL, :num_commande, :ref_produit, :qte, :total_article_commande)", array(
            "num_commande"              => $num_commande,
            "ref_produit"               => $ref_produit,
            "qte"                       => $qte,
            "total_article_commande"    => $total_article_commande
        ));
    }

    $error = "Impossible de Créer votre commande.<br>Veuillez contactez un administrateur.";
    if($sql == 1 AND $sql_article >= 1)
    {
        header("Location: ../index.php?view=checkout&sub=adresse&num_commande=$num_commande");
    }else{
        header("Location: ../index.php?view=checkout&error=critical&data=$error");
    }
}
if(isset($_POST['action']) && $_POST['action'] == 'livraison')
{

    session_start();
    require "../app/classe.php";
    $num_commande = $_POST['num_commande'];
    $idaddresse = $_POST['adresse'];

    $adresse = $DB->query("SELECT * FROM client_adresse_liv WHERE idadresse = :idadresse", array(
        "idadresse" => $idaddresse
    ));


    $cmd = $DB->execute("UPDATE commande SET destination = :destination, adresse_liv = :adresse_liv WHERE num_commande = :num_commande", array(
        "destination" => "France",
        "adresse_liv" => $adresse[0]->adresse.", ".$adresse[0]->code_postal." ".$adresse[0]->ville,
        "num_commande" => $num_commande
    ));
    $error = "Impossible de continuer.<br>Veuillez contactez un administrateur";
    if($cmd == 1)
    {
        header("Location: ../index.php?view=checkout&sub=livraison&num_commande=$num_commande");
    }else{
        header("Location: ../index.php?view=checkout&sub=adresse&num_commande=$num_commande&error=critical&data=$error");
    }



}
if(isset($_POST['action']) && $_POST['action'] == 'paiement')
{

    session_start();
    include "../app/classe.php";
    $num_commande = $_POST['num_commande'];
    $poids_commande = $_POST['poids_commande'];
    $type_livraison = $_POST['livraison'];

    $cmd = $DB->query("SELECT * FROM commande WHERE num_commande = :num_commande", array(
        "num_commande" => $num_commande
    ));

    if($type_livraison == 1) {$methode_livraison = "LA POSTE";$tarif = $transport_cls->calc_transport_laposte($poids_commande);$jour_liv = $checkout_cls->calc_liv_theo($cmd[0]->date_commande, 4);}
    if($type_livraison == 2) {$methode_livraison = "CHRONOPOST 10H";$tarif = $transport_cls->calc_transport_chrono10($poids_commande);$jour_liv = $checkout_cls->calc_liv_theo($cmd[0]->date_commande, 1);}
    if($type_livraison == 3) {$methode_livraison = "CHRONOPOST 13H";$tarif = $transport_cls->calc_transport_chrono13($poids_commande); $jour_liv = $checkout_cls->calc_liv_theo($cmd[0]->date_commande, 1);}
    if($type_livraison == 4) {$methode_livraison = "UPS STANDARD PROTECTED+";$tarif = $transport_cls->calc_transport_ups($poids_commande); $jour_liv = $checkout_cls->calc_liv_theo($cmd[0]->date_commande, 3);}


    $sql = $DB->execute("UPDATE commande SET methode_livraison = :methode_livraison, prix_envoie = :prix_envoie, date_livraison = :date_livraison WHERE num_commande = :num_commande", array(
        "methode_livraison" => $methode_livraison,
        "prix_envoie"       => $tarif,
        "num_commande"      => $num_commande,
        "date_livraison"    => $jour_liv,
    ));
    $error = "Impossible de Définir le moyen de livraison.<br>Veuillez contactez un administrateur.";

    if($sql === 1)
    {
        header("Location: ../index.php?view=checkout&sub=paiement&num_commande=$num_commande");
    }else{
        header("Location: ../index.php?view=checkout&sub=livraison&num_commande=$num_commande&error=critical&data=$error");
    }


}
if(isset($_POST['action']) && $_POST['action'] == 'process-paiement')
{
    session_start();
    include "../app/classe.php";
    $num_commande = $_POST['num_commande'];
    $type_paiement = $_POST['paiement'];


    $cmd = $DB->query("SELECT * FROM commande WHERE num_commande = :num_commande", array(
        "num_commande" => $num_commande
    ));
    $sql_article = $DB->query("SELECT * FROM commande_article, produits WHERE commande_article.ref_produit = produits.ref_produit AND num_commande = :num_commande", array(
        "num_commande" => $num_commande
    ));


    $error = "Impossible d'effectuer le paiement.<br>Veuillez contactez l'administrateur";

    if($type_paiement == 1){
        $paypal = new paypal();
        $params = array(
            "RETURNURL" => constante::HTTP.constante::URL."core/checkout_paypal.php",
            "CANCELURL" => constante::HTTP.constante::URL."index.php?view=checkout&sub=paiement&error=critical&data=$error",

            "PAYMENTREQUEST_0_AMT"      => $cmd[0]->total_commande + $cmd[0]->prix_envoie, // 445.40
            "PAYMENTREQUEST_0_CURRENCYCODE" => "EUR",
            "PAYMENTREQUEST_0_SHIPPINGAMT" => $cmd[0]->prix_envoie, // 26.50
            "PAYMENTREQUEST_0_ITEMAMT" => $cmd[0]->total_commande, // 445.40
            "PAYMENTREQUEST_0_CUSTOM"     => $num_commande
        );
        foreach($sql_article as $k => $article){
            $params["L_PAYMENTREQUEST_0_NAME$k"] = $article->designation;
            $params["L_PAYMENTREQUEST_0_DESC$k"] = $article->ref_produit;
            $params["L_PAYMENTREQUEST_0_AMT$k"] = $article->prix_vente; //389 + 29.90
            $params["L_PAYMENTREQUEST_0_QTY$k"] = $article->qte;
            $params["L_PAYMENTREQUEST_0_ITEMURL$k"] = constante::HTTP.constante::URL."index.php?view=produit&ref_produit=".$article->ref_produit;
        }
        //var_dump($params);
        $response = $paypal->request('SetExpressCheckout', $params);
        if($response)
        {
            $_SESSION['payment'] = $response['PAYMENTREQUEST_0_CUSTOM'];
            header("Location: https://www.sandbox.paypal.com/webscr?cmd=_express-checkout&useraction=commit&token=".$response['TOKEN']);
        }else{
            var_dump($paypal->errors);
            die();
        }
    }

    if($type_paiement == 2){
        $transactionID = "VIRREF".rand(100,999999999);
        $preco = $DB->count("SELECT COUNT(commande_article.ref_produit) FROM commande_article, produits WHERE commande_article.ref_produit = produits.ref_produit AND produits.statut_global = 2 AND commande_article.num_commande = :num_commande", array(
            "num_commande" => $num_commande
        ));

        $stock = $DB->count("SELECT COUNT(commande_article.ref_produit) FROM commande_article, produits WHERE commande_article.ref_produit = produits.ref_produit AND produits.statut_stock != 2 AND commande_article.num_commande = :num_commande", array(
            "num_commande"  => $num_commande
        ));

        $sql_article = $DB->query("SELECT * FROM commande_article, produits WHERE commande_article.ref_produit = produits.ref_produit AND num_commande = :num_commande", array(
            "num_commande"  => $num_commande
        ));

        if($preco != 0)
        {
            $new_point = $info_client[0]->point + $produit_cls->revenue_point_total($num_commande);
            $update = $DB->execute("UPDATE commande SET methode_paiement = :methode_paiement WHERE num_commande = :num_commande", array(
                "methode_paiement"      => "VIREMENT BANCAIRE",
                "num_commande"          => $num_commande,
            ));
            $update = $DB->execute("UPDATE client SET point = :point WHERE idclient = :idclient", array(
                "point"     => $new_point,
                "idclient"  => $cmd[0]->idclient
            ));
            $reglement = $DB->execute("INSERT INTO commande_reglement(idreglement, num_commande, mode_reglement, date_reglement, ref_reglement, montant_reglement, etat_reglement)
                                              VALUES (NULL, :num_commande, :mode_reglement, :date_reglement, :ref_reglement, :montant_reglement, :etat_reglement)", array(
                "num_commande"      => $num_commande,
                "mode_reglement"    => "PAYPAL EUROPE",
                "date_reglement"    => $date_format->format_strt(date("d-m-Y H:i:s")),
                "ref_reglement"     => $transactionID,
                "montant_reglement" => $cmd[0]->total_commande + $cmd[0]->prix_envoie,
                "etat_reglement"    => 9
            ));
            $error = "Impossible de Définir le réglement en base de donnée.<br>Veuillez contactez l'administrateur système.";
            if($update >= 1 AND $reglement == 1)
            {
                header("Location: ../index.php?view=checkout&sub=recap&num_commande=$num_commande");
            }else{
                header("Location: ../index.php?view=checkout&sub=paiement&num_commande=$num_commande&error=critical&data=$error");
            }
        }elseif($stock != 0)
        {
            $new_point = $info_client[0]->point + $produit_cls->revenue_point_total($num_commande);
            $update = $DB->execute("UPDATE commande SET methode_paiement = :methode_paiement WHERE num_commande = :num_commande", array(
                "methode_paiement"      => "VIREMENT BANCAIRE",
                "num_commande"          => $num_commande,
            ));
            $update = $DB->execute("UPDATE client SET point = :point WHERE idclient = :idclient", array(
                "point"     => $new_point,
                "idclient"  => $cmd[0]->idclient
            ));
            $reglement = $DB->execute("INSERT INTO commande_reglement(idreglement, num_commande, mode_reglement, date_reglement, ref_reglement, montant_reglement, etat_reglement)
                                              VALUES (NULL, :num_commande, :mode_reglement, :date_reglement, :ref_reglement, :montant_reglement, :etat_reglement)", array(
                "num_commande"      => $num_commande,
                "mode_reglement"    => "VIREMENT BANCAIRE",
                "date_reglement"    => $date_format->format_strt(date("d-m-Y H:i:s")),
                "ref_reglement"     => $transactionID,
                "montant_reglement" => $cmd[0]->total_commande + $cmd[0]->prix_envoie,
                "etat_reglement"    => 8
            ));
            $error = "Impossible de Définir le réglement en base de donnée.<br>Veuillez contactez l'administrateur système.";
            if($update >= 1 AND $reglement == 1)
            {
                header("Location: ../index.php?view=checkout&sub=recap&num_commande=$num_commande");
            }else{
                header("Location: ../index.php?view=checkout&sub=paiement&num_commande=$num_commande&error=critical&data=$error");
            }
        }else{
            $new_point = $info_client[0]->point =+ $produit_cls->revenue_point_total($num_commande);
            $update = $DB->execute("UPDATE commande SET methode_paiement = :methode_paiement WHERE num_commande = :num_commande", array(
                "methode_paiement"      => "VIREMENT BANCAIRE",
                "num_commande"          => $num_commande,
            ));
            $update = $DB->execute("UPDATE client SET point = :point WHERE idclient = :idclient", array(
                "point"     => $new_point,
                "idclient"  => $cmd[0]->idclient
            ));
            foreach($sql_article as $article){
                $ref_produit = $article->ref_produit;
                $new_stock = $article->stock - $article->qte;
                $update = $DB->execute("UPDATE produits SET stock = :stock WHERE ref_produit = :ref_produit", array(
                    "stock"     => $new_stock,
                    "ref_produit"   => $ref_produit
                ));
                if($article->stock <= 0)
                {
                    $update = $DB->execute("UPDATE produits SET statut_stock = :statut WHERE ref_produit = :ref_produit", array(
                        "statut"        => 0,
                        "ref_produit"   => $ref_produit
                    ));
                }
            }
            $reglement = $DB->execute("INSERT INTO commande_reglement(idreglement, num_commande, mode_reglement, date_reglement, ref_reglement, montant_reglement, etat_reglement)
                                              VALUES (NULL, :num_commande, :mode_reglement, :date_reglement, :ref_reglement, :montant_reglement, :etat_reglement)", array(
                "num_commande"      => $num_commande,
                "mode_reglement"    => "VIREMENT BANCAIRE",
                "date_reglement"    => $date_format->format_strt(date("d-m-Y H:i:s")),
                "ref_reglement"     => $transactionID,
                "montant_reglement" => $cmd[0]->total_commande + $cmd[0]->prix_envoie,
                "etat_reglement"    => 4
            ));
            $error = "Impossible de Définir le réglement en base de donnée.<br>Veuillez contactez l'administrateur système.";
            if($update >= 1 AND $reglement == 1)
            {
                header("Location: ../index.php?view=checkout&sub=recap&num_commande=$num_commande");
            }else{
                header("Location: ../index.php?view=checkout&sub=paiement&num_commande=$num_commande&error=critical&data=$error");
            }

        }
    }

    if($type_paiement == 3){
        $transactionID = "REF".rand(100,99999999);

        $preco = $DB->count("SELECT COUNT(commande_article.ref_produit) FROM commande_article, produits WHERE commande_article.ref_produit = produits.ref_produit AND produits.statut_global = 2 AND commande_article.num_commande = :num_commande", array(
            "num_commande" => $num_commande
        ));

        $stock = $DB->count("SELECT COUNT(commande_article.ref_produit) FROM commande_article, produits WHERE commande_article.ref_produit = produits.ref_produit AND produits.statut_stock != 2 AND commande_article.num_commande = :num_commande", array(
            "num_commande"  => $num_commande
        ));

        $sql_article = $DB->query("SELECT * FROM commande_article, produits WHERE commande_article.ref_produit = produits.ref_produit AND num_commande = :num_commande", array(
            "num_commande"  => $num_commande
        ));

        if($preco != 0)
        {
            $new_point = $info_client[0]->point - $produit_cls->count_point_total($num_commande);
            $update = $DB->execute("UPDATE commande SET methode_paiement = :methode_paiement WHERE num_commande = :num_commande", array(
                "methode_paiement"      => "POINT DE FIDELITE",
                "num_commande"          => $num_commande,
            ));
            $update = $DB->execute("UPDATE client SET point = :point WHERE idclient = :idclient", array(
                "point"     => $new_point,
                "idclient"  => $cmd[0]->idclient
            ));
            $reglement = $DB->execute("INSERT INTO commande_reglement(idreglement, num_commande, mode_reglement, date_reglement, ref_reglement, montant_reglement, etat_reglement)
                                              VALUES (NULL, :num_commande, :mode_reglement, :date_reglement, :ref_reglement, :montant_reglement, :etat_reglement)", array(
                "num_commande"      => $num_commande,
                "mode_reglement"    => "POINT DE FIDELITE",
                "date_reglement"    => $date_format->format_strt(date("d-m-Y H:i:s")),
                "ref_reglement"     => $transactionID,
                "montant_reglement" => $cmd[0]->total_commande + $cmd[0]->prix_envoie,
                "etat_reglement"    => 9
            ));
            $error = "Impossible de Définir le réglement en base de donnée.<br>Veuillez contactez l'administrateur système.";
            if($update >= 1 AND $reglement == 1)
            {
                header("Location: ../index.php?view=checkout&sub=recap&num_commande=$num_commande");
            }else{
                header("Location: ../index.php?view=checkout&sub=paiement&num_commande=$num_commande&error=critical&data=$error");
            }
        }elseif($stock != 0)
        {
            $new_point = $info_client[0]->point - $produit_cls->count_point_total($num_commande);
            $update = $DB->execute("UPDATE commande SET methode_paiement = :methode_paiement WHERE num_commande = :num_commande", array(
                "methode_paiement"      => "POINT DE FIDELITE",
                "num_commande"          => $num_commande,
            ));
            $update = $DB->execute("UPDATE client SET point = :point WHERE idclient = :idclient", array(
                "point"     => $new_point,
                "idclient"  => $cmd[0]->idclient
            ));
            $reglement = $DB->execute("INSERT INTO commande_reglement(idreglement, num_commande, mode_reglement, date_reglement, ref_reglement, montant_reglement, etat_reglement)
                                              VALUES (NULL, :num_commande, :mode_reglement, :date_reglement, :ref_reglement, :montant_reglement, :etat_reglement)", array(
                "num_commande"      => $num_commande,
                "mode_reglement"    => "POINT DE FIDELITE",
                "date_reglement"    => $date_format->format_strt(date("d-m-Y H:i:s")),
                "ref_reglement"     => $transactionID,
                "montant_reglement" => $cmd[0]->total_commande + $cmd[0]->prix_envoie,
                "etat_reglement"    => 8
            ));
            $error = "Impossible de Définir le réglement en base de donnée.<br>Veuillez contactez l'administrateur système.";
            if($update >= 1 AND $reglement == 1)
            {
                header("Location: ../index.php?view=checkout&sub=recap&num_commande=$num_commande");
            }else{
                header("Location: ../index.php?view=checkout&sub=paiement&num_commande=$num_commande&error=critical&data=$error");
            }
        }else{
            $new_point = $info_client[0]->point - $produit_cls->count_point_total($num_commande);
            $update = $DB->execute("UPDATE commande SET methode_paiement = :methode_paiement WHERE num_commande = :num_commande", array(
                "methode_paiement"      => "POINT DE FIDELITE",
                "num_commande"          => $num_commande,
            ));
            $update = $DB->execute("UPDATE client SET point = :point WHERE idclient = :idclient", array(
                "point"     => $new_point,
                "idclient"  => $cmd[0]->idclient
            ));
            foreach($sql_article as $article){
                $ref_produit = $article->ref_produit;
                $new_stock = $article->stock - $article->qte;
                $update = $DB->execute("UPDATE produits SET stock = :stock WHERE ref_produit = :ref_produit", array(
                    "stock"     => $new_stock,
                    "ref_produit"   => $ref_produit
                ));
                if($article->stock <= 0)
                {
                    $update = $DB->execute("UPDATE produits SET statut_stock = :statut WHERE ref_produit = :ref_produit", array(
                        "statut"        => 0,
                        "ref_produit"   => $ref_produit
                    ));
                }
            }
            $reglement = $DB->execute("INSERT INTO commande_reglement(idreglement, num_commande, mode_reglement, date_reglement, ref_reglement, montant_reglement, etat_reglement)
                                              VALUES (NULL, :num_commande, :mode_reglement, :date_reglement, :ref_reglement, :montant_reglement, :etat_reglement)", array(
                "num_commande"      => $num_commande,
                "mode_reglement"    => "POINT DE FIDELITE",
                "date_reglement"    => $date_format->format_strt(date("d-m-Y H:i:s")),
                "ref_reglement"     => $transactionID,
                "montant_reglement" => $cmd[0]->total_commande + $cmd[0]->prix_envoie,
                "etat_reglement"    => 4
            ));
            $error = "Impossible de Définir le réglement en base de donnée.<br>Veuillez contactez l'administrateur système.";
            if($update >= 1 AND $reglement == 1)
            {
                header("Location: ../index.php?view=checkout&sub=recap&num_commande=$num_commande");
            }else{
                header("Location: ../index.php?view=checkout&sub=paiement&num_commande=$num_commande&error=critical&data=$error");
            }

        }
    }
}
