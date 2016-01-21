<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 21/01/2016
 * Time: 20:58
 */

namespace App\commande;


class transporteur
{
    public function calc_transport($poids_commande, $indention)
    {
        $fichier = file_get_contents("assets/data/transporteur.php");
        return $fichier;
    }
}