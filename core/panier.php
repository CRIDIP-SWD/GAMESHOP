<?php
session_start();
include "../app/classe.php";
$erreur = false;

/*if(isset($_GET['action']) && $_GET['action'] == 'ajout')
{
    $l = $_GET['l'];
    $p = $_GET['p'];
    $q = $_GET['q'];

    $panier_cls->ajouterArticle($l,$q, $p);
}

if(isset($_GET['action']) && $_GET['action'] == 'suppression')
{

    $l = $_GET['l'];

    $panier_cls->supprimerArticle($l);

}

if(isset($_GET['action']) && $_GET['action'] == 'refresh')
{
    $l = $_GET['l'];
    $q = $_GET['q'];
    $panier_cls->modifierQTeArticle($l, $q);

}
*/

$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null)
{
    if(!in_array($action,array('ajout', 'suppression', 'refresh', 'blank')))
        $erreur=true;

    //récuperation des variables en POST ou GET
    $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
    $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
    $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;

    //Suppression des espaces verticaux
    $l = preg_replace('#\v#', '',$l);
    //On verifie que $p soit un float
    $p = floatval($p);

    //On traite $q qui peut etre un entier simple ou un tableau d'entier

    if (is_array($q)){
        $qteProduit = array();
        $i=0;
        foreach ($q as $contenu){
            $qteProduit[$i++] = intval($contenu);
        }
    }
    else
        $q = intval($q);

}

if (!$erreur){
    switch($action){
        Case "ajout":
            $panier_cls->ajouterArticle($l,$q,$p);
            break;

        Case "suppression":
            $panier_cls->supprimerArticle($l);
            break;

        Case "refresh" :
            $panier_cls->modifierQTeArticle($l,$q);
            break;

        case "blank":
            $panier_cls->supprimePanier();
            break;

        Default:
            break;
    }
}

