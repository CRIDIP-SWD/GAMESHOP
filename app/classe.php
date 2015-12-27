<?php
require dirname(__DIR__)."/app/autoloader.php";
\App\autoloader::register();

use App\app;
use App\constante;
use App\date_format;
use App\general\categorie;
use App\general\head;

$app = new app();
$constante = new constante();
$date_format = new date_format();
$head = new head();
$categorie_cls = new categorie();
