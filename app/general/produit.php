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

    public function verif_stat_product($ref_produit)
    {
        $date_format = new date_format();
        $date = $date_format->convert_strtotime(date("d-m-Y"));
        $date_moin = strtotime($date ."+ 30 days");
        $c_promo = $this->count_promo($ref_produit);


        $produit = $this->query("SELECT * FROM produits WHERE ref_produit = '$ref_produit'");
        $date_produit = $produit[0]->date_sortie;

        if($date_produit >= $date AND $date_produit <= $date_moin)
        {
            return 1;
        }elseif($date_produit > $date){
            return 2;
        }elseif($c_promo != 0){
            return 3;
        }else{
            return 0;
        }
    }

    public function statut_produit($ref_produit)
    {
        $produit = $this->query("SELECT * FROM produits WHERE ref_produit = '$ref_produit'");

        if($produit[0]->stock == 0)
        {
            return 0;
        }elseif($produit[0]->date_sortie > strtotime(date("d-m-Y")))
        {
            return 1;
        }else{
            return 2;
        }
    }

}