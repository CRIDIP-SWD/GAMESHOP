<?php


class constante
{
    /**
     * LISTING DES CONSTANTES DU PROJET
     */
    const ENCRYPT       = "https";
    const ROOT          = self::ENCRYPT."://vps221243.ovh.net/gameshop/";
    const ASSETS        = self::ROOT."assets/";
    const CSS           = self::ASSETS."css/";
    const IMAGES        = self::ASSETS."images/";
    const INCLUDES      = self::ASSETS."include/";
    const JS            = self::ASSETS."js/";

    const CORE          = self::ROOT."core/";
    const CONTROL       = self::CORE."control/";
    const CLASSE        = self::CORE."classe/";

    const NOM_SITE      = "GAMESHOP";
}