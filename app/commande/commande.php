<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 06/01/2016
 * Time: 01:11
 */

namespace App\commande;


use App\app;
use App\DB;

class commande extends DB
{

    public $date_jour = "";

    public function __construct()
    {
        return $this->date_jour = strtotime(date("d-m-Y"));
    }

    public function count_cmd($idclient)
    {
        return $this->count("SELECT COUNT(idcommande) FROM commande WHERE idclient = '$idclient'");
    }

    public function last_cmd($idclient)
    {
        return $this->query("SELECT * FROM commande WHERE idclient = '$idclient' LIMIT 4");
    }

    public function count_article($num_commande)
    {
        return $this->count("SELECT COUNT(idarticle) FROM commande_article WHERE num_commande = '$num_commande'");
    }

    public function verif_article_cmd_sortie($num_commande)
    {
        $sql = $this->count("SELECT COUNT(idarticle) FROM commande_article, produits WHERE commande_article.idarticle = produits.id AND produits.date_sortie >= '$this->date_jour' AND commande_article.num_commande = '$num_commande'");
        return $sql;
    }

    public function verif_article_cmd_stock($num_commande)
    {
        $sql =  $this->count("SELECT COUNT(idarticle) FROM commande_article, produits WHERE commande_article.idarticle = produits.id AND produits.stock < '0' AND commande_article.num_commande = '$num_commande'");
        return $sql;
    }

}