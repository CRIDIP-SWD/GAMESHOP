<?php
/**
 * Created by PhpStorm.
 * User: SWD
 * Date: 06/01/2016
 * Time: 11:16
 */

namespace App\general;


use App\DB;

class newsletter extends DB
{
    public function count_newsletter($idclient)
    {
        return $this->count("SELECT COUNT(idcltnewsletter) FROM client_newsletter WHERE idclient = '$idclient'");
    }
}