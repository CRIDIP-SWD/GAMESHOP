<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 27/12/2015
 * Time: 22:44
 */

namespace App\general;


class categorie
{
    public function count_categorie($idcategorie)
    {
        $sql = mysql_query("SELECT COUNT(ref_produit) FROM produits_categorie WHERE idcategorie = '$idcategorie'")or die(mysql_error());
        $res = mysql_result($sql, 0);
        return $res;
    }

    public function count_sub($idsubcategorie)
    {
        $sql = mysql_query("SELECT COUNT(ref_produit) FROM produits_subcategorie WHERE idsubcategorie = '$idsubcategorie'")or die(mysql_error());
        $res = mysql_result($sql, 0);
        return $res;
    }
}