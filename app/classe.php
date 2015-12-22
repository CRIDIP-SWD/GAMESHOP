<?php
require "app/autoloader.php";
\App\autoloader::register();

use App\app;
use App\constante;
use App\general\head;

$app = new app();
$constante = new constante();
$head = new head();
