<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 06/01/2016
 * Time: 01:11
 */

namespace App\commande;


use App\app;

class commande
{

    public $date_jour = "";

    public function __construct()
    {
        return $this->date_jour = strtotime(date("d-m-Y"));
    }

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

    public function verif_article_cmd($num_commande)
    {
        $sql_sortie = mysql_query("SELECT COUNT(idarticle) FROM commande_article, produits WHERE commande_article.idarticle = produits.id AND produits.date_sortie >= ")
    }

}