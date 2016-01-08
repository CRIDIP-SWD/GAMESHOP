<?php
/**
 * Created by PhpStorm.
 * User: SWD
 * Date: 08/01/2016
 * Time: 16:26
 */

namespace App\commande;


class panier
{
    public function __construct()
    {
        if($_SESSION)
        {
            session_start();
        }
    }
}