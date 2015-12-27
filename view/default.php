<?php
session_start();
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
    ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?= $constante->getUrl(array('css/')); ?>bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="<?= $constante->getUrl(array()); ?>style.css" type="text/css" />
    <link rel="stylesheet" href="<?= $constante->getUrl(array('css/')); ?>dark.css" type="text/css" />
    <link rel="stylesheet" href="<?= $constante->getUrl(array('css/')); ?>font-icons.css" type="text/css" />
    <link rel="stylesheet" href="<?= $constante->getUrl(array('css/')); ?>animate.css" type="text/css" />
    <link rel="stylesheet" href="<?= $constante->getUrl(array('css/')); ?>magnific-popup.css" type="text/css" />

    <link rel="stylesheet" href="<?= $constante->getUrl(array('css/')); ?>responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lt IE 9]>
    <script src="https://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <!-- External JavaScripts
    ============================================= -->
    <script type="text/javascript" src="<?= $constante->getUrl(array('js/')); ?>jquery.js"></script>
    <script type="text/javascript" src="<?= $constante->getUrl(array('js/')); ?>plugins.js"></script>

    <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script type="text/javascript" src="<?= $constante->getUrl(array('include/')); ?>rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="<?= $constante->getUrl(array('include/')); ?>rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="<?= $constante->getUrl(array('include/')); ?>rs-plugin/css/settings.css" media="screen" />

    <!-- Document Title
    ============================================= -->
    <title><?= \App\constante::NOM_SITE; ?></title>

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

