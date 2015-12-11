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
    public static function getUrl($http_encode = "https://", $url, $params = array())
    {
        $params = explode("/", $params);
        return $http_encode.$url."/".$params;
    }
}