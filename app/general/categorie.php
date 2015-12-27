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
        $sql = mysql_query("SELECT COUNT(produits_categorie.ref_produit) FROM produits, produits_categorie, categorie WHERE produits_categorie.ref_produit = produits.ref_produit
                                           AND produits_categorie.idcategorie = categorie.id
                                           AND produits_categorie.idcategorie = '$idcategorie'")or die(mysql_error());
        $res = mysql_result($sql, 0);
        return $res;
    }

    public function count_sub($idsubcategorie)
    {
        $sql = mysql_query("SELECT COUNT(produits_subcategorie.ref_produit) FROM produits, produits_subcategorie, subcategorie WHERE produits_subcategorie.ref_produit = produits.ref_produit
                                                        AND produits_subcategorie.idsubcategorie = subcategorie.id
                                                        AND produits_subcategorie.idsubcategorie = '$idsubcategorie'")or die(mysql_error());
        $res = mysql_result($sql, 0);
        return $res;
    }
}