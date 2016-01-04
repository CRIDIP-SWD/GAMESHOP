<?php
session_start();
require 'app/classe.php';
App\autoloader::register();

if($constante->maintenance($_SERVER['REMOTE_ADDR']) != true)
{
    header("location: index.php?view=maintenance");
}

if(isset($_GET['view']))
{
    $view = $_GET['view'];
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