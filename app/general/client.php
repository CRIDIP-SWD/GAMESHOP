<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 29/12/2015
 * Time: 00:08
 */

namespace App\general;
use App\DB;

class client extends DB
{

    protected $idclient = '';



    public function info_client($email)
    {
        return $this->query("SELECT * FROM client WHERE email = '$email'");
    }

    public function fact_default($idclient)
    {
        return $this->query("SELECT * FROM client_adresse_fact WHERE idclient = '$idclient' AND `default` = '1'");
    }

    public function count_client()
    {
        return $this->count("SELECT COUNT(idclient) FROM client");
    }


}