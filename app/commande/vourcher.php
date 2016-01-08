<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 06/01/2016
 * Time: 01:20
 */

namespace App\commande;


use App\DB;

class vourcher extends DB
{
    public function count_vourcher_clt($idclient)
    {
        return $this->count("SELECT COUNT(idvourcher) FROM shop_vourcher WHERE client = '1' AND idclient = '$idclient'");
    }

    public function last_vourcher_clt($idclient)
    {
        return $this->query("SELECT * FROM shop_vourcher WHERE client = '1' AND idclient = '$idclient' LIMIT 4");
    }
}