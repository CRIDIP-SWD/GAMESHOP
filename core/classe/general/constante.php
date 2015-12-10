<?php


class constante
{
    /**
     * LISTING DES CONSTANTES DU PROJET
     */
    const ENCRYPT       = "http";
    const ROOT          = self::ENCRYPT."://vps221243.ovh.net/gameshop/";
    const ASSETS        = self::ROOT."assets/";
    const CSS           = self::ROOT.self::ASSETS."css/";
    const IMAGES        = self::ROOT.self::ASSETS."images/";
    const INCLUDES      = self::ROOT.self::ASSETS."include/";
    const JS            = self::ROOT.self::ASSETS."js/";

    const CORE          = self::ROOT."core/";
    const CONTROL       = self::ROOT.self::CORE."control/";
    const CLASSE        = self::ROOT.self::CORE."classe/";

    const NOM_SITE      = "GAMESHOP";
}