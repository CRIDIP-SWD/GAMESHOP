<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 27/12/2015
 * Time: 23:17
 */

namespace App\general;
use App\date_format;
use App\DB;

class produit extends DB
{
    public function count_images($ref_produit)
    {
        return $this->count("SELECT COUNT(ref_produit) FROM produits_images WHERE ref_produit = '$ref_produit'");
    }

    public function count_bonus($ref_produit)
    {
        return $this->count("SELECT COUNT(ref_produit) FROM produits_bonus WHERE ref_produit = '$ref_produit'");
    }

    public function count_videos($ref_produit)
    {
        return $this->count("SELECT COUNT(ref_produit) FROM produits_videos WHERE ref_produit = '$ref_produit'");
    }

    public function count_promo($ref_produit)
    {
        return $this->count("SELECT COUNT(ref_produit) FROM produits_promotion WHERE ref_produit = '$ref_produit'");
    }

    public function verif_stat_global($ref_produit)
    {
        $data = $this->query("SELECT * FROM produits WHERE ref_produit = :ref_produit", array("ref_produit" => $ref_produit));

        switch($data[0]->statut_global)
        {
            case 1:
                return 1;
                break;

            case 2:
                return 2;
                break;

            case 3:
                return 3;
                break;

            case 4:
                return 4;
                break;

            default:
                return 1;
                break;
        }
    }

    public function verif_stat_stock($ref_produit)
    {
        $data = $this->query("SELECT * FROM produits WHERE ref_produit = :ref_produit", array("ref_produit" => $ref_produit));

        switch($data[0]->statut_stock)
        {
            case 0:
                return 0;
                break;

            case 1:
                return 1;
                break;

            case 2:
                return 2;
                break;

            case 3:
                return 3;
                break;

            default:
                return 2;
                break;
        }
    }

    public function revenue_point_total($num_commande)
    {
        $point = $this->query("SELECT SUM(revenue_point) as revenue_point FROM commande_article, produits WHERE commande_article.ref_produit = produits.ref_produit AND num_commande = :num_commande", array(
            "num_commande" => $num_commande
        ));
        return $point;
    }

    public function count_point_total($num_commande)
    {
        $point = $this->query("SELECT SUM(cout_point) as count_point FROM commande_article, produits WHERE commande_article.ref_produit = produits.ref_produit AND num_commande = :num_commande", array(
            "num_commande" => $num_commande
        ));
        return $point;
    }

    public function calcCoutPointClient($num_commande, $idclient)
    {
        $pointClient = $this->query("SELECT point FROM client WHERE idclient = :idclient", array(
            "idclient"  => $idclient
        ));

        $cout = $this->count_point_total($num_commande);

        $cout -= $pointClient;
        return $cout;
    }

    public function calcRevenuePointClient($num_commande, $idclient)
    {
        $pointClient = $this->query("SELECT point FROM client WHERE idclient = :idclient", array(
            "idclient"  => $idclient
        ));
        $point = $pointClient[0]->point;
        $cout = $this->revenue_point_total($num_commande);

        $cout =+ $point =+ $cout;
        return $cout;
    }


}