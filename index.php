<?php
require 'app/classe.php';
App\autoloader::register();

if(isset($_GET['view']))
{
    $view = $_GET['view'];
}else{
    $view = "index";
}

ob_start();
if($view === 'index'){require "view/index.php";}
if($view === 'categorie'){require "view/categorie.php";}

$content = ob_get_clean();
require "view/default.php";