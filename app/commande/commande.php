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

    public function count_cmd($idclient)
    {
        $sql = mysql_query("SELECT COUNT(idcommande) FROM commande WHERE idclient = '$idclient'")or die(mysql_error());
        $data = mysql_result($sql, 0);
        return $data;
    }

    public function last_cmd($idclient)
    {
        $sql = mysql_query("SELECT * FROM commande WHERE idclient = '$idclient' LIMIT 4")or die(mysql_error());
        $data = mysql_fetch_array($sql);
        return $data;
    }

    public function count_article($num_commande)
    {
        $sql = mysql_query("SELECT COUNT(idarticle) FROM commande_article WHERE num_commande = '$num_commande'")or die(mysql_error());
        $data = mysql_result($sql, 0);
        return $data;
    }
}