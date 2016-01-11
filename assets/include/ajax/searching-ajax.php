<?php
include "../../../app/classe.php";

if(isset($_GET['motclef']))
{
    $motclef = $_GET['motclef'];
    $recherche = $DB->query("SELECT designation FROM produits WHERE designation LIKE :motclef", array("motclef" => $motclef.'%'));
    $count = $DB->count("SELECT designation FROM produits WHERE designation LIKE :motclef", array("motclef" => $motclef.'%'));

    if($count == 1)
    {
        foreach($recherche as $data):
            echo "Titre: ".$data->designation;
        endforeach;
    }else{
        echo "Aucun Résultat pour ".$motclef;
    }
}