<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 21/01/2016
 * Time: 20:10
 */

namespace App\commande;


use App\DB;

class checkout extends DB
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

    public function calc_total_point_cmd($num_commande)
    {
        $point = $this->query("SELECT SUM(cout_point) as cout_point FROM commande_article, produits WHERE commande_article.ref_produit = produits.ref_produit AND num_commande = :num_commande", array(
            "num_commande" => $num_commande
        ));
        return $point;
    }
}