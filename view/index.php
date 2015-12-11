<?php

require "app/autoloader.php";
\App\autoloader::register();

use App\app;
use App\constante;

$app = new app();
$constante = new constante();

var_dump($constante->getUrl(array("js/", "plugins/"), true));