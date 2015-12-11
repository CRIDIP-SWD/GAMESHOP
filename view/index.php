<?php

require "app/autoloader.php";
\App\autoloader::register();

use App\app;

$app = new app();

var_dump($app->getUrl("","vps221243.ovh.net", array("assets/")));