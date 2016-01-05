<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 29/12/2015
 * Time: 00:08
 */

namespace App\general;


class client
{

    protected $idclient = '';



    public function info_client($email)
    {
        $sql = mysql_query("SELECT * FROM client WHERE email = '$email'")or die(mysql_error());
        $data = mysql_fetch_array($sql);

        $this->idclient = $data['idclient'];

        return $data;
    }

    public function fact_default($idclient)
    {
        $sql = mysql_query("SELECT * FROM client_adresse_fact WHERE idclient = '$idclient' AND `default` = '1'")or die(mysql_error());
        $data = mysql_fetch_array($sql);
        return $data;
    }



}