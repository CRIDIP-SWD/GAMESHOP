<?php
session_start();
require 'app/classe.php';
App\autoloader::register();


if(isset($_GET['view']))
{
    $view = $_GET['view'];
}else{
    $view = "index";
}

if($constante->maintenance($_SERVER['REMOTE_ADDR']) == true)
{
    $view = "maintenance";
}

ob_start();
if($view === 'index'){require "view/index.php";}
if($view === 'categorie'){require "view/categorie.php";}
if($view === 'produit'){require "view/produit.php";}
if($view === 'login'){require "view/login.php";}
if($view === 'profil'){require "view/profil.php";}
if($view === 'maintenance'){require "view/maintenance.php";}
if($view === 'panier'){require "view/panier.php";}
if($view === 'checkout'){require "view/checkout.php";}

$content = ob_get_clean();
require "view/default.php";