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
        return $sql = $this->query("SELECT COUNT(id) FROM subcategorie WHERE subcategorie.idcategorie = '$idcategorie'");
    }

}