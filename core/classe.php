<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 11/12/2015
 * Time: 00:40
 * IMPORTE LES CLASSES
 */

require "vendor/autoload.php";
require "Autoloader.php";
Autoloader::register();

DEFINE("HOST", "localhost");
DEFINE("DBNAME", "gameshop");
DEFINE("USERNAME", "root");
DEFINE("PASSWORD", "1992maxime");
$connect = SimplePDO::getInstance();


$constante = new constante();
