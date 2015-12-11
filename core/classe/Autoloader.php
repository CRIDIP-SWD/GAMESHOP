<?php

/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 11/12/2015
 * Time: 00:42
 */
class Autoloader
{
    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    static function autoload($class)
    {
        require "classe/".$class.".php";
    }
}