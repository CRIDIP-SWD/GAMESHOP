<?php
$ref_produit = $_GET['ref_produit'];
$sql_produit = mysql_query("SELECT * FROM produits, produits_categorie, categorie WHERE produits_categorie.idcategorie = categorie.id AND produits_categorie.ref_produit = produits.ref_produit AND produits.ref_produit = '$ref_produit'")or die(mysql_error());
$produit = mysql_fetch_array($sql_produit);
$sql_caract = mysql_query("SELECt * FROM produits_caracteristique WHERE ref_produit = '$ref_produit'")or die(mysql_error());
$caract = mysql_fetch_array($sql_caract);
$verif = $produit_cls->verif_stat_product($ref_produit);
if($verif === 3)
{
    $sql_promo = mysql_query("SELECT * FROM produits_promotion WHERE ref_produit = '$ref_produit'")or die(mysql_error());
    $promo = mysql_fetch_array($sql_promo);
}
?>
<!-- Page Title
		============================================= -->
<section id="page-title" <?php if(!empty($produit['banner'])){echo "style='background-image: url(".$constante->getUrl(array(), false, true)."produit/banner/banner_".$produit['banner'].".jpg);'";} ?>>

    <div class="container clearfix">
        <h1 <?php if(!empty($produit['banner'])){echo "style='color: white;'";} ?>><?= $produit['designation']; ?></h1>
        <ol class="breadcrumb">
            <li <?php if(!empty($produit['banner'])){echo "style='color: white; font-size: 30px; font-weight: bolder;'";} ?> style="font-size: 30px; font-weight: bolder;"><?= $produit['designation_cat']; ?></li>
        </ol>
    </div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <div class="single-product">

                <div class="product">

                    <div class="col_two_fifth">

                        <!-- Product Single - Gallery
                        ============================================= -->
                        <div class="product-image">
                            <img src="<?= $constante->getUrl(array(), false,true); ?>produit/cards/<?= $produit['ref_produit']; ?>.jpg" />
                            <?php if($verif == 1): ?>
                                <div class="sale-flash nouveaute">NOUVEAU !</div>
                            <?php endif; ?>
                            <?php if($verif == 2): ?>
                                <div class="sale-flash precommande">PRECOMMANDEZ MAINTENANT!</div>
                            <?php endif; ?>
                            <?php if($verif == 3): ?>
                                <div class="sale-flash promotion">EN PROMOTION !</div>
                            <?php endif; ?>
                        </div><!-- Product Single - Gallery End -->

                    </div>

                    <div class="col_two_fifth product-desc">

                        <!-- Product Single - Price
                        ============================================= -->
                        <div class="product-price">
                            <?php if($verif === 3){ ?>
                                <del><?= number_format($produit['prix_vente'], 2, ',', ' ')." €" ?></del>
                                <ins><?= number_format($promo['new_price'], 2, ',', ' ')." €" ?></ins>
                            <?php }else{ ?>
                                <ins><?= number_format($produit['prix_vente'], 2, ',', ' ')." €" ?></ins>
                            <?php } ?>
                        </div><!-- Product Single - Price End -->

                        <div class="clear"></div>
                        <div class="line"></div>

                        <!-- Product Single - Quantity & Cart Button
                        ============================================= -->
                        <form class="cart nobottommargin clearfix" method="post" enctype='multipart/form-data'>
                            <div class="quantity clearfix">
                                <input type="button" value="-" class="minus">
                                <input type="text" step="1" min="1"  name="quantity" value="1" title="Qty" class="qty" size="4" />
                                <input type="button" value="+" class="plus">
                            </div>
                            <?php if($verif === 2){ ?>
                                <button type="submit" class="add-to-cart button nomargin">PRECOMMANDER</button>
                            <?php }else{ ?>
                                <button type="submit" class="add-to-cart button nomargin">Ajouter au Panier</button>
                            <?php } ?>
                        </form><!-- Product Single - Quantity & Cart Button End -->

                        <div class="clear"></div>
                        <div class="line"></div>

                        <!-- Product Single - Short Description
                        ============================================= -->
                        <?= html_entity_decode($produit['short_description']); ?>

                        <!-- Product Single - Short Description End -->
                        <div class="clear"></div>
                        <!-- Product Single - Meta
                        ============================================= -->
                        <div class="panel panel-default product-meta">
                            <div class="panel-body">
                                <table style="width: 50%;">
                                    <tbody>
                                    <?php if(!empty($caract['editeur'])){ ?>
                                        <tr>
                                            <td style="width: 50%; font-weight: bold;">EDITEUR:</td>
                                            <td style="width: 50%; font-style: italic;"><?= $caract['editeur']; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if(!empty($caract['genre'])){ ?>
                                        <tr>
                                            <td style="width: 50%; font-weight: bold;">GENRE:</td>
                                            <td style="width: 50%; font-style: italic;"><?= $caract['genre']; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if(!empty($caract['multijoueur'])){ ?>
                                        <tr>
                                            <td style="width: 50%; font-weight: bold;">MULTI JOUEUR:</td>
                                            <td style="width: 50%; font-style: italic;"><?php if($caract['multijoueur'] == 0){echo "Non";}else{echo "Oui";} ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if(!empty($caract['internet'])){ ?>
                                        <tr>
                                            <td style="width: 50%; font-weight: bold;">INTERNET:</td>
                                            <td style="width: 50%; font-style: italic;"><?php if($caract['internet'] == 0){echo "Non";}else{echo "Oui";} ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if(!empty($caract['option'])){ ?>
                                        <tr>
                                            <td style="width: 50%; font-weight: bold;">OPTION:</td>
                                            <td style="width: 50%; font-style: italic;"><?= $caract['option']; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if(!empty($caract['couleur'])){ ?>
                                        <tr>
                                            <td style="width: 50%; font-weight: bold;">COULEUR:</td>
                                            <td style="width: 50%; font-style: italic;"><?= $caract['couleur']; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if(!empty($caract['cap_hdd'])){ ?>
                                        <tr>
                                            <td style="width: 50%; font-weight: bold;">DISQUE DUR:</td>
                                            <td style="width: 50%; font-style: italic;"><?= $caract['cap_hdd']; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if(!empty($caract['eth'])){ ?>
                                        <tr>
                                            <td style="width: 50%; font-weight: bold;">ETHERNET:</td>
                                            <td style="width: 50%; font-style: italic;"><?php if($caract['eth'] == 0){echo "Non";}else{echo "Oui";} ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if(!empty($caract['wifi'])){ ?>
                                        <tr>
                                            <td style="width: 50%; font-weight: bold;">WI-FI:</td>
                                            <td style="width: 50%; font-style: italic;"><?php if($caract['wifi'] == 0){echo "Non";}else{echo "Oui";} ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if(!empty($caract['nb_usb'])){ ?>
                                        <tr>
                                            <td style="width: 50%; font-weight: bold;">PORT USB:</td>
                                            <td style="width: 50%; font-style: italic;"><?= $caract['nb_usb']; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if(!empty($caract['compatibilite'])){ ?>
                                        <tr>
                                            <td style="width: 50%; font-weight: bold;">COMPATIBLE:</td>
                                            <td style="width: 50%; font-style: italic;"><?= $caract['compatibilite']; ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- Product Single - Meta End -->

                        <!-- Product Single - Share
                        ============================================= -->
                        <div class="si-share noborder clearfix">
                            <span>Share:</span>
                            <div>
                                <a href="#" class="social-icon si-borderless si-facebook">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>
                                <a href="#" class="social-icon si-borderless si-twitter">
                                    <i class="icon-twitter"></i>
                                    <i class="icon-twitter"></i>
                                </a>
                                <a href="#" class="social-icon si-borderless si-pinterest">
                                    <i class="icon-pinterest"></i>
                                    <i class="icon-pinterest"></i>
                                </a>
                                <a href="#" class="social-icon si-borderless si-gplus">
                                    <i class="icon-gplus"></i>
                                    <i class="icon-gplus"></i>
                                </a>
                                <a href="#" class="social-icon si-borderless si-rss">
                                    <i class="icon-rss"></i>
                                    <i class="icon-rss"></i>
                                </a>
                                <a href="#" class="social-icon si-borderless si-email3">
                                    <i class="icon-email3"></i>
                                    <i class="icon-email3"></i>
                                </a>
                            </div>
                        </div><!-- Product Single - Share End -->

                    </div>


                    <?php if($produit_cls->count_bonus($ref_produit) != 0): ?>
                        <div class="divider divider-rounded divider-center divider-gift">
                            <i class="icon-gift " style="height: 80px;line-height: 80px;width: 80px; font-size: 40px !important;"></i>
                        </div>
                        <div class="clear"></div><div class="line"></div>
                        <div class="col_full nobottommargin">

                            <h4>EN BONUS</h4>

                            <div id="oc-product" class="owl-carousel product-carousel">
                                <?php
                                $sql_bonus = mysql_query("SELECT * FROM produits_bonus, produits WHERE produits_bonus.ref_produit_bonus = produits.ref_produit AND produits_bonus.ref_produit = '$ref_produit'")or die(mysql_error());
                                while($bonus = mysql_fetch_array($sql_bonus))
                                {
                                ?>
                                <div class="oc-item">
                                    <div class="product iproduct clearfix">
                                        <div class="product-image">
                                            <a href="#"><img src="<?= $constante->getUrl(array(), false, true); ?>produit/cards/<?= $bonus['ref_produit']; ?>.jpg" alt="Checked Short Dress"></a>
                                            <?php if($verif == 1): ?>
                                                <div class="sale-flash nouveaute">NOUVEAU !</div>
                                            <?php endif; ?>
                                            <?php if($verif == 2): ?>
                                                <div class="sale-flash precommande">PRECOMMANDEZ MAINTENANT!</div>
                                            <?php endif; ?>
                                            <?php if($verif == 3): ?>
                                                <div class="sale-flash promotion">EN PROMOTION !</div>
                                            <?php endif; ?>
                                            <div class="product-overlay">
                                                <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Ajouter au Panier</span></a>
                                                <a href="assets/include/ajax/shop-item.php?ref_produit=<?= $bonus['ref_produit']; ?>" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> VOIR</span></a>
                                            </div>
                                        </div>
                                        <div class="product-desc center">
                                            <div class="product-title"><h3><a href="#"><?= $bonus['designation']; ?></a></h3></div>
                                            <div class="product-price">
                                                <ins>CADEAUX</ins>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>

                            <script type="text/javascript">

                                jQuery(document).ready(function($) {

                                    var ocProduct = $("#oc-product");

                                    ocProduct.owlCarousel({
                                        margin: 30,
                                        nav: true,
                                        navText : ['<i class="icon-angle-left"></i>','<i class="icon-angle-right"></i>'],
                                        autoplayHoverPause: true,
                                        dots: false,
                                        responsive:{
                                            0:{ items:1 },
                                            480:{ items:2 },
                                            768:{ items:3 },
                                            992:{ items:4 }
                                        }
                                    });

                                });

                            </script>

                        </div>
                        <div class="clear"></div><div class="line"></div>
                    <?php endif; ?>


                    <div class="col_full nobottommargin">

                        <div class="tabs clearfix nobottommargin" id="tab-1">

                            <ul class="tab-nav clearfix">
                                <?php if(!empty($produit['long_description'])): ?>
                                <li><a href="#desc"><i class="icon-align-justify2"></i><span class="hidden-xs"> Description</span></a></li>
                                <?php endif; ?>
                                <?php if($produit_cls->count_images($ref_produit) != 0): ?>
                                <li><a href="#images"><i class="icon-star3"></i><span class="hidden-xs"> Images</span></a></li>
                                <?php endif; ?>
                                <?php if($produit_cls->count_videos($ref_produit) != 0): ?>
                                <li><a href="#videos"><i class="icon-star3"></i><span class="hidden-xs"> Vidéos</span></a></li>
                                <?php endif; ?>
                            </ul>

                            <div class="tab-container">
                                <?php if(!empty($produit['long_description'])): ?>
                                <div class="tab-content clearfix" id="desc">
                                    <?= html_entity_decode($produit['long_description']); ?>
                                </div>
                                <?php endif; ?>
                                <?php if($produit_cls->count_images($ref_produit) != 0): ?>
                                <div class="tab-content clearfix" id="images">
                                    <h1>IMAGES</h1>

                                    <div class="masonry-thumbs col-6" data-big="3" data-lightbox="gallery">
                                        <?php
                                        $sql_images = mysql_query("SELECT * FROM produits_images WHERE ref_produit = '$ref_produit'")or die(mysql_error());
                                        while($images = mysql_fetch_array($sql_images))
                                        {
                                        ?>
                                        <a href="<?= $constante->getUrl(array(), false, true); ?>produit/gallery/<?= $ref_produit; ?>/<?= $images['images']; ?>.jpg" data-lightbox="<?= $images['images']; ?>">
                                            <img class="image_fade" src="<?= $constante->getUrl(array(), false, true); ?>produit/gallery/<?= $ref_produit; ?>/<?= $images['images']; ?>.jpg" alt="<?= $images['images']; ?>">
                                        </a>
                                        <?php } ?>
                                    </div>

                                </div>
                                <?php endif; ?>
                                <?php if($produit_cls->count_videos($ref_produit) != 0): ?>
                                <div class="tab-content clearfix" id="videos">

                                </div>
                                <?php endif; ?>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="clear"></div><div class="line"></div>

            <div class="col_full nobottommargin">

                <h4>Related Products</h4>

                <div id="oc-product" class="owl-carousel product-carousel">

                    <div class="oc-item">
                        <div class="product iproduct clearfix">
                            <div class="product-image">
                                <a href="#"><img src="images/shop/dress/1.jpg" alt="Checked Short Dress"></a>
                                <a href="#"><img src="images/shop/dress/1-1.jpg" alt="Checked Short Dress"></a>
                                <div class="sale-flash">50% Off*</div>
                                <div class="product-overlay">
                                    <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                    <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                </div>
                            </div>
                            <div class="product-desc center">
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
                    </div>

                    <div class="oc-item">
                        <div class="product iproduct clearfix">
                            <div class="product-image">
                                <a href="#"><img src="images/shop/pants/1-1.jpg" alt="Slim Fit Chinos"></a>
                                <a href="#"><img src="images/shop/pants/1.jpg" alt="Slim Fit Chinos"></a>
                                <div class="product-overlay">
                                    <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                    <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                </div>
                            </div>
                            <div class="product-desc center">
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
                    </div>

                    <div class="oc-item">
                        <div class="product iproduct clearfix">
                            <div class="product-image">
                                <a href="#"><img src="images/shop/shoes/1-1.jpg" alt="Dark Brown Boots"></a>
                                <a href="#"><img src="images/shop/shoes/1.jpg" alt="Dark Brown Boots"></a>
                                <div class="product-overlay">
                                    <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                    <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                </div>
                            </div>
                            <div class="product-desc center">
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
                    </div>

                    <div class="oc-item">
                        <div class="product iproduct clearfix">
                            <div class="product-image">
                                <a href="#"><img src="images/shop/dress/2.jpg" alt="Light Blue Denim Dress"></a>
                                <a href="#"><img src="images/shop/dress/2-2.jpg" alt="Light Blue Denim Dress"></a>
                                <div class="product-overlay">
                                    <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                    <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                </div>
                            </div>
                            <div class="product-desc center">
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

                    <div class="oc-item">
                        <div class="product iproduct clearfix">
                            <div class="product-image">
                                <a href="#"><img src="images/shop/sunglasses/1.jpg" alt="Unisex Sunglasses"></a>
                                <a href="#"><img src="images/shop/sunglasses/1-1.jpg" alt="Unisex Sunglasses"></a>
                                <div class="sale-flash">Sale!</div>
                                <div class="product-overlay">
                                    <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                    <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                </div>
                            </div>
                            <div class="product-desc center">
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
                    </div>

                </div>

                <script type="text/javascript">

                    jQuery(document).ready(function($) {

                        var ocProduct = $("#oc-product");

                        ocProduct.owlCarousel({
                            margin: 30,
                            nav: true,
                            navText : ['<i class="icon-angle-left"></i>','<i class="icon-angle-right"></i>'],
                            autoplayHoverPause: true,
                            dots: false,
                            responsive:{
                                0:{ items:1 },
                                480:{ items:2 },
                                768:{ items:3 },
                                992:{ items:4 }
                            }
                        });

                    });

                </script>

            </div>

        </div>

    </div>

</section><!-- #content end -->
