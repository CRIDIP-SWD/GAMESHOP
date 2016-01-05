<section id="slider" class="slider-parallax revoslider-wrap clearfix">

    <!--
    #################################
        - THEMEPUNCH BANNER -
    #################################
    -->
    <div class="tp-banner-container fullscreen-container">
        <div class="tp-banner" >
            <ul>    <!-- SLIDE  -->
                <li data-transition="boxslide" data-slotamout="7" data-link="#">
                    <img src="<?= $constante->getUrl('', false, true); ?>slides/nuns4.jpg">
                    <div class="caption sft" style="font-size: 56px; color: #fff;" data-x="800" data-y="500" data-speed="700" data-start="2500" data-easing="easeOutLeft">
                        <div class="btn-group">
                            <button class="btn btn-default btn-lg"><i class="icon-line2-basket-loaded"></i></button>
                            <button class="btn btn-default btn-lg">Précommander Maintenant sur PS4</button>
                        </div>
                    </div>
                    <div class="caption sft" style="font-size: 56px; color: #fff;" data-x="800" data-y="560" data-speed="700" data-start="2600" data-easing="easeOutLeft">
                        <div class="btn-group">
                            <button class="btn btn-primary btn-lg"><i class="icon-line2-basket-loaded"></i></button>
                            <button class="btn btn-primary btn-lg">Précommander Maintenant sur Xbox One</button>
                        </div>
                    </div>
                </li>
                <li data-transition="boxslide" data-slotamout="7" data-link="#">
                    <img src="<?= $constante->getUrl('', false, true); ?>slides/annee/sky.png">
                    <div class="caption sft" data-x="0" data-y="0" data-speed="700" data-start="2500" data-easing="easeOutLeft">
                        <img src="<?= $constante->getUrl('', false, true); ?>slides/annee/naruto.png" />
                    </div>
                    <div class="caption sft" style="font-size: 56px; color: #fff;" data-x="800" data-y="560" data-speed="700" data-start="2600" data-easing="easeOutLeft">
                        <div class="btn-group">
                            <button class="btn btn-primary btn-lg"><i class="icon-line2-basket-loaded"></i></button>
                            <button class="btn btn-primary btn-lg">Précommander Maintenant sur Xbox One</button>
                        </div>
                    </div>
                </li>
            </ul>

        </div>
    </div>

    <script type="text/javascript">

        var tpj=jQuery;
        tpj.noConflict();

        tpj(document).ready(function() {

            var apiRevoSlider = tpj('.tp-banner').show().revolution(
                {
                    dottedOverlay:"none",
                    delay:9000,
                    startwidth:1140,
                    startheight:700,
                    hideThumbs:200,

                    thumbWidth:100,
                    thumbHeight:50,
                    thumbAmount:3,

                    navigationType:"none",
                    navigationArrows:"solo",
                    navigationStyle:"preview4",

                    touchenabled:"on",
                    onHoverStop:"on",

                    swipe_velocity: 0.7,
                    swipe_min_touches: 1,
                    swipe_max_touches: 1,
                    drag_block_vertical: false,


                    parallax:"mouse",
                    parallaxBgFreeze:"on",
                    parallaxLevels:[8,7,6,5,4,3,2,1],
                    parallaxDisableOnMobile:"on",


                    keyboardNavigation:"on",

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
                    fullWidth:"off",
                    fullScreen:"on",

                    spinner:"spinner0",

                    stopLoop:"off",
                    stopAfterLoops:-1,
                    stopAtSlide:-1,

                    shuffle:"off",


                    forceFullWidth:"off",
                    fullScreenAlignForce:"off",
                    minFullScreenHeight:"400",

                    hideThumbsOnMobile:"off",
                    hideNavDelayOnMobile:1500,
                    hideBulletsOnMobile:"off",
                    hideArrowsOnMobile:"off",
                    hideThumbsUnderResolution:0,

                    hideSliderAtLimit:0,
                    hideCaptionAtLimit:0,
                    hideAllCaptionAtLilmit:0,
                    startWithSlide:0,
                    fullScreenOffsetContainer: ".header",
                    fullScreenOffset:"0px"
                });

            apiRevoSlider.bind("revolution.slide.onchange",function (e,data) {
                if( $(window).width() > 992 ) {
                    if( $('#slider ul > li').eq(data.slideIndex-1).hasClass('dark') ){
                        $('#header.transparent-header:not(.sticky-header,.semi-transparent)').addClass('dark');
                        $('#header.transparent-header.sticky-header,#header.transparent-header.semi-transparent.sticky-header').removeClass('dark');
                        $('#header-wrap').removeClass('not-dark');
                    } else {
                        if( $('body').hasClass('dark') ) {
                            $('#header.transparent-header:not(.semi-transparent)').removeClass('dark');
                            $('#header.transparent-header:not(.sticky-header,.semi-transparent)').find('#header-wrap').addClass('not-dark');
                        } else {
                            $('#header.transparent-header:not(.semi-transparent)').removeClass('dark');
                            $('#header-wrap').removeClass('not-dark');
                        }
                    }
                    SEMICOLON.header.darkLogo();
                }
            });

        }); //ready

    </script>

    <!-- END REVOLUTION SLIDER -->