<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    <!-- Top Bar
		============================================= -->
    <div id="top-bar" class="hidden-xs">

        <div class="container clearfix">

            <div class="col_half nobottommargin">

                <p class="nobottommargin"><strong>Téléphone:</strong> 0633134330 | <strong>Email:</strong> contact@gameshop.com</p>

            </div>

            <div class="col_half col_last fright nobottommargin">

                <!-- Top Links
                ============================================= -->
                <?php if(isset($_SESSION)){ ?>
                <div class="top-links">
                    <ul>
                        <li><a href="#">MOCKELYN Maxime</a>
                            <ul>
                                <li><a href="">TEST</a></li>
                                <li><a href="">TEST</a></li>
                                <li><a href="">TEST</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <?php }else{ ?>
                <div class="top-links">
                    <ul>
                        <li><a href="#">Connexion</a>
                            <div class="top-link-section">
                                <form id="top-login" role="form">
                                    <div class="input-group" id="top-login-username">
                                        <span class="input-group-addon"><i class="icon-user"></i></span>
                                        <input type="email" class="form-control" placeholder="Adresse Mail" required="">
                                    </div>
                                    <div class="input-group" id="top-login-password">
                                        <span class="input-group-addon"><i class="icon-key"></i></span>
                                        <input type="password" class="form-control" placeholder="Mot de Passe" required="">
                                    </div>
                                    <label class="checkbox">
                                        <input type="checkbox" value="remember-me"> Remember me
                                    </label>
                                    <button class="btn btn-danger btn-block" type="submit">Sign in</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
                <?php } ?>
                <!-- .top-links end -->

            </div>

        </div>

    </div><!-- #top-bar end -->

    <!-- Header
    ============================================= -->
    <header id="header">

        <div id="header-wrap">

            <div class="container clearfix">

                <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                <!-- Logo
                ============================================= -->
                <div id="logo">
                    <a href="index.html" class="standard-logo" data-dark-logo="images/logo-dark.png"><img src="assets/images/logo.png" alt="Canvas Logo"></a>
                    <a href="index.html" class="retina-logo" data-dark-logo="images/logo-dark@2x.png"><img src="images/logo@2x.png" alt="Canvas Logo"></a>
                </div><!-- #logo end -->

                <!-- Primary Navigation
                ============================================= -->
                <nav id="primary-menu">

                    <ul>
                        <li class="current"><a href="#"><div>Home</div><span>Lets Start</span></a></li>
                        <?php
                        $sql_categorie = mysql_query("SELECT * FROM categorie WHERE categorie.designation_cat != 'PRODUIT D&Eacute;RIV&Eacute;S'")or die(mysql_error());
                        while($cat = mysql_fetch_array($sql_categorie))
                        {
                            $idcategorie = $cat['id'];
                        ?>
                            <?php
                            if($head->count_subcategorie($cat['id']) == 0){
                            ?>
                            <li><a href="#"><div><?= $cat['designation_cat']; ?></div><span>Awesome Works</span></a></li>
                            <?php }else{ ?>
                                <li class="mega-menu"><a href="#"><div><?= $cat['designation_cat']; ?></div><span>Out of the Box</span></a>
                                    <div class="mega-menu-content style-2 col-4 clearfix">
                                        <ul>
                                            <li class="mega-menu-title"><a href="#"><div><?= $cat['designation_cat']; ?></div></a>
                                                <ul>
                                                <?php
                                                $sql_sub = mysql_query("SELECT * FROM subcategorie WHERE idcategorie = ".$cat['id'])or die(mysql_error());
                                                while($sub = mysql_fetch_array($sql_sub))
                                                {
                                                    ?>
                                                    <li><a href="#"><div><?= $sub['designation_subcat']; ?></div></a></li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li class="mega-menu-title"><a href="#"><div>Nouveauté</div></a>
                                                <ul>
                                                    <?php
                                                    $date = $date_format->convert_strtotime(date("d-m-Y"));
                                                    $date_moin = strtotime($date ."+ 30 days");
                                                    $sql_new = mysql_query("SELECT * FROM produits, produits_categorie WHERE date_sortie >= '$date' AND date_sortie <= '$date_moin' AND produits_categorie.idcategorie = '$idcategorie' LIMIT 1")or die(mysql_error());
                                                    while($new = mysql_fetch_array($sql_new))
                                                    {
                                                    ?>
                                                    <li>
                                                        <div class="product clearfix">
                                                            <div class="product-image">
                                                                <a href="#"><img src="<?= $constante->getUrl('', false,true); ?>produit/cards/<?= $new['ref_produit']; ?>.jpg" alt="Unisex Sunglasses"></a>
                                                                <a href="#"><img src="<?= $constante->getUrl('', false,true); ?>produit/cards/<?= $new['ref_produit']; ?>.jpg" alt="Unisex Sunglasses"></a>
                                                                <!--<div class="sale-flash">Sale!</div>-->
                                                                <div class="product-overlay">
                                                                    <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Ajouter au panier</span></a>
                                                                    <a href="assets/include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Voir</span></a>
                                                                </div>
                                                            </div>
                                                            <div class="product-desc">
                                                                <div class="product-title"><h3><a href="#"><?= $new['designation']; ?></a></h3></div>
                                                                <div class="product-price"><ins><?= number_format($new['prix_vente'], 2, ',', ' ')." €"; ?></ins></div>
                                                                <div class="product-rating">
                                                                    <i class="icon-star3"></i>
                                                                    <i class="icon-star3"></i>
                                                                    <i class="icon-star3"></i>
                                                                    <i class="icon-star-empty"></i>
                                                                    <i class="icon-star-empty"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                        <?php } ?>
                                                </ul>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li class="mega-menu-title"><a href="#"><div>Promotion</div></a>
                                                <ul>
                                                    <!--<li>
                                                        <div class="product clearfix">
                                                            <div class="product-image">
                                                                <a href="#"><img src="<?= $constante->getUrl('', false,true); ?>produit/cards/ps4.jpg" alt="Unisex Sunglasses"></a>
                                                                <a href="#"><img src="<?= $constante->getUrl('', false,true); ?>produit/cards/ps4.jpg" alt="Unisex Sunglasses"></a>
                                                                <!--<div class="sale-flash">Sale!</div>-->
                                                                <!--<div class="product-overlay">
                                                                    <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Ajouter au panier</span></a>
                                                                    <a href="assets/include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Voir</span></a>
                                                                </div>
                                                            </div>
                                                            <div class="product-desc">
                                                                <div class="product-title"><h3><a href="#">Call Of Duty: Black-Ops III NukeTown</a></h3></div>
                                                                <div class="product-price"><ins>69,90 €</ins></div>
                                                                <div class="product-rating">
                                                                    <i class="icon-star3"></i>
                                                                    <i class="icon-star3"></i>
                                                                    <i class="icon-star3"></i>
                                                                    <i class="icon-star-empty"></i>
                                                                    <i class="icon-star-empty"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>-->
                                                </ul>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li class="mega-menu-title"><a href="#"><div>Précommande</div></a>
                                                <ul>
                                                    <?php
                                                    $date = $date_format->convert_strtotime(date("d-m-Y"));
                                                    $date_moin = strtotime($date ."+ 30 days");
                                                    $sql_preco = mysql_query("SELECT * FROM produits, produits_categorie WHERE date_sortie > '$date' AND produits_categorie.idcategorie = '$idcategorie' LIMIT 1")or die(mysql_error());
                                                    while($preco = mysql_fetch_array($sql_preco))
                                                    {
                                                        ?>
                                                        <li>
                                                            <div class="product clearfix">
                                                                <div class="product-image">
                                                                    <a href="#"><img src="<?= $constante->getUrl('', false,true); ?>produit/cards/<?= $preco['ref_produit']; ?>.jpg" alt="Unisex Sunglasses"></a>
                                                                    <a href="#"><img src="<?= $constante->getUrl('', false,true); ?>produit/cards/<?= $preco['ref_produit']; ?>.jpg" alt="Unisex Sunglasses"></a>
                                                                    <!--<div class="sale-flash">Sale!</div>-->
                                                                    <div class="product-overlay">
                                                                        <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Ajouter au panier</span></a>
                                                                        <a href="assets/include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Voir</span></a>
                                                                    </div>
                                                                </div>
                                                                <div class="product-desc">
                                                                    <div class="product-title"><h3><a href="#"><?= $preco['designation']; ?></a></h3></div>
                                                                    <div class="product-price"><ins><?= number_format($preco['prix_vente'], 2, ',', ' ')." €"; ?></ins></div>
                                                                    <div class="product-rating">
                                                                        <i class="icon-star3"></i>
                                                                        <i class="icon-star3"></i>
                                                                        <i class="icon-star3"></i>
                                                                        <i class="icon-star-empty"></i>
                                                                        <i class="icon-star-empty"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>

                    <!-- Top Cart
                    ============================================= -->
                    <div id="top-cart">
                        <a href="#" id="top-cart-trigger"><i class="icon-shopping-cart"></i><span>5</span></a>
                        <div class="top-cart-content">
                            <div class="top-cart-title">
                                <h4>Shopping Cart</h4>
                            </div>
                            <div class="top-cart-items">
                                <div class="top-cart-item clearfix">
                                    <div class="top-cart-item-image">
                                        <a href="#"><img src="images/shop/small/1.jpg" alt="Blue Round-Neck Tshirt" /></a>
                                    </div>
                                    <div class="top-cart-item-desc">
                                        <a href="#">Blue Round-Neck Tshirt</a>
                                        <span class="top-cart-item-price">$19.99</span>
                                        <span class="top-cart-item-quantity">x 2</span>
                                    </div>
                                </div>
                                <div class="top-cart-item clearfix">
                                    <div class="top-cart-item-image">
                                        <a href="#"><img src="images/shop/small/6.jpg" alt="Light Blue Denim Dress" /></a>
                                    </div>
                                    <div class="top-cart-item-desc">
                                        <a href="#">Light Blue Denim Dress</a>
                                        <span class="top-cart-item-price">$24.99</span>
                                        <span class="top-cart-item-quantity">x 3</span>
                                    </div>
                                </div>
                            </div>
                            <div class="top-cart-action clearfix">
                                <span class="fleft top-checkout-price">$114.95</span>
                                <button class="button button-3d button-small nomargin fright">View Cart</button>
                            </div>
                        </div>
                    </div><!-- #top-cart end -->

                    <!-- Top Search
                    ============================================= -->
                    <div id="top-search">
                        <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                        <form action="search.html" method="get">
                            <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
                        </form>
                    </div><!-- #top-search end -->

                </nav><!-- #primary-menu end -->

            </div>

        </div>

    </header><!-- #header end -->
    <?= $content; ?>
    <!-- Footer
    ============================================= -->
    <footer id="footer" class="dark">

        <div class="container">

            <!-- Footer Widgets
            ============================================= -->
            <div class="footer-widgets-wrap clearfix">

                <div class="col_two_third">

                    <div class="col_one_third">

                        <div class="widget clearfix">

                            <img src="<?= $constante->getUrl(array("images/"), true, false); ?>logo.png" alt="" class="footer-logo">

                            <p>Vendeur de Jeux vidéo <strong>Spécialiste</strong> de la <strong>Précommande</strong>.</p>

                            <div style="background: url('<?= $constante->getUrl(array("images/"), true, false); ?>world-map.png') no-repeat center center; background-size: 100%;">
                                <address>
                                    <strong>Siège Social:</strong><br>
                                    20 Avenue Jean jaures<br>
                                    85100 Les Sables d'Olonne<br>
                                </address>
                                <abbr title="Phone Number"><strong>Tel:</strong></abbr> 06 33 13 43 30<br>
                                <abbr title="Email Address"><strong>Email:</strong></abbr> contact@gameshop.fr
                            </div>

                        </div>

                    </div>

                    <div class="col_one_third">

                        <div class="widget widget_links clearfix">

                            <h4>Blogroll</h4>

                            <ul>
                                <li><a href="http://codex.wordpress.org/">Documentation</a></li>
                                <li><a href="http://wordpress.org/support/forum/requests-and-feedback">Feedback</a></li>
                                <li><a href="http://wordpress.org/extend/plugins/">Plugins</a></li>
                                <li><a href="http://wordpress.org/support/">Support Forums</a></li>
                                <li><a href="http://wordpress.org/extend/themes/">Themes</a></li>
                                <li><a href="http://wordpress.org/news/">WordPress Blog</a></li>
                                <li><a href="http://planet.wordpress.org/">WordPress Planet</a></li>
                            </ul>

                        </div>

                    </div>

                    <div class="col_one_third col_last">

                        <div class="widget clearfix">
                            <h4>Recent Posts</h4>

                            <div id="post-list-footer">
                                <div class="spost clearfix">
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <li>10th July 2014</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="spost clearfix">
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">Elit Assumenda vel amet dolorum quasi</a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <li>10th July 2014</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="spost clearfix">
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">Debitis nihil placeat, illum est nisi</a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <li>10th July 2014</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col_one_third col_last">

                    <div class="widget clearfix" style="margin-bottom: -20px;">

                        <div class="row">

                            <div class="col-md-6 bottommargin-sm">
                                <div class="counter counter-small"><span data-from="50" data-to="15065421" data-refresh-interval="80" data-speed="3000" data-comma="true"></span></div>
                                <h5 class="nobottommargin">Total Downloads</h5>
                            </div>

                            <div class="col-md-6 bottommargin-sm">
                                <div class="counter counter-small"><span data-from="100" data-to="18465" data-refresh-interval="50" data-speed="2000" data-comma="true"></span></div>
                                <h5 class="nobottommargin">Clients</h5>
                            </div>

                        </div>

                    </div>

                    <div class="widget subscribe-widget clearfix">
                        <h5><strong>Subscribe</strong> to Our Newsletter to get Important News, Amazing Offers &amp; Inside Scoops:</h5>
                        <div id="widget-subscribe-form-result" data-notify-type="success" data-notify-msg=""></div>
                        <form id="widget-subscribe-form" action="include/subscribe.php" role="form" method="post" class="nobottommargin">
                            <div class="input-group divcenter">
                                <span class="input-group-addon"><i class="icon-email2"></i></span>
                                <input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email" class="form-control required email" placeholder="Enter your Email">
									<span class="input-group-btn">
										<button class="btn btn-success" type="submit">Subscribe</button>
									</span>
                            </div>
                        </form>
                        <script type="text/javascript">
                            jQuery("#widget-subscribe-form").validate({
                                submitHandler: function(form) {
                                    jQuery(form).find('.input-group-addon').find('.icon-email2').removeClass('icon-email2').addClass('icon-line-loader icon-spin');
                                    jQuery(form).ajaxSubmit({
                                        target: '#widget-subscribe-form-result',
                                        success: function() {
                                            jQuery(form).find('.input-group-addon').find('.icon-line-loader').removeClass('icon-line-loader icon-spin').addClass('icon-email2');
                                            jQuery('#widget-subscribe-form').find('.form-control').val('');
                                            jQuery('#widget-subscribe-form-result').attr('data-notify-msg', jQuery('#widget-subscribe-form-result').html()).html('');
                                            SEMICOLON.widget.notifications(jQuery('#widget-subscribe-form-result'));
                                        }
                                    });
                                }
                            });
                        </script>
                    </div>

                    <div class="widget clearfix" style="margin-bottom: -20px;">

                        <div class="row">

                            <div class="col-md-6 clearfix bottommargin-sm">
                                <a href="#" class="social-icon si-dark si-colored si-facebook nobottommargin" style="margin-right: 10px;">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>
                                <a href="#"><small style="display: block; margin-top: 3px;"><strong>Like us</strong><br>on Facebook</small></a>
                            </div>
                            <div class="col-md-6 clearfix">
                                <a href="#" class="social-icon si-dark si-colored si-rss nobottommargin" style="margin-right: 10px;">
                                    <i class="icon-rss"></i>
                                    <i class="icon-rss"></i>
                                </a>
                                <a href="#"><small style="display: block; margin-top: 3px;"><strong>Subscribe</strong><br>to RSS Feeds</small></a>
                            </div>

                        </div>

                    </div>

                </div>

            </div><!-- .footer-widgets-wrap end -->

        </div>

        <!-- Copyrights
        ============================================= -->
        <div id="copyrights">

            <div class="container clearfix">

                <div class="col_half">
                    Copyrights &copy; 2016 All Rights Reserved by Gameshop UI Designer.<br>
                    <div class="copyright-links"><a href="#">Règle d'accès et d'utilisation</a> / <a href="#">Politique de confidentialité</a> /
                        <a href="">Conditions Générales de Ventes</a></div>
                </div>

                <div class="col_half col_last tright">
                    <div class="fright clearfix">
                        <a href="#" class="social-icon si-small si-borderless si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-gplus">
                            <i class="icon-gplus"></i>
                            <i class="icon-gplus"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-pinterest">
                            <i class="icon-pinterest"></i>
                            <i class="icon-pinterest"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-vimeo">
                            <i class="icon-vimeo"></i>
                            <i class="icon-vimeo"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-github">
                            <i class="icon-github"></i>
                            <i class="icon-github"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-yahoo">
                            <i class="icon-yahoo"></i>
                            <i class="icon-yahoo"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-linkedin">
                            <i class="icon-linkedin"></i>
                            <i class="icon-linkedin"></i>
                        </a>
                    </div>

                    <div class="clear"></div>

                    <i class="icon-envelope2"></i> contact@gameshop.fr <span class="middot">&middot;</span> <i class="icon-headphones"></i> 0633134330 <span class="middot">&middot;</span> <i class="icon-skype2"></i> GameshopUI
                </div>

            </div>

        </div><!-- #copyrights end -->

    </footer><!-- #footer end -->

</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="<?= $constante->getUrl(array('js/')); ?>functions.js"></script>

</body>
</html>