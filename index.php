<?php
require "vendor/autoload.php";

$router = new App\Router($_GET['url']);

$router->get('/posts', function(){echo "Tous les Articles";});
$router->get('/posts/:id', function($id){echo "Afficher l'article ".$id;});
$router->post('/posts/:id', function($id){echo "Poster pour l'article ".$id;});