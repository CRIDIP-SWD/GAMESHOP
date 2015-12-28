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
    public function __construct($email)
    {
        return $this->info_client($email);
    }

    private function info_client($email)
    {
        $sql = mysql_query("SELECT * FROM client WHERE email = '$email'")or die(mysql_error());
        $data = mysql_fetch_array($sql);
        return $data;
    }
}