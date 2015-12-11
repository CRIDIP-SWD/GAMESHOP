<?php
/**
 * Created by PhpStorm.
 * User: MAX
 * Date: 12/12/2015
 * Time: 00:00
 */

namespace App;


class app
{

}

class constante extends app{

    const HTTP       = "http://";
    const URL        = "vps221243.ovh.net/gameshop/";
    const ASSETS     = "assets/";

    public static function getUrl($dos = array(), $assets = true)
    {
        if($assets === true)
        {
            return static::HTTP.static::URL.static::ASSETS.$dos;
        }else{
            return static::HTTP.static::URL.$dos;
        }
    }

}