<?php
session_start();
require 'app/classe.php';
App\autoloader::register();


if(isset($_GET['view']))
{
    $view = $_GET['view'];
}elseif($constante->maintenance($_SERVER['REMOTE_ADDR']) != true){
    $view = "maintenance";
}else{
    $view = "index";
}

ob_start();
if($view === 'index'){require "view/index.php";}
if($view === 'categorie'){require "view/categorie.php";}
if($view === 'produit'){require "view/produit.php";}
if($view === 'login'){require "view/login.php";}
if($view === 'profil'){require "view/profil.php";}

$content = ob_get_clean();
require "view/default.php";