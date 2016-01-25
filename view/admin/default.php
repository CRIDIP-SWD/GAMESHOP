<?php
ini_set("display_errors", 1);
?>
<!doctype html>
<html class="fixed">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title><?= \App\constante::NOM_SITE; ?></title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>bootstrap/css/bootstrap.css" />

    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>bootstrap-datepicker/css/datepicker3.css" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/stylesheets/'), true, false); ?>theme.css" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/stylesheets/'), true, false); ?>skins/default.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/stylesheets/'), true, false); ?>theme-custom.css">

    <!-- Head Libs -->
    <script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>modernizr/modernizr.js"></script>



    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>morris/morris.css" />
    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>chartist/chartist.css" />
</head>
<body>
<section class="body">

    <!-- start: header -->
    <header class="header">
        <div class="logo-container">
            <a href="index.php?view=admin_sha" class="logo">
                <img src="assets/images/logo.png" height="35" alt="Porto Admin" />
            </a>
            <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>

        <!-- start: search & user box -->
        <div class="header-right">

            <div id="userbox" class="userbox">
                <a href="#" data-toggle="dropdown">
                    <figure class="profile-picture">
                        <img src="<?= $constante->getUrl(array('porto/images/'), true, false); ?>!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
                    </figure>
                    <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                        <span class="name">John Doe Junior</span>
                        <span class="role">administrator</span>
                    </div>

                    <i class="fa custom-caret"></i>
                </a>

                <div class="dropdown-menu">
                    <ul class="list-unstyled">
                        <li class="divider"></li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="core/login.php?action=logout"><i class="fa fa-power-off"></i> Déconnexion</a>
                        </li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="index.php?view=index"><i class="fa fa-arrow-left"></i> Retour au Site Web</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end: search & user box -->
    </header>
    <!-- end: header -->

    <div class="inner-wrapper">
        <!-- start: sidebar -->
        <aside id="sidebar-left" class="sidebar-left">

            <div class="sidebar-header">
                <div class="sidebar-title">
                    <?= \App\constante::NOM_SITE; ?>
                </div>
                <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>

            <div class="nano">
                <div class="nano-content">
                    <nav id="menu" class="nav-main" role="navigation">
                        <ul class="nav nav-main">
                            <li>
                                <a href="index.php?view=admin_sha">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    <span>Accueil</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.php?view=admin_sha&sub=client">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <span>Client</span>
                                </a>
                            </li>
                            <li class="nav-parent">
                                <a>
                                    <i class="fa fa-copy" aria-hidden="true"></i>
                                    <span>Produits</span>
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a href="index.php?view=admin_sha&sub=categories">
                                            Catégories
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.php?view=admin_sha&sub=produits">
                                            Produits
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="index.php?view=admin_sha&sub=commande">
                                    <i class="fa fa-file" aria-hidden="true"></i>
                                    <span>Commandes</span>
                                </a>
                            </li>
                            <li class="nav-parent">
                                <a>
                                    <i class="fa fa-cogs" aria-hidden="true"></i>
                                    <span>Configuration</span>
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a href="index.php?view=admin_sha&sub=config_slide">
                                            Slideshow
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.php?view=admin_sha&sub=config_cron">
                                            CRON
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>

        </aside>
        <!-- end: sidebar -->

        <?= $content; ?>
    </div>

    <aside id="sidebar-right" class="sidebar-right">
        <div class="nano">
            <div class="nano-content">
                <a href="#" class="mobile-close visible-xs">
                    Collapse <i class="fa fa-chevron-right"></i>
                </a>

                <div class="sidebar-right-wrapper">

                    <div class="sidebar-widget widget-calendar">
                        <h6>Upcoming Tasks</h6>
                        <div data-plugin-datepicker data-plugin-skin="dark" ></div>

                        <ul>
                            <li>
                                <time datetime="2014-04-19T00:00+00:00">04/19/2014</time>
                                <span>Company Meeting</span>
                            </li>
                        </ul>
                    </div>

                    <div class="sidebar-widget widget-friends">
                        <h6>Friends</h6>
                        <ul>
                            <li class="status-online">
                                <figure class="profile-picture">
                                    <img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                            <li class="status-online">
                                <figure class="profile-picture">
                                    <img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                            <li class="status-offline">
                                <figure class="profile-picture">
                                    <img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                            <li class="status-offline">
                                <figure class="profile-picture">
                                    <img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </aside>
</section>

<!-- Vendor -->
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>jquery/jquery.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>bootstrap/js/bootstrap.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>nanoscroller/nanoscroller.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>magnific-popup/magnific-popup.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>jquery-placeholder/jquery.placeholder.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="<?= $constante->getUrl(array('porto/javascripts/'), true, false); ?>theme.js"></script>

<!-- Theme Custom -->
<script src="<?= $constante->getUrl(array('porto/javascripts/'), true, false); ?>theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="<?= $constante->getUrl(array('porto/javascripts/'), true, false); ?>theme.init.js"></script>

<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>flot/jquery.flot.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>flot-tooltip/jquery.flot.tooltip.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>flot/jquery.flot.pie.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>flot/jquery.flot.categories.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>flot/jquery.flot.resize.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>morris/morris.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>pnotify/pnotify.custom.js"></script>

<script src="<?= $constante->getUrl(array('porto/javascripts/'), true, false); ?>ui-elements/examples.charts.js"></script>
<script src="<?= $constante->getUrl(array('porto/javascripts/'), true, false); ?>ui-elements/examples.lightbox.js"></script>
</body>
</html>