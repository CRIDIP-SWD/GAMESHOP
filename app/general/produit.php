<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 27/12/2015
 * Time: 23:17
 */

namespace App\general;


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

}