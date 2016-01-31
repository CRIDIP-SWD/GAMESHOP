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
    /**
     * @param $idclient // INT du client dans la base pour la fonction @function
     * @return string // Retourne le nombre de bon de réduction pour le client définie
     */
    public function count_vourcher_clt($idclient)
    {
        return $this->count("SELECT COUNT(idvourcher) FROM shop_vourcher WHERE client = '1' AND idclient = '$idclient'");
    }

    /**
     * @param $idclient // INT du client dans la base pour la fonction @function
     * @return array // Retourne les 4 derniers bon de réduction du client
     */
    public function last_vourcher_clt($idclient)
    {
        return $this->query("SELECT * FROM shop_vourcher WHERE client = '1' AND idclient = '$idclient' LIMIT 4");
    }
}