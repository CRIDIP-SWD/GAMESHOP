<?php
/**
 * Created by PhpStorm.
 * User: MAX
 * Date: 12/12/2015
 * Time: 00:00
 */

namespace App;

/**
 * Class app
 * @package App
 *
 * Définie la base du projet
 *
 */
class app
{
    public function __construct()
    {
        mysql_connect("localhost", "root", "1992maxime")or die(mysql_error());
        mysql_select_db("gameshop")or die(mysql_error());
    }
}

/**
 * Class constante
 * @package App
 *
 * Définie un ensemble de constante à modifié à chaque début de projet
 *
 */
class constante extends app{

    const HTTP       = "https://";
    const URL        = "vps221243.ovh.net/gameshop/";
    const ASSETS     = "assets/";
    const NOM_SITE   = "Gameshop";
    const SOURCES    = "ns342142.ip-5-196-76.eu/sources/gameshop/";

    /**
     * @param $dos array Permet de parser sous forme string le tableau array=$dos
     * @return string retourne un format standard de link HTML
     */
    private static function parseArray($dos)
    {
        return implode("/", $dos);
    }

    /**
     * @param array $dos Il permet d'envoyer à la fonction la liste des dossiers à parcourir sous forme de tableau
     * @param bool|true $assets Permet d'insérer de manière automatique le dossier 'assets'
     * @param bool $sources Renvoie les informations vers le fichiers DataSources de CRIDIP
     * @return string Suivant le bool $assets, il retourne la redirection sous format de lien(string)
     */
    public static function getUrl($dos = array(), $assets = true, $sources = true)
    {
        if($assets === true)
        {
            return static::HTTP.static::URL.static::ASSETS.static::parseArray($dos);
        }elseif($sources === true){
            return static::HTTP.static::SOURCES;
        }else{
            return static::HTTP.static::URL.$dos;
        }

    }


}