<?php
require "../app/classe.php";
use App\api\paypal\paypal;

session_start();
$num_commande = $_SESSION['payment'];
$paypal = new paypal();
$response = $paypal->request('GetExpressCheckoutDetails', array(
    "TOKEN"     => $_GET['token'],
    "PAYMENTREQUEST_0_CUSTOM" => $num_commande
));

if($response)
{
    if($response['CHECKOUTSTATUS'] === 'PaymentActionNotInitiated')
    {
        $num_commande = $response['PAYMENTREQUEST_0_CUSTOM'];
        $timestamp = $date_format->format_strt($response['TIMESTAMP']);
        $timestamp30 = $timestamp + 30;

        $cmd = $DB->query("SELECT * FROM commande WHERE num_commande = :num_commande", array(
            "num_commande" => $num_commande
        ));

        if($response['AMT'] != $cmd[0]->total_commande + $cmd[0]->prix_envoie)
        {
            $error = "Une Erreur est survenue lors de l'authorisation de paiement.<br>Veuillez contactez un administrateur.";
            header("Location: ../index.php?view=checkout&sub=paiement&num_commande=$num_commande&error=critical&data=$error");
        }

        if($timestamp >= $timestamp30)
        {
            $error = "Le temps attribuer pour la transaction à expirée. Veuillez recommencer la procédure.";
            header("Location: ../index.php?view=checkout&sub=paiement&num_commande=$num_commande&error=warning&data=$error");
        }else{

            $paiement = $paypal->request('DoExpressCheckoutPayment', array(
                "TOKEN"                     => $_GET['token'],
                "PAYERID"                   => $_GET['PayerID'],
                "PAYMENTACTION"             => 'Sale',
                "PAYMENTREQUEST_0_CUSTOM"   => $num_commande,
                "PAYMENTREQUEST_0_AMT"      => $response['AMT'],
                "PAYMENTREQUEST_0_CURRENCYCODE"  => "EUR"
            ));

            if($paiement)
            {
                var_dump($paiement);
                $num_commande = $_SESSION['payment'];
                $transactionID = $paiement['PAYMENTINFO_0_TRANSACTIONID'];

                //Import des Informations de Commande
                $cmd = $DB->query("SELECT * FROM commande WHERE num_commande = :num_commande", array(
                    "num_commande"  => $num_commande
                ));

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
                    $new_point = $produit_cls->revenue_point_total($num_commande);
                    $update = $DB->execute("UPDATE commande SET methode_paiement = :methode_paiement WHERE num_commande = :num_commande", array(
                        "methode_paiement"      => "PAYPAL EUROPE",
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
                        "montant_reglement" => $paiement['PAYMENTINFO_0_AMT'],
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
                    $new_point = $produit_cls->revenue_point_total($num_commande);
                    $update = $DB->execute("UPDATE commande SET methode_paiement = :methode_paiement WHERE num_commande = :num_commande", array(
                        "methode_paiement"      => "PAYPAL EUROPE",
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
                        "montant_reglement" => $paiement['PAYMENTINFO_0_AMT'],
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
                    $new_point = $produit_cls->revenue_point_total($num_commande);
                    $update = $DB->execute("UPDATE commande SET methode_paiement = :methode_paiement WHERE num_commande = :num_commande", array(
                        "methode_paiement"      => "PAYPAL EUROPE",
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
                        "mode_reglement"    => "PAYPAL EUROPE",
                        "date_reglement"    => $date_format->format_strt(date("d-m-Y H:i:s")),
                        "ref_reglement"     => $transactionID,
                        "montant_reglement" => $paiement['PAYMENTINFO_0_AMT'],
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
            }else{
                var_dump($paypal->errors);
                die();
            }

        }
    }else{
        $error = "Ce Paiement à déja été éxécuter !!!";
        header("Location: ../index.php?view=checkout&sub=recap&num_commande=$num_commande&error=critical&data=$error");
    }
}else{
    var_dump($paypal->errors);
    die();
}