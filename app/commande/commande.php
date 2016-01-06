<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 06/01/2016
 * Time: 01:11
 */

namespace App\commande;


class commande
{
    public function last_cmd($idclient)
    {
        $sql = mysql_query("SELECT * FROM commande WHERE idclient = '$idclient' LIMIT 1")or die(mysql_error());
        $data = mysql_fetch_array($sql);
        return $data;
    }
}