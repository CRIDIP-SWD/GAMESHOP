<?php
/**
 * Created by PhpStorm.
 * User: SWD
 * Date: 06/01/2016
 * Time: 11:02
 */

namespace App\commande;


use App\DB;

class reservation extends DB
{
    public function count_resa($idclient)
    {
        return $this->count("SELECT COUNT(idreservation) FROM client_reservation WHERE idclient = '$idclient'");
    }
}