<?php
/**
 * Created by PhpStorm.
 * User: SWD
 * Date: 06/01/2016
 * Time: 11:02
 */

namespace App\commande;


class reservation
{
    public function count_resa($idclient)
    {
        $sql = mysql_query("SELECT COUNT(idreservation) FROM client_reservation WHERE idclient = '$idclient'")or die(mysql_error());
        $data = mysql_result($sql, 0);
        return $data;
    }
}