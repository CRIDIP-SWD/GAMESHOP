<?php
require dirname(__DIR__)."/app/autoloader.php";
\App\autoloader::register();

use App\app;
use App\constante;
use App\date_format;
use App\fonction;
use App\general\categorie;
use App\general\client;
use App\general\head;
use App\general\produit;

$app = new app();
$constante = new constante();
$date_format = new date_format();
$fonction = new fonction();
$head = new head();
$categorie_cls = new categorie();
$produit_cls = new produit();
$client_cls = new client();




if(isset($_SESSION['logged'])){
    $info_client = $client_cls->info_client($_SESSION['email']);
}


//VENDOR COMPOSER
include dirname(__DIR__)."/vendor/autoload.php";
/*
 * PSN NETWORK API INIT
 */
$client_psn = new \Guzzle\Http\Client('', ['redirect.disable' => true]);
$connect_psn = new \Gumer\PSN\Http\Connection('FR', 'FR');
$connect_psn->setGuzzle($client_psn);
$provider_psn = new \Gumer\PSN\Authentication\UserProvider($connect_psn);
$auth_psn = \Gumer\PSN\Authentication\Manager::instance($provider_psn);

$auth_psn->attempt('syltheron@gmail.com', '1992maxime');
$request_info = new \Gumer\PSN\Requests\GetMyInfoRequest();
$response_info = $connect_psn->call($request_info);
$info = json_decode($response_info->getBody(true), true);
var_dump($info);
die();
