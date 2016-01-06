<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 06/01/2016
 * Time: 01:20
 */

namespace App\commande;


class vourcher
{
    public function count_vourcher_clt($idclient)
    {
        $sql = mysql_query("SELECT COUNT(idvourcher) FROM shop_vourcher WHERE client = '1' AND idclient = '$idclient'")or die(mysql_error());
        $data = mysql_result($sql, 0);
        return $data;
    }

    public function last_vourcher_clt($idclient)
    {
        $sql = mysql_query("SELECT * FROM shop_vourcher WHERE client = '1' AND idclient = '$idclient'")or die(mysql_error());
        $data = mysql_fetch_array($sql);
        return $data;
    }
}