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

    protected $email = '';
    protected $idclient = '';

    public function __construct($email)
    {
        //Email
        $this->email = $email;
        $info_client = $this->info_client($email);
        $this->idclient = $info_client['idclient'];

        //return INFO
        $this->info_client($email);
        $this->adresse_fact_default();
        $this->adresse_liv_default();

    }

    public function call($function)
    {
        return $this->$function;
    }

    private function info_client($email)
    {
        $sql = mysql_query("SELECT * FROM client WHERE email = '$email'")or die(mysql_error());
        $data = mysql_fetch_array($sql);
        return $data;
    }

    private function adresse_fact_default()
    {
        $sql = mysql_query("SELECT * FROM client_adresse_fact WHERE idclient = '$this->idclient' AND `default` = '1'")or die(mysql_error());
        $data = mysql_fetch_array($sql);
        return $data;
    }

    private function adresse_liv_default()
    {
        $sql = mysql_query("SELECT * FROM client_adresse_liv WHERE idclient = '$this->idclient' AND `default` = '1'")or die(mysql_error());
        $data = mysql_fetch_array($sql);
        return $data;
    }
}