</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <a href="index.php?view=categorie&idcategorie=1" class="banner-categorie"><img src="<?= $constante->getUrl(array('images/')); ?>shop/banners/ps4-banner.png" class="img-responsive" alt="PS4 Catégorie" /></a>
                    </div>
                    <div class="col-md-4">
                        <a href="index.php?view=categorie&idcategorie=3" class="banner-categorie"><img src="<?= $constante->getUrl(array('images/')); ?>shop/banners/xbox-one-banner.png" class="img-responsive" alt="PS4 Catégorie" /></a>
                    </div>
                    <div class="col-md-4">
                        <a href="index.php?view=categorie&idcategorie=9" class="banner-categorie"><img src="<?= $constante->getUrl(array('images/')); ?>shop/banners/box-office-banner.png" class="img-responsive" alt="Meilleur Vente" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="tabs topmargin-lg clearfix" id="tab-3">

                <ul class="tab-nav clearfix">
                    <li><a href="#tabs-9">Nouveauté</a></li>
                    <li><a href="#tabs-10">Promotion</a></li>
                    <li><a href="#tabs-11">Précommande</a></li>
                </ul>

                <div class="tab-container">

                    <div class="tab-content clearfix" id="tabs-9">

                        <div id="shop" class="clearfix">
                            <?php
                            $date = $date_format->convert_strtotime(date("d-m-Y"));
                            $date_moin = strtotime($date ."+ 30 days");
                            $sql_new = mysql_query("SELECT * FROM produits, produits_categorie WHERE date_sortie >= '$date' AND date_sortie <= '$date_moin' AND produits_categorie.ref_produit = produits.ref_produit LIMIT 4")or die(mysql_error());
                            while($new = mysql_fetch_array($sql_new))
                            {
                            ?>
                            <div class="product clearfix">
                                <div class="product-image">
                                    <a href="#"><img src="<?= $constante->getUrl(array(), false, true); ?>produit/cards/<?= $new['ref_produit']; ?>.jpg" class="img-responsive" height="360" alt="Checked Short Dress"></a>
                                    <a href="#"><img src="<?= $constante->getUrl(array(), false, true); ?>produit/cards/<?= $new['ref_produit']; ?>.jpg" class="img-responsive" height="360" alt="Checked Short Dress"></a>
                                    <!--<div class="sale-flash">50% Off*</div>-->
                                    <div class="product-overlay">
                                        <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Ajouter au panier</span></a>
                                        <a href="assets/include/ajax/shop-item.php" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Voir</span></a>
                                    </div>
                                </div>
                                <div class="product-desc">
                                    <div class="product-title"><h3><a href="#"><?= $new['designation']; ?></a></h3></div>
                                    <div class="product-price"><ins><?= number_format($new['prix_vente'], 2, ',', ' ')." €"; ?></ins></div>
                                    <div class="h5 text-primary"><?= $new['designation_cat']; ?></div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>

                    </div>

                    <div class="tab-content clearfix" id="tabs-10">

                        <div id="shop" class="clearfix">

                            <div class="product clearfix">
                                <div class="product-image">
                                    <a href="#"><img src="<?= $constante->getUrl(array('images/')); ?>shop/sunglasses/1.jpg" alt="Unisex Sunglasses"></a>
                                    <a href="#"><img src="<?= $constante->getUrl(array('images/')); ?>shop/sunglasses/1-1.jpg" alt="Unisex Sunglasses"></a>
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
                                    <a href="#"><img src="<?= $constante->getUrl(array('images/')); ?>shop/tshirts/1.jpg" alt="Blue Round-Neck Tshirt"></a>
                                    <a href="#"><img src="<?= $constante->getUrl(array('images/')); ?>shop/tshirts/1-1.jpg" alt="Blue Round-Neck Tshirt"></a>
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
                                    <a href="#"><img src="<?= $constante->getUrl(array('images/')); ?>shop/watches/1.jpg" alt="Silver Chrome Watch"></a>
                                    <a href="#"><img src="<?= $constante->getUrl(array('images/')); ?>shop/watches/1-1.jpg" alt="Silver Chrome Watch"></a>
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
                                    <a href="#"><img src="<?= $constante->getUrl(array('images/')); ?>shop/shoes/2.jpg" alt="Men Grey Casual Shoes"></a>
                                    <a href="#"><img src="<?= $constante->getUrl(array('images/')); ?>shop/shoes/2-1.jpg" alt="Men Grey Casual Shoes"></a>
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
                            <?php
                            $date = $date_format->convert_strtotime(date("d-m-Y"));
                            $date_moin = strtotime($date ."+ 30 days");
                            $sql_preco = mysql_query("SELECT * FROM produits, produits_categorie, categorie WHERE date_sortie > '$date' AND produits_categorie.ref_produit = produits.ref_produit AND produits_categorie.idcategorie = categorie.id LIMIT 4")or die(mysql_error());
                            while($preco = mysql_fetch_array($sql_preco))
                            {
                            ?>
                            <div class="product clearfix">
                                <div class="product-image">
                                    <a href="#"><img src="<?= $constante->getUrl(array(), false, true); ?>produit/cards/<?= $preco['ref_produit']; ?>.jpg" class="img-responsive" height="360" alt="Checked Short Dress"></a>
                                    <a href="#"><img src="<?= $constante->getUrl(array(), false, true); ?>produit/cards/<?= $preco['ref_produit']; ?>.jpg" class="img-responsive" height="360" alt="Checked Short Dress"></a>
                                    <div class="product-overlay">
                                        <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Ajouter au panier</span></a>
                                        <a href="assets/include/ajax/shop-item.php?ref_produit=<?= $preco['ref_produit']; ?>" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Voir</span></a>
                                    </div>
                                </div>
                                <div class="product-desc">
                                    <div class="product-title"><h3><a href="#"><?= $preco['designation']; ?></a></h3></div>
                                    <div class="product-price"><ins><?= number_format($preco['prix_vente'], 2, ',', ' ')." €"; ?></ins></div>
                                    <div class="h5 text-primary"><?= $preco['designation_cat']; ?></div>
                                </div>
                            </div>
                            <?php } ?>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</section>