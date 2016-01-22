<?php
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
    var_dump($response);
}else{
    var_dump($paypal->errors);
    die();
}