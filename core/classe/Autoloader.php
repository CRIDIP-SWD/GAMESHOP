<?php

/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 11/12/2015
 * Time: 00:42
 */
class Autoloader
{
    static function register($categorie)
    {
        spl_autoload_register(array(__CLASS__, $categorie,'autoload'));
    }

    static function autoload($categorie,$class)
    {
        require "classe/".$categorie."/".$class.".php";
    }
}