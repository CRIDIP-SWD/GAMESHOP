<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 21/01/2016
 * Time: 20:10
 */

namespace App\commande;


class checkout
{
    /**
     * @param $date_commande // INT envoyer (strtotime)
     * @param $nb_jour_liv // INT chercher dans la base de donnée
     * @return int // Retourne la valeur time() de la livraison Théorique
     */
    public function calc_liv_theo($date_commande, $nb_jour_liv)
    {
        $nb_jour_int = 86400 * $nb_jour_liv;
        $date_livraison = $date_commande + $nb_jour_int;

        if(date("N", $date_livraison) === 7)
        {
            $date_liv_theo = $date_livraison + 86400;
            return $date_liv_theo;
        }else{
            $date_liv_theo = $date_livraison;
            return $date_liv_theo;
        }
    }
}