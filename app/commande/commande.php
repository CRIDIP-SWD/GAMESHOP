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

    /**
     * @param $idclient // Id du client de Format INT pour la fonction @function
     * @return string // Retourne un nombre permettant de savoir combient de commande sont attribuer au client
     */
    public function count_cmd($idclient)
    {
        return $this->count("SELECT COUNT(idcommande) FROM commande WHERE idclient = '$idclient'");
    }

    /**
     * @return string // Retourne le nombre total de commande dans la base.
     */
    public function count_commande()
    {
        return $this->count("SELECT COUNT(idcommande) FROM commande");
    }

    /**
     * @param $idclient // Id du client de Format INT pour la fonction @function
     * @return array // Retourne un tableau en LIMIT 4 des commandes du client
     */
    public function last_cmd($idclient)
    {
        return $this->query("SELECT * FROM commande WHERE idclient = '$idclient' LIMIT 4");
    }

    /**
     * @param $num_commande // Numéro de la commande pour la fonction @function
     * @return string // Retourne le nombre de d'article dont dispose la commande appeler
     */
    public function count_article($num_commande)
    {
        return $this->count("SELECT COUNT(idarticle) FROM commande_article WHERE num_commande = '$num_commande'");
    }

    /**
     * DEPRECATED
     * @param $num_commande // Numéro de la commande pour la fonction @function
     * @return string // Retourne un INT 0 or 1 pour savoir si l'article est sortie ou non (PRECOMMANDE)
     */
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