<?php include "core/classe.php"; ?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
    ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?= $constante::CSS; ?>bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="<?= $constante::ASSETS; ?>style.css" type="text/css" />
    <link rel="stylesheet" href="<?= $constante::CSS; ?>dark.css" type="text/css" />
    <link rel="stylesheet" href="<?= $constante::CSS; ?>font-icons.css" type="text/css" />
    <link rel="stylesheet" href="<?= $constante::CSS; ?>animate.css" type="text/css" />
    <link rel="stylesheet" href="<?= $constante::CSS; ?>magnific-popup.css" type="text/css" />

    <link rel="stylesheet" href="<?= $constante::CSS; ?>responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lt IE 9]>
    <script src="https://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <!-- External JavaScripts
	============================================= -->
    <script type="text/javascript" src="<?= $constante::JS; ?>jquery.js"></script>
    <script type="text/javascript" src="<?= $constante::JS; ?>plugins.js"></script>

    <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script type="text/javascript" src="<?= $constante::INCLUDES; ?>rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="<?= $constante::INCLUDES; ?>rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="<?= $constante::INCLUDES; ?>rs-plugin/css/settings.css" media="screen" />

    <!-- Document Title
    ============================================= -->
    <title><?= $constante::NOM_SITE; ?></title>

    <style>

        .revo-slider-emphasis-text {
            font-size: 58px;
            font-weight: 700;
            letter-spacing: 1px;
            font-family: 'Raleway', sans-serif;
            padding: 15px 20px;
            border-top: 2px solid #FFF;
            border-bottom: 2px solid #FFF;
        }

        .revo-slider-desc-text {
            font-size: 20px;
            font-family: 'Lato', sans-serif;
            width: 650px;
            text-align: center;
            line-height: 1.5;
        }

        .revo-slider-caps-text {
            font-size: 16px;
            font-weight: 400;
            letter-spacing: 3px;
            font-family: 'Raleway', sans-serif;
        }

    </style>

</head>
