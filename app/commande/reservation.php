<?php
/*
 * DEPRECATED
 */

namespace App\commande;


use App\DB;

class reservation extends DB
{
    /**
     * @param $idclient // INT de l'identifiant client dans la base pour la fonction @function
     * @return string // Retourne le nombre de réservation qu'a le client
     */
    public function count_resa($idclient)
    {
        return $this->count("SELECT COUNT(idreservation) FROM client_reservation WHERE idclient = '$idclient'");
    }
}