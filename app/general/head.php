<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 22/12/2015
 * Time: 23:33
 */

namespace App\general;


use App\DB;

class head extends DB
{
    public function count_subcategorie($idcategorie)
    {
        return $sql = $this->count("SELECT COUNT(id) FROM subcategorie WHERE subcategorie.idcategorie = '$idcategorie'");
    }

    public function countdown_formatage($datestrt)
    {
        $annee = date("Y", $datestrt);
        $mois = date("m", $datestrt);
        $jour = date("d", $datestrt);

        $formatage = $annee.",".$mois.",".$jour;
        return $formatage;
    }

}