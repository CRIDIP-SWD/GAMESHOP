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

