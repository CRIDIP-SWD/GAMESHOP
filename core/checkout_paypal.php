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

        if($timestamp <= $timestamp30)
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
                die();
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