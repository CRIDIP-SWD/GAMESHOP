<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 22/12/2015
 * Time: 23:33
 */

namespace App\general;


class head
{
    public function count_subcategorie($idcategorie)
    {
        $sql = mysql_query("SELECT COUNT(id) FROM subcategorie WHERE idcategorie = '$idcategorie'")or die(mysql_error());
        $count = mysql_result($sql, 0);
        return $count;
    }

}