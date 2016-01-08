<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 27/12/2015
 * Time: 22:44
 */

namespace App\general;


use App\DB;

class categorie extends DB
{
    public function count_categorie($idcategorie)
    {
        $res = $this->count("SELECT COUNT(ref_produit) FROM produits_categorie WHERE idcategorie = '$idcategorie'");
        return $res;
    }

    public function count_sub($idsubcategorie)
    {
        $res = $this->count("SELECT COUNT(ref_produit) FROM produits_subcategorie WHERE idsubcategorie = '$idsubcategorie'");
        return $res;
    }
}