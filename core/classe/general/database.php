<?php

/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 11/12/2015
 * Time: 00:27
 */
class database
{
    const HOST          = "localhost";
    const DBNAME        = "gameshop";
    const USERNAME      = "root";
    const PASSWORD      = "1992maxime";

    public function __construct($host = self::HOST, $user = self::USERNAME, $pass = self::PASSWORD, $base = self::DBNAME)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->base = $base;

    }



}