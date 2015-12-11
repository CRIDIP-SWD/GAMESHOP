<?php include "core/header.php"; ?>
<body>

<!-- The Main Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    <!-- Top Bar
    ============================================= -->
    <div id="top-bar" class="hidden-xs">

        <div class="container clearfix">

            <div class="col_half nobottommargin">

                <p class="nobottommargin"><strong>Call:</strong> 1800-547-2145 | <strong>Email:</strong> info@canvas.com</p>

            </div>

            <div class="col_half col_last fright nobottommargin">

                <!-- Top Links
                ============================================= -->
                <div class="top-links">
                    <ul>
                        <li><a href="#"><img src="<?= $constante::IMAGES; ?>icons/flags/french.png" alt="French"> EUR</a></li>
                        <li><a href="#">FR</a>
                            <ul>
                                <li><a href="#"><img src="<?= $constante::IMAGES; ?>icons/flags/english.png" alt="French"> EN</a></li>
                                <li><a href="#"><img src="<?= $constante::IMAGES; ?>icons/flags/italian.png" alt="Italian"> IT</a></li>
                                <li><a href="#"><img src="<?= $constante::IMAGES; ?>icons/flags/german.png" alt="German"> DE</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Login</a>
                            <div class="top-link-section">
                                <form id="top-login" role="form">
                                    <div class="input-group" id="top-login-username">
                                        <span class="input-group-addon"><i class="icon-user"></i></span>
                                        <input type="email" class="form-control" placeholder="Email address" required="">
                                    </div>
                                    <div class="input-group" id="top-login-password">
                                        <span class="input-group-addon"><i class="icon-key"></i></span>
                                        <input type="password" class="form-control" placeholder="Password" required="">
                                    </div>
                                    <label class="checkbox">
                                        <input type="checkbox" value="remember-me"> Remember me
                                    </label>
                                    <button class="btn btn-danger btn-block" type="submit">Sign in</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div><!-- .top-links end -->

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
                    <a href="index.html" class="standard-logo" data-dark-logo="images/logo-dark.png"><img src="images/logo.png" alt="Canvas Logo"></a>
                    <a href="index.html" class="retina-logo" data-dark-logo="images/logo-dark@2x.png"><img src="images/logo@2x.png" alt="Canvas Logo"></a>
                </div><!-- #logo end -->

                <!-- Primary Navigation
                ============================================= -->
                <nav id="primary-menu">

                    <ul>
                        <li class="current"><a href="#"><div>Home</div><span>Lets Start</span></a>
                            <ul>
                                <li><a href="index-corporate.html"><div>Home - Corporate</div></a>
                                    <ul>
                                        <li><a href="index-corporate.html"><div>Corporate - Layout 1</div></a></li>
                                        <li><a href="index-corporate-2.html"><div>Corporate - Layout 2</div></a></li>
                                        <li><a href="index-corporate-3.html"><div>Corporate - Layout 3</div></a></li>
                                        <li><a href="index-corporate-4.html"><div>Corporate - Layout 4</div></a></li>
                                    </ul>
                                </li>
                                <li><a href="index-portfolio.html"><div>Home - Portfolio</div></a>
                                    <ul>
                                        <li><a href="index-portfolio.html"><div>Portfolio - Layout 1</div></a></li>
                                        <li><a href="index-portfolio-2.html"><div>Portfolio - Layout 2</div></a></li>
                                        <li><a href="index-portfolio-3.html"><div>Portfolio - Masonry</div></a></li>
                                        <li><a href="index-portfolio-4.html"><div>Portfolio - AJAX</div></a></li>
                                    </ul>
                                </li>
                                <li><a href="index-blog.html"><div>Home - Blog</div></a>
                                    <ul>
                                        <li><a href="index-blog.html"><div>Blog - Layout 1</div></a></li>
                                        <li><a href="index-blog-2.html"><div>Blog - Layout 2</div></a></li>
                                        <li><a href="index-blog-3.html"><div>Blog - Layout 3</div></a></li>
                                    </ul>
                                </li>
                                <li><a href="index-shop.html"><div>Home - Shop</div></a>
                                    <ul>
                                        <li><a href="index-shop.html"><div>Shop - Layout 1</div></a></li>
                                        <li><a href="index-shop-2.html"><div>Shop - Layout 2</div></a></li>
                                    </ul>
                                </li>
                                <li><a href="index-magazine.html"><div>Home - Magazine</div></a>
                                    <ul>
                                        <li><a href="index-magazine.html"><div>Magazine - Layout 1</div></a></li>
                                        <li><a href="index-magazine-2.html"><div>Magazine - Layout 2</div></a></li>
                                        <li><a href="index-magazine-3.html"><div>Magazine - Layout 3</div></a></li>
                                    </ul>
                                </li>
                                <li><a href="landing.html"><div>Home - Landing Page</div></a>
                                    <ul>
                                        <li><a href="landing.html"><div>Landing Page - Layout 1</div></a></li>
                                        <li><a href="landing-2.html"><div>Landing Page - Layout 2</div></a></li>
                                        <li><a href="landing-3.html"><div>Landing Page - Layout 3</div></a></li>
                                        <li><a href="landing-4.html"><div>Landing Page - Layout 4</div></a></li>
                                        <li><a href="landing-5.html"><div>Landing Page - Layout 5</div></a></li>
                                    </ul>
                                </li>
                                <li><a href="index-fullscreen-image.html"><div>Home - Full Screen</div></a>
                                    <ul>
                                        <li><a href="index-fullscreen-image.html"><div>Full Screen - Image</div></a></li>
                                        <li><a href="index-fullscreen-slider.html"><div>Full Screen - Slider</div></a></li>
                                        <li><a href="index-fullscreen-video.html"><div>Full Screen - Video</div></a></li>
                                    </ul>
                                </li>
                                <li><a href="index-onepage.html"><div>Home - One Page</div></a>
                                    <ul>
                                        <li><a href="index-onepage.html"><div>One Page - Default</div></a></li>
                                        <li><a href="index-onepage-2.html"><div>One Page - Submenu</div></a></li>
                                        <li><a href="index-onepage-3.html"><div>One Page - Dots Style</div></a></li>
                                    </ul>
                                </li>
                                <li><a href="index-wedding.html"><div>Home - Wedding</div></a></li>
                                <li><a href="index-restaurant.html"><div>Home - Restaurant</div></a></li>
                                <li><a href="index-events.html"><div>Home - Events</div></a></li>
                                <li><a href="index-parallax.html"><div>Home - Parallax</div></a></li>
                                <li><a href="index-app-showcase.html"><div>Home - App Showcase</div></a></li>
                            </ul>
                        </li>
                        <!-- Mega Menu
                        ============================================= -->
                        <li class="mega-menu"><a href="#"><div>Men</div><span>Out of the Box</span></a>
                            <div class="mega-menu-content style-2 col-4 clearfix">
                                <ul>
                                    <li class="mega-menu-title"><a href="#"><div>Footwear</div></a>
                                        <ul>
                                            <li><a href="#"><div>Casual Shoes</div></a></li>
                                            <li><a href="#"><div>Formal Shoes</div></a></li>
                                            <li><a href="#"><div>Sports shoes</div></a></li>
                                            <li><a href="#"><div>Flip Flops</div></a></li>
                                            <li><a href="#"><div>Slippers</div></a></li>
                                            <li><a href="#"><div>Sports Sandals</div></a></li>
                                            <li><a href="#"><div>Party Shoes</div></a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul>
                                    <li class="mega-menu-title"><a href="#"><div>Clothing</div></a>
                                        <ul>
                                            <li><a href="#"><div>Casual Shirts</div></a></li>
                                            <li><a href="#"><div>T-Shirts</div></a></li>
                                            <li><a href="#"><div>Collared Tees</div></a></li>
                                            <li><a href="#"><div>Pants / Trousers</div></a></li>
                                            <li><a href="#"><div>Ethnic Wear</div></a></li>
                                            <li><a href="#"><div>Jeans</div></a></li>
                                            <li><a href="#"><div>Sweamwear</div></a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul>
                                    <li class="mega-menu-title"><a href="#"><div>Accessories</div></a>
                                        <ul>
                                            <li><a href="#"><div>Bags &amp; Backpacks</div></a></li>
                                            <li><a href="#"><div>Watches</div></a></li>
                                            <li><a href="#"><div>Sunglasses</div></a></li>
                                            <li><a href="#"><div>Wallets</div></a></li>
                                            <li><a href="#"><div>Caps &amp; Hats</div></a></li>
                                            <li><a href="#"><div>Jewellery</div></a></li>
                                            <li><a href="#"><div>Belts, Ties</div></a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul>
                                    <li class="mega-menu-title"><a href="#"><div>New Arrivals</div></a>
                                        <ul>
                                            <li><a href="#"><div>T-Shirts</div></a></li>
                                            <li><a href="#"><div>Formal Shoes</div></a></li>
                                            <li><a href="#"><div>Accessories</div></a></li>
                                            <li><a href="#"><div>Watches</div></a></li>
                                            <li><a href="#"><div>Perfumes</div></a></li>
                                            <li><a href="#"><div>Belts, Ties</div></a></li>
                                            <li><a href="#"><div>Formal Shirts</div></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li><!-- .mega-menu end -->
                        <li><a href="#"><div>Women</div><span>Out of the Box</span></a>
                            <div class="mega-menu-content style-2 col-2 clearfix">
                                <ul>
                                    <li class="mega-menu-title"><a href="#"><div>Footwear</div></a>
                                        <ul>
                                            <li><a href="#"><div>Casual Shoes</div></a></li>
                                            <li><a href="#"><div>Formal Shoes</div></a></li>
                                            <li><a href="#"><div>Sports shoes</div></a></li>
                                            <li><a href="#"><div>Flip Flops</div></a></li>
                                            <li><a href="#"><div>Slippers</div></a></li>
                                            <li><a href="#"><div>Sports Sandals</div></a></li>
                                            <li><a href="#"><div>Party Shoes</div></a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul>
                                    <li class="mega-menu-title"><a href="#"><div>Clothing</div></a>
                                        <ul>
                                            <li><a href="#"><div>Casual Shirts</div></a></li>
                                            <li><a href="#"><div>T-Shirts</div></a></li>
                                            <li><a href="#"><div>Collared Tees</div></a></li>
                                            <li><a href="#"><div>Pants / Trousers</div></a></li>
                                            <li><a href="#"><div>Ethnic Wear</div></a></li>
                                            <li><a href="#"><div>Jeans</div></a></li>
                                            <li><a href="#"><div>Sweamwear</div></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li><!-- .mega-menu end -->
                        <li><a href="#"><div>Accessories</div><span>Awesome Works</span></a></li>
                        <li><a href="#"><div>Sale</div><span>Awesome Works</span></a></li>
                        <li><a href="#"><div>Blog</div><span>Latest News</span></a></li>
                        <li><a href="#"><div>Videos</div><span>Latest News</span></a></li>
                        <li><a href="#"><div>Contact</div><span>Get In Touch</span></a></li>
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

    <section id="slider" class="slider-parallax revslider-wrap ohidden clearfix">

        <!--
        #################################
            - THEMEPUNCH BANNER -
        #################################
        -->
        <div class="tp-banner-container">
            <div class="tp-banner" >
                <ul>    <!-- SLIDE  -->
                    <li data-transition="fade" data-slotamount="1" data-masterspeed="1500" data-delay="10000" data-saveperformance="off" data-title="Latest Collections" style="background-color: #F6F6F6;">
                        <!-- LAYERS -->

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption customin ltl tp-resizeme revo-slider-caps-text uppercase"
                             data-x="100"
                             data-y="50"
                             data-customin="x:-200;y:0;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                             data-speed="400"
                             data-start="1000"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style=""><img src="images/slider/rev/shop/girl1.jpg" alt="Girl"></div>

                        <div class="tp-caption customin ltl tp-resizeme revo-slider-caps-text uppercase"
                             data-x="570"
                             data-y="75"
                             data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                             data-speed="700"
                             data-start="1000"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style=" color: #333;">Get your Shopping Bags Ready</div>

                        <div class="tp-caption customin ltl tp-resizeme revo-slider-emphasis-text nopadding noborder"
                             data-x="570"
                             data-y="105"
                             data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                             data-speed="700"
                             data-start="1200"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style=" color: #333; max-width: 430px; white-space: normal; line-height: 1.15;">Latest Fashion Collections</div>

                        <div class="tp-caption customin ltl tp-resizeme revo-slider-desc-text tleft"
                             data-x="570"
                             data-y="275"
                             data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                             data-speed="700"
                             data-start="1400"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style=" color: #333; max-width: 550px; white-space: normal;">We have created a Design that looks Awesome, performs Brilliantly &amp; senses Orientations.</div>

                        <div class="tp-caption customin ltl tp-resizeme"
                             data-x="570"
                             data-y="375"
                             data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                             data-speed="700"
                             data-start="1550"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style=""><a href="#" class="button button-border button-large button-rounded tright nomargin"><span>Start Shopping</span> <i class="icon-angle-right"></i></a></div>

                    </li>
                    <!-- SLIDE  -->
                    <li data-transition="slideup" data-slotamount="1" data-masterspeed="1500" data-delay="10000"  data-saveperformance="off"  data-title="Messenger bags" style="background-color: #E9E8E3;">
                        <!-- LAYERS -->

                        <div class="tp-caption customin ltl tp-resizeme revo-slider-caps-text uppercase"
                             data-x="630"
                             data-y="78"
                             data-customin="x:250;y:0;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                             data-speed="400"
                             data-start="1000"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style=""><img src="images/slider/rev/shop/bag.png" alt="Bag"></div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption customin ltl tp-resizeme revo-slider-caps-text uppercase"
                             data-x="0"
                             data-y="110"
                             data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                             data-speed="700"
                             data-start="1000"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style=" color: #333;">Buy Stylish Bags at Discounted Prices</div>

                        <div class="tp-caption customin ltl tp-resizeme revo-slider-emphasis-text nopadding noborder"
                             data-x="0"
                             data-y="140"
                             data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                             data-speed="700"
                             data-start="1200"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style=" color: #333; white-space: normal; line-height: 1.15;">Messenger Bags</div>

                        <div class="tp-caption customin ltl tp-resizeme revo-slider-desc-text tleft"
                             data-x="0"
                             data-y="240"
                             data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                             data-speed="700"
                             data-start="1400"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style=" color: #333; max-width: 550px; white-space: normal;">Grantees insurmountable challenges invest protect, growth improving quality social entrepreneurship.</div>

                        <div class="tp-caption customin ltl tp-resizeme"
                             data-x="0"
                             data-y="340"
                             data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                             data-speed="700"
                             data-start="1550"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style=""><a href="#" class="button button-border button-large button-rounded tright nomargin"><span>Start Shopping</span> <i class="icon-angle-right"></i></a></div>

                        <div class="tp-caption customin utb tp-resizeme revo-slider-caps-text uppercase"
                             data-x="510"
                             data-y="0"
                             data-customin="x:0;y:-236;z:0;rotationZ:0;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                             data-speed="600"
                             data-start="2100"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style=""><img src="images/slider/rev/shop/tag.png" alt="Bag"></div>

                    </li>
                </ul>
            </div>
        </div>

        <script type="text/javascript">

            jQuery(document).ready(function() {

                jQuery('.tp-banner').show().revolution(
                    {
                        dottedOverlay:"none",
                        delay:16000,
                        startwidth:1140,
                        startheight:500,
                        hideThumbs:200,

                        thumbWidth:100,
                        thumbHeight:50,
                        thumbAmount:5,

                        navigationType:"none",
                        navigationArrows:"solo",
                        navigationStyle:"preview2",

                        touchenabled:"on",
                        onHoverStop:"on",

                        swipe_velocity: 0.7,
                        swipe_min_touches: 1,
                        swipe_max_touches: 1,
                        drag_block_vertical: false,

                        parallax:"mouse",
                        parallaxBgFreeze:"on",
                        parallaxLevels:[7,4,3,2,5,4,3,2,1,0],

                        keyboardNavigation:"off",

                        navigationHAlign:"center",
                        navigationVAlign:"bottom",
                        navigationHOffset:0,
                        navigationVOffset:20,

                        soloArrowLeftHalign:"left",
                        soloArrowLeftValign:"center",
                        soloArrowLeftHOffset:20,
                        soloArrowLeftVOffset:0,

                        soloArrowRightHalign:"right",
                        soloArrowRightValign:"center",
                        soloArrowRightHOffset:20,
                        soloArrowRightVOffset:0,

                        shadow:0,
                        fullWidth:"on",
                        fullScreen:"off",

                        spinner:"spinner4",

                        stopLoop:"off",
                        stopAfterLoops:-1,
                        stopAtSlide:-1,

                        shuffle:"off",

                        autoHeight:"off",
                        forceFullWidth:"off",



                        hideThumbsOnMobile:"off",
                        hideNavDelayOnMobile:1500,
                        hideBulletsOnMobile:"off",
                        hideArrowsOnMobile:"off",
                        hideThumbsUnderResolution:0,

                        hideSliderAtLimit:0,
                        hideCaptionAtLimit:0,
                        hideAllCaptionAtLilmit:0,
                        startWithSlide:0,
                        fullScreenOffsetContainer: ".header"
                    });




            }); //ready

        </script>

        <!-- END REVOLUTION SLIDER -->

    </section>

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="col-md-8 nopadding">

                    <div class="col-md-6 noleftpadding bottommargin-sm">
                        <a href="#"><img src="images/shop/banners/2.jpg" alt="Image"></a>
                    </div>

                    <div class="col-md-6 noleftpadding bottommargin-sm">
                        <a href="#"><img src="images/shop/banners/8.jpg" alt="Image"></a>
                    </div>

                    <div class="clear"></div>

                    <div class="col-md-12 noleftpadding">
                        <a href="#"><img src="images/shop/banners/4.jpg" alt="Image"></a>
                    </div>

                </div>

                <div class="col-md-4 nopadding">
                    <a href="#"><img src="images/shop/banners/9.jpg" alt="Image"></a>
                </div>

                <div class="clear"></div>

                <div class="tabs topmargin-lg clearfix" id="tab-3">

                    <ul class="tab-nav clearfix">
                        <li><a href="#tabs-9">New Arrivals</a></li>
                        <li><a href="#tabs-10">Best sellers</a></li>
                        <li><a href="#tabs-11">You may like</a></li>
                    </ul>

                    <div class="tab-container">

                        <div class="tab-content clearfix" id="tabs-9">

                            <div id="shop" class="clearfix">

                                <div class="product clearfix">
                                    <div class="product-image">
                                        <a href="#"><img src="images/shop/dress/1.jpg" alt="Checked Short Dress"></a>
                                        <a href="#"><img src="images/shop/dress/1-1.jpg" alt="Checked Short Dress"></a>
                                        <div class="sale-flash">50% Off*</div>
                                        <div class="product-overlay">
                                            <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                            <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                        </div>
                                    </div>
                                    <div class="product-desc">
                                        <div class="product-title"><h3><a href="#">Checked Short Dress</a></h3></div>
                                        <div class="product-price"><del>$24.99</del> <ins>$12.49</ins></div>
                                        <div class="product-rating">
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star-half-full"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="product clearfix">
                                    <div class="product-image">
                                        <a href="#"><img src="images/shop/pants/1-1.jpg" alt="Slim Fit Chinos"></a>
                                        <a href="#"><img src="images/shop/pants/1.jpg" alt="Slim Fit Chinos"></a>
                                        <div class="product-overlay">
                                            <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                            <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                        </div>
                                    </div>
                                    <div class="product-desc">
                                        <div class="product-title"><h3><a href="#">Slim Fit Chinos</a></h3></div>
                                        <div class="product-price">$39.99</div>
                                        <div class="product-rating">
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star-half-full"></i>
                                            <i class="icon-star-empty"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="product clearfix">
                                    <div class="product-image">
                                        <div class="fslider" data-arrows="false">
                                            <div class="flexslider">
                                                <div class="slider-wrap">
                                                    <div class="slide"><a href="#"><img src="images/shop/shoes/1.jpg" alt="Dark Brown Boots"></a></div>
                                                    <div class="slide"><a href="#"><img src="images/shop/shoes/1-1.jpg" alt="Dark Brown Boots"></a></div>
                                                    <div class="slide"><a href="#"><img src="images/shop/shoes/1-2.jpg" alt="Dark Brown Boots"></a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-overlay">
                                            <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                            <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                        </div>
                                    </div>
                                    <div class="product-desc">
                                        <div class="product-title"><h3><a href="#">Dark Brown Boots</a></h3></div>
                                        <div class="product-price">$49</div>
                                        <div class="product-rating">
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star-empty"></i>
                                            <i class="icon-star-empty"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="product clearfix">
                                    <div class="product-image">
                                        <a href="#"><img src="images/shop/dress/2.jpg" alt="Light Blue Denim Dress"></a>
                                        <a href="#"><img src="images/shop/dress/2-2.jpg" alt="Light Blue Denim Dress"></a>
                                        <div class="product-overlay">
                                            <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                            <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                        </div>
                                    </div>
                                    <div class="product-desc">
                                        <div class="product-title"><h3><a href="#">Light Blue Denim Dress</a></h3></div>
                                        <div class="product-price">$19.95</div>
                                        <div class="product-rating">
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star-empty"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="tab-content clearfix" id="tabs-10">

                            <div id="shop" class="clearfix">

                                <div class="product clearfix">
                                    <div class="product-image">
                                        <a href="#"><img src="images/shop/sunglasses/1.jpg" alt="Unisex Sunglasses"></a>
                                        <a href="#"><img src="images/shop/sunglasses/1-1.jpg" alt="Unisex Sunglasses"></a>
                                        <div class="sale-flash">Sale!</div>
                                        <div class="product-overlay">
                                            <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                            <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                        </div>
                                    </div>
                                    <div class="product-desc">
                                        <div class="product-title"><h3><a href="#">Unisex Sunglasses</a></h3></div>
                                        <div class="product-price"><del>$19.99</del> <ins>$11.99</ins></div>
                                        <div class="product-rating">
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star-empty"></i>
                                            <i class="icon-star-empty"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="product clearfix">
                                    <div class="product-image">
                                        <a href="#"><img src="images/shop/tshirts/1.jpg" alt="Blue Round-Neck Tshirt"></a>
                                        <a href="#"><img src="images/shop/tshirts/1-1.jpg" alt="Blue Round-Neck Tshirt"></a>
                                        <div class="product-overlay">
                                            <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                            <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                        </div>
                                    </div>
                                    <div class="product-desc">
                                        <div class="product-title"><h3><a href="#">Blue Round-Neck Tshirt</a></h3></div>
                                        <div class="product-price">$9.99</div>
                                        <div class="product-rating">
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star-half-full"></i>
                                            <i class="icon-star-empty"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="product clearfix">
                                    <div class="product-image">
                                        <a href="#"><img src="images/shop/watches/1.jpg" alt="Silver Chrome Watch"></a>
                                        <a href="#"><img src="images/shop/watches/1-1.jpg" alt="Silver Chrome Watch"></a>
                                        <div class="product-overlay">
                                            <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                            <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                        </div>
                                    </div>
                                    <div class="product-desc">
                                        <div class="product-title"><h3><a href="#">Silver Chrome Watch</a></h3></div>
                                        <div class="product-price">$129.99</div>
                                        <div class="product-rating">
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star-half-full"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="product clearfix">
                                    <div class="product-image">
                                        <a href="#"><img src="images/shop/shoes/2.jpg" alt="Men Grey Casual Shoes"></a>
                                        <a href="#"><img src="images/shop/shoes/2-1.jpg" alt="Men Grey Casual Shoes"></a>
                                        <div class="sale-flash">Sale!</div>
                                        <div class="product-overlay">
                                            <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                            <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                        </div>
                                    </div>
                                    <div class="product-desc">
                                        <div class="product-title"><h3><a href="#">Men Grey Casual Shoes</a></h3></div>
                                        <div class="product-price"><del>$45.99</del> <ins>$39.49</ins></div>
                                        <div class="product-rating">
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star-half-full"></i>
                                            <i class="icon-star-empty"></i>
                                            <i class="icon-star-empty"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="tab-content clearfix" id="tabs-11">

                            <div id="shop" class="clearfix">

                                <div class="product clearfix">
                                    <div class="product-image">
                                        <div class="fslider" data-arrows="false">
                                            <div class="flexslider">
                                                <div class="slider-wrap">
                                                    <div class="slide"><a href="#"><img src="images/shop/dress/3.jpg" alt="Pink Printed Dress"></a></div>
                                                    <div class="slide"><a href="#"><img src="images/shop/dress/3-1.jpg" alt="Pink Printed Dress"></a></div>
                                                    <div class="slide"><a href="#"><img src="images/shop/dress/3-2.jpg" alt="Pink Printed Dress"></a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-overlay">
                                            <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                            <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                        </div>
                                    </div>
                                    <div class="product-desc">
                                        <div class="product-title"><h3><a href="#">Pink Printed Dress</a></h3></div>
                                        <div class="product-price">$39.49</div>
                                        <div class="product-rating">
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star-empty"></i>
                                            <i class="icon-star-empty"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="product clearfix">
                                    <div class="product-image">
                                        <a href="#"><img src="images/shop/pants/5.jpg" alt="Green Trousers"></a>
                                        <a href="#"><img src="images/shop/pants/5-1.jpg" alt="Green Trousers"></a>
                                        <div class="sale-flash">Sale!</div>
                                        <div class="product-overlay">
                                            <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                            <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                        </div>
                                    </div>
                                    <div class="product-desc">
                                        <div class="product-title"><h3><a href="#">Green Trousers</a></h3></div>
                                        <div class="product-price"><del>$24.99</del> <ins>$21.99</ins></div>
                                        <div class="product-rating">
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star-half-full"></i>
                                            <i class="icon-star-empty"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="product clearfix">
                                    <div class="product-image">
                                        <a href="#"><img src="images/shop/sunglasses/2.jpg" alt="Men Aviator Sunglasses"></a>
                                        <a href="#"><img src="images/shop/sunglasses/2-1.jpg" alt="Men Aviator Sunglasses"></a>
                                        <div class="product-overlay">
                                            <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                            <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                        </div>
                                    </div>
                                    <div class="product-desc">
                                        <div class="product-title"><h3><a href="#">Men Aviator Sunglasses</a></h3></div>
                                        <div class="product-price">$13.49</div>
                                        <div class="product-rating">
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star-empty"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="product clearfix">
                                    <div class="product-image">
                                        <a href="#"><img src="images/shop/tshirts/4.jpg" alt="Black Polo Tshirt"></a>
                                        <a href="#"><img src="images/shop/tshirts/4-1.jpg" alt="Black Polo Tshirt"></a>
                                        <div class="product-overlay">
                                            <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                            <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                        </div>
                                    </div>
                                    <div class="product-desc">
                                        <div class="product-title"><h3><a href="#">Black Polo Tshirt</a></h3></div>
                                        <div class="product-price">$11.49</div>
                                        <div class="product-rating">
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="clear bottommargin-sm"></div>

                <div class="col_one_third">
                    <div class="fancy-title title-border">
                        <h4>About Us</h4>
                    </div>
                    <p>Jane Jacobs educate, leverage affiliate Martin Luther King Jr. agriculture conflict resolution dignity. Cooperation international progress non-partisan lasting change meaningful.</p>
                </div>

                <div class="col_one_third">
                    <div class="fancy-title title-border">
                        <h4>Subscribe for Offers</h4>
                    </div>
                    <p>Subscribe to Our Newsletter to get Important News, Amazing Offers &amp; Inside Scoops:</p>
                    <div id="widget-subscribe-form-result2" data-notify-type="success" data-notify-msg=""></div>
                    <form id="widget-subscribe-form2" action="include/subscribe.php" role="form" method="post" class="nobottommargin">
                        <div class="input-group divcenter">
                            <span class="input-group-addon"><i class="icon-email2"></i></span>
                            <input type="email" name="widget-subscribe-form2-email" class="form-control required email" placeholder="Enter your Email">
								<span class="input-group-btn">
									<button class="btn btn-default" type="submit">Subscribe</button>
								</span>
                        </div>
                    </form>
                    <script type="text/javascript">
                        jQuery("#widget-subscribe-form2").validate({
                            submitHandler: function(form) {
                                jQuery(form).find('.input-group-addon').find('.icon-email2').removeClass('icon-email2').addClass('icon-line-loader icon-spin');
                                jQuery(form).ajaxSubmit({
                                    target: '#widget-subscribe-form2-result',
                                    success: function() {
                                        jQuery(form).find('.input-group-addon').find('.icon-line-loader').removeClass('icon-line-loader icon-spin').addClass('icon-email2');
                                        jQuery('#widget-subscribe-form2').find('.form-control').val('');
                                        jQuery('#widget-subscribe-form2-result').attr('data-notify-msg', jQuery('#widget-subscribe-form2-result').html()).html('');
                                        SEMICOLON.widget.notifications(jQuery('#widget-subscribe-form2-result'));
                                    }
                                });
                            }
                        });
                    </script>
                </div>

                <div class="col_one_third col_last">
                    <div class="fancy-title title-border">
                        <h4>Connect with Us</h4>
                    </div>

                    <a href="#" class="social-icon si-facebook" data-toggle="tooltip" data-placement="top" title="Facebook">
                        <i class="icon-facebook"></i>
                        <i class="icon-facebook"></i>
                    </a>

                    <a href="#" class="social-icon si-delicious" data-toggle="tooltip" data-placement="top" title="Delicious">
                        <i class="icon-delicious"></i>
                        <i class="icon-delicious"></i>
                    </a>

                    <a href="#" class="social-icon si-paypal" data-toggle="tooltip" data-placement="top" title="PayPal">
                        <i class="icon-paypal"></i>
                        <i class="icon-paypal"></i>
                    </a>

                    <a href="#" class="social-icon si-flattr" data-toggle="tooltip" data-placement="top" title="Flattr">
                        <i class="icon-flattr"></i>
                        <i class="icon-flattr"></i>
                    </a>

                    <a href="#" class="social-icon si-android" data-toggle="tooltip" data-placement="top" title="Android">
                        <i class="icon-android"></i>
                        <i class="icon-android"></i>
                    </a>

                    <a href="#" class="social-icon si-smashmag" data-toggle="tooltip" data-placement="top" title="Smashing Magazine">
                        <i class="icon-smashmag"></i>
                        <i class="icon-smashmag"></i>
                    </a>

                    <a href="#" class="social-icon si-gplus" data-toggle="tooltip" data-placement="top" title="Google+">
                        <i class="icon-gplus"></i>
                        <i class="icon-gplus"></i>
                    </a>

                    <a href="#" class="social-icon si-wikipedia" data-toggle="tooltip" data-placement="top" title="Wikipedia">
                        <i class="icon-wikipedia"></i>
                        <i class="icon-wikipedia"></i>
                    </a>

                    <a href="#" class="social-icon si-stumbleupon" data-toggle="tooltip" data-placement="top" title="StumbleUpon">
                        <i class="icon-stumbleupon"></i>
                        <i class="icon-stumbleupon"></i>
                    </a>

                    <a href="#" class="social-icon si-foursquare" data-toggle="tooltip" data-placement="top" title="FourSquare">
                        <i class="icon-foursquare"></i>
                        <i class="icon-foursquare"></i>
                    </a>

                    <a href="#" class="social-icon si-call" data-toggle="tooltip" data-placement="top" title="Call">
                        <i class="icon-call"></i>
                        <i class="icon-call"></i>
                    </a>

                    <a href="#" class="social-icon si-ninetyninedesigns" data-toggle="tooltip" data-placement="top" title="Ninety Nine Design">
                        <i class="icon-ninetyninedesigns"></i>
                        <i class="icon-ninetyninedesigns"></i>
                    </a>

                    <a href="#" class="social-icon si-forrst" data-toggle="tooltip" data-placement="top" title="Forrst">
                        <i class="icon-forrst"></i>
                        <i class="icon-forrst"></i>
                    </a>

                    <a href="#" class="social-icon si-digg" data-toggle="tooltip" data-placement="top" title="Digg">
                        <i class="icon-digg"></i>
                        <i class="icon-digg"></i>
                    </a>
                </div>

                <div class="clear"></div>

                <div class="fancy-title title-border title-center topmargin-sm">
                    <h4>Popular Brands</h4>
                </div>

                <ul class="clients-grid grid-6 nobottommargin clearfix">
                    <li><a href="#"><img src="images/clients/logo/1.png" alt="Clients"></a></li>
                    <li><a href="#"><img src="images/clients/logo/2.png" alt="Clients"></a></li>
                    <li><a href="#"><img src="images/clients/logo/3.png" alt="Clients"></a></li>
                    <li><a href="#"><img src="images/clients/logo/4.png" alt="Clients"></a></li>
                    <li><a href="#"><img src="images/clients/logo/5.png" alt="Clients"></a></li>
                    <li><a href="#"><img src="images/clients/logo/6.png" alt="Clients"></a></li>
                    <li><a href="#"><img src="images/clients/logo/7.png" alt="Clients"></a></li>
                    <li><a href="#"><img src="images/clients/logo/8.png" alt="Clients"></a></li>
                    <li><a href="#"><img src="images/clients/logo/9.png" alt="Clients"></a></li>
                    <li><a href="#"><img src="images/clients/logo/10.png" alt="Clients"></a></li>
                    <li><a href="#"><img src="images/clients/logo/11.png" alt="Clients"></a></li>
                    <li><a href="#"><img src="images/clients/logo/12.png" alt="Clients"></a></li>
                    <li><a href="#"><img src="images/clients/logo/13.png" alt="Clients"></a></li>
                    <li><a href="#"><img src="images/clients/logo/14.png" alt="Clients"></a></li>
                    <li><a href="#"><img src="images/clients/logo/15.png" alt="Clients"></a></li>
                    <li><a href="#"><img src="images/clients/logo/16.png" alt="Clients"></a></li>
                    <li><a href="#"><img src="images/clients/logo/19.png" alt="Clients"></a></li>
                    <li><a href="#"><img src="images/clients/logo/18.png" alt="Clients"></a></li>
                </ul>

            </div>

            <div class="section nobottommargin">
                <div class="container clearfix">

                    <div class="col_one_fourth nobottommargin">
                        <div class="feature-box fbox-plain fbox-dark fbox-small">
                            <div class="fbox-icon">
                                <i class="icon-thumbs-up2"></i>
                            </div>
                            <h3>100% Original</h3>
                            <p class="notopmargin">We guarantee you the sale of Original Brands.</p>
                        </div>
                    </div>

                    <div class="col_one_fourth nobottommargin">
                        <div class="feature-box fbox-plain fbox-dark fbox-small">
                            <div class="fbox-icon">
                                <i class="icon-credit-cards"></i>
                            </div>
                            <h3>Payment Options</h3>
                            <p class="notopmargin">We accept Visa, MasterCard and American Express.</p>
                        </div>
                    </div>

                    <div class="col_one_fourth nobottommargin">
                        <div class="feature-box fbox-plain fbox-dark fbox-small">
                            <div class="fbox-icon">
                                <i class="icon-truck2"></i>
                            </div>
                            <h3>Free Shipping</h3>
                            <p class="notopmargin">Free Delivery to 100+ Locations on orders above $40.</p>
                        </div>
                    </div>

                    <div class="col_one_fourth nobottommargin col_last">
                        <div class="feature-box fbox-plain fbox-dark fbox-small">
                            <div class="fbox-icon">
                                <i class="icon-undo"></i>
                            </div>
                            <h3>30-Days Returns</h3>
                            <p class="notopmargin">Return or exchange items purchased within 30 days.</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="section notopborder nobottomborder nomargin nopadding nobg footer-stick">
                <div class="container clearfix">

                    <div class="col_half nobottommargin topmargin">
                        <img src="images/services/4.jpg" alt="Image" class="nobottommargin">
                    </div>

                    <div class="col_half nobottommargin col_last">

                        <div class="heading-block topmargin-lg">
                            <h3><strong>GET 20% OFF*</strong></h3>
                            <span>Our App scales beautifully to different Devices.</span>
                        </div>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet cumque, perferendis accusamus porro illo exercitationem molestias.</p>

                        <div id="widget-subscribe-form3-result" data-notify-type="success" data-notify-msg=""></div>
                        <form id="widget-subscribe-form3" action="include/subscribe.php" role="form" method="post" class="nobottommargin">
                            <div class="input-group" style="max-width:400px;">
                                <span class="input-group-addon"><i class="icon-email2"></i></span>
                                <input type="email" name="widget-subscribe-form3-email" class="form-control required email" placeholder="Enter your Email">
									<span class="input-group-btn">
										<button class="btn btn-danger" type="submit">Subscribe Now</button>
									</span>
                            </div>
                        </form>

                        <script>
                            jQuery("#widget-subscribe-form3").validate({
                                submitHandler: function(form) {
                                    jQuery(form).find('.input-group-addon').find('.icon-email2').removeClass('icon-email2').addClass('icon-line-loader icon-spin');
                                    jQuery(form).ajaxSubmit({
                                        target: '#widget-subscribe-form3-result',
                                        success: function() {
                                            jQuery(form).find('.input-group-addon').find('.icon-line-loader').removeClass('icon-line-loader icon-spin').addClass('icon-email2');
                                            jQuery('#widget-subscribe-form3').find('.form-control').val('');
                                            jQuery('#widget-subscribe-form3-result').attr('data-notify-msg', jQuery('#widget-subscribe-form3-result').html()).html('');
                                            SEMICOLON.widget.notifications(jQuery('#widget-subscribe-form3-result'));
                                        }
                                    });
                                }
                            });
                        </script>

                    </div>

                </div>
            </div>

        </div>

    </section><!-- #content end -->

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

                            <img src="images/footer-widget-logo.png" alt="" class="footer-logo">

                            <p>We believe in <strong>Simple</strong>, <strong>Creative</strong> &amp; <strong>Flexible</strong> Design Standards.</p>

                            <div style="background: url('images/world-map.png') no-repeat center center; background-size: 100%;">
                                <address>
                                    <strong>Headquarters:</strong><br>
                                    795 Folsom Ave, Suite 600<br>
                                    San Francisco, CA 94107<br>
                                </address>
                                <abbr title="Phone Number"><strong>Phone:</strong></abbr> (91) 8547 632521<br>
                                <abbr title="Fax"><strong>Fax:</strong></abbr> (91) 11 4752 1433<br>
                                <abbr title="Email Address"><strong>Email:</strong></abbr> info@canvas.com
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
                    Copyrights &copy; 2014 All Rights Reserved by Canvas Inc.<br>
                    <div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
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

                    <i class="icon-envelope2"></i> info@canvas.com <span class="middot">&middot;</span> <i class="icon-headphones"></i> +91-11-6541-6369 <span class="middot">&middot;</span> <i class="icon-skype2"></i> CanvasOnSkype
                </div>

            </div>

        </div><!-- #copyrights end -->

    </footer><!-- #footer end -->

</div>

<!-- Go To Top
	============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="<?= $constante::JS; ?>functions.js"></script>

</body>
</html>