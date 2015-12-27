<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 27/12/2015
 * Time: 23:17
 */

namespace App\general;
use App\date_format;

class produit
{
    public function count_images($ref_produit)
    {
        $sql = mysql_query("SELECT COUNT(ref_produit) FROM produits_images WHERE ref_produit = '$ref_produit'")or die(mysql_error());
        $res = mysql_result($sql,0);
        return $res;
    }

    public function count_bonus($ref_produit)
    {
        $sql = mysql_query("SELECT COUNT(ref_produit) FROM produits_bonus WHERE ref_produit = '$ref_produit'")or die(mysql_error());
        $res = mysql_result($sql,0);
        return $res;
    }

    public function count_videos($ref_produit)
    {
        $sql = mysql_query("SELECT COUNT(ref_produit) FROM produits_videos WHERE ref_produit = '$ref_produit'")or die(mysql_error());
        $res = mysql_result($sql,0);
        return $res;
    }

    public function count_promo($ref_produit)
    {
        $sql = mysql_query("SELECT COUNT(ref_produit) FROM produits_promotion WHERE ref_produit = '$ref_produit'")or die(mysql_error());
        $res = mysql_result($sql,0);
        return $res;
    }

    public function verif_stat_product($ref_produit)
    {
        $date_format = new date_format();
        $date = $date_format->convert_strtotime(date("d-m-Y"));
        $date_moin = strtotime($date ."+ 30 days");
        $c_promo = $this->count_promo($ref_produit);

        $sql_produit = mysql_query("SELECT * FROM produits WHERE ref_produit = '$ref_produit'")or die(mysql_error());
        $produit = mysql_fetch_array($sql_produit);
        $date_produit = $produit['date_sortie'];

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

}