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
$connect = SimplePDO::getInstance();


$constante = new constante();
