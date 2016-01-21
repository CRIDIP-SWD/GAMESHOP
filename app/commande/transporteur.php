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
    public function calc_transport_laposte($poids_commande)
    {
        if($poids_commande == 0){return 0.00;}
        if($poids_commande <= 1){return 7.50;}
        if($poids_commande <= 2 && $poids_commande > 1){return 8.50;}
        if($poids_commande <= 5 && $poids_commande > 2){return 12.50;}
        if($poids_commande <= 10 && $poids_commande > 5){return 18.50;}
        if($poids_commande <= 30 && $poids_commande > 10){return 26.50;}
    }

    public function calc_transport_chrono10($poids_commande)
    {
        if($poids_commande == 0){return 0.00;}
        if($poids_commande <= 1){return 34.88;}
        if($poids_commande <= 5 && $poids_commande > 1){return 34.88;}
        if($poids_commande <= 6 && $poids_commande > 5){return 38.17;}
        if($poids_commande <= 7 && $poids_commande > 6){return 39.35;}
        if($poids_commande <= 8 && $poids_commande > 7){return 40.52;}
        if($poids_commande <= 9 && $poids_commande > 8){return 41.71;}
        if($poids_commande <= 10 && $poids_commande > 9){return 42.89;}
        if($poids_commande <= 15 && $poids_commande > 10){return 48.79;}
        if($poids_commande <= 20 && $poids_commande > 15){return 54.70;}
        if($poids_commande <= 25 && $poids_commande > 20){return 60.60;}
        if($poids_commande <= 30 && $poids_commande > 25){return 66.50;}
    }

    public function calc_transport_chrono13($poids_commande)
    {
        if($poids_commande == 0){return 0.00;}
        if($poids_commande <= 1){return 23.87;}
        if($poids_commande <= 5 && $poids_commande > 1){return 24.53;}
        if($poids_commande <= 6 && $poids_commande > 5){return 25.57;}
        if($poids_commande <= 7 && $poids_commande > 6){return 26.50;}
        if($poids_commande <= 8 && $poids_commande > 7){return 27.35;}
        if($poids_commande <= 9 && $poids_commande > 8){return 28.20;}
        if($poids_commande <= 10 && $poids_commande > 9){return 29.05;}
        if($poids_commande <= 15 && $poids_commande > 10){return 33.31;}
        if($poids_commande <= 20 && $poids_commande > 15){return 37.57;}
        if($poids_commande <= 25 && $poids_commande > 20){return 41.84;}
        if($poids_commande <= 30 && $poids_commande > 25){return 46.10;}
    }

    public function calc_transport_ups($poids_commande)
    {
        if($poids_commande == 0){return 0.00;}
        if($poids_commande <= 1){return 21.20;}
        if($poids_commande <= 5 && $poids_commande > 1){return 26.15;}
        if($poids_commande <= 10 && $poids_commande > 5){return 34.62;}
        if($poids_commande <= 20 && $poids_commande > 10){return 40.51;}
        if($poids_commande <= 30 && $poids_commande > 20){return 46.08;}
        if($poids_commande <= 40 && $poids_commande > 30){return 58.07;}
        if($poids_commande <= 50 && $poids_commande > 40){return 64.64;}
        if($poids_commande <= 60 && $poids_commande > 50){return 71.17;}
        if($poids_commande <= 70 && $poids_commande > 60){return 77.94;}
    }
}