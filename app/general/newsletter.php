<?php
/**
 * Created by PhpStorm.
 * User: SWD
 * Date: 06/01/2016
 * Time: 11:16
 */

namespace App\general;


class newsletter
{
    public function count_newsletter($idclient)
    {
        $sql = mysql_query("SELECT COUNT(idcltnewsletter) FROM client_newsletter WHERE idclient = '$idclient'")or die(mysql_error());
        $data = mysql_result($sql, 0);
        return $data;
    }
}