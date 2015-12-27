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



                    <div class="col_full nobottommargin">

                        <div class="tabs clearfix nobottommargin" id="tab-1">

                            <ul class="tab-nav clearfix">
                                <li><a href="#tabs-1"><i class="icon-align-justify2"></i><span class="hidden-xs"> Description</span></a></li>
                                <li><a href="#tabs-2"><i class="icon-info-sign"></i><span class="hidden-xs"> Additional Information</span></a></li>
                                <li><a href="#tabs-3"><i class="icon-star3"></i><span class="hidden-xs"> Reviews (2)</span></a></li>
                            </ul>

                            <div class="tab-container">

                                <div class="tab-content clearfix" id="tabs-1">
                                    <p>Pink printed dress,  woven, round neck with a keyhole and buttoned closure at the back, sleeveless, concealed zip up at left side seam, belt loops along waist with slight gathers beneath, brand appliqu?? above left front hem, has an attached lining.</p>
                                    Comes with a white, slim synthetic belt that has a tang clasp.
                                </div>
                                <div class="tab-content clearfix" id="tabs-2">

                                    <table class="table table-striped table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>Size</td>
                                            <td>Small, Medium &amp; Large</td>
                                        </tr>
                                        <tr>
                                            <td>Color</td>
                                            <td>Pink &amp; White</td>
                                        </tr>
                                        <tr>
                                            <td>Waist</td>
                                            <td>26 cm</td>
                                        </tr>
                                        <tr>
                                            <td>Length</td>
                                            <td>40 cm</td>
                                        </tr>
                                        <tr>
                                            <td>Chest</td>
                                            <td>33 inches</td>
                                        </tr>
                                        <tr>
                                            <td>Fabric</td>
                                            <td>Cotton, Silk &amp; Synthetic</td>
                                        </tr>
                                        <tr>
                                            <td>Warranty</td>
                                            <td>3 Months</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                                <div class="tab-content clearfix" id="tabs-3">

                                    <div id="reviews" class="clearfix">

                                        <ol class="commentlist clearfix">

                                            <li class="comment even thread-even depth-1" id="li-comment-1">
                                                <div id="comment-1" class="comment-wrap clearfix">

                                                    <div class="comment-meta">
                                                        <div class="comment-author vcard">
																	<span class="comment-avatar clearfix">
																	<img alt='' src='http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60' height='60' width='60' /></span>
                                                        </div>
                                                    </div>

                                                    <div class="comment-content clearfix">
                                                        <div class="comment-author">John Doe<span><a href="#" title="Permalink to this comment">April 24, 2014 at 10:46AM</a></span></div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo perferendis aliquid tenetur. Aliquid, tempora, sit aliquam officiis nihil autem eum at repellendus facilis quaerat consequatur commodi laborum saepe non nemo nam maxime quis error tempore possimus est quasi reprehenderit fuga!</p>
                                                        <div class="review-comment-ratings">
                                                            <i class="icon-star3"></i>
                                                            <i class="icon-star3"></i>
                                                            <i class="icon-star3"></i>
                                                            <i class="icon-star3"></i>
                                                            <i class="icon-star-half-full"></i>
                                                        </div>
                                                    </div>

                                                    <div class="clear"></div>

                                                </div>
                                            </li>

                                            <li class="comment even thread-even depth-1" id="li-comment-1">
                                                <div id="comment-1" class="comment-wrap clearfix">

                                                    <div class="comment-meta">
                                                        <div class="comment-author vcard">
																	<span class="comment-avatar clearfix">
																	<img alt='' src='http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60' height='60' width='60' /></span>
                                                        </div>
                                                    </div>

                                                    <div class="comment-content clearfix">
                                                        <div class="comment-author">Mary Jane<span><a href="#" title="Permalink to this comment">June 16, 2014 at 6:00PM</a></span></div>
                                                        <p>Quasi, blanditiis, neque ipsum numquam odit asperiores hic dolor necessitatibus libero sequi amet voluptatibus ipsam velit qui harum temporibus cum nemo iste aperiam explicabo fuga odio ratione sint fugiat consequuntur vitae adipisci delectus eum incidunt possimus tenetur excepturi at accusantium quod doloremque reprehenderit aut expedita labore error atque?</p>
                                                        <div class="review-comment-ratings">
                                                            <i class="icon-star3"></i>
                                                            <i class="icon-star3"></i>
                                                            <i class="icon-star3"></i>
                                                            <i class="icon-star-empty"></i>
                                                            <i class="icon-star-empty"></i>
                                                        </div>
                                                    </div>

                                                    <div class="clear"></div>

                                                </div>
                                            </li>

                                        </ol>

                                        <!-- Modal Reviews
                                        ============================================= -->
                                        <a href="#" data-toggle="modal" data-target="#reviewFormModal" class="button button-3d nomargin fright">Add a Review</a>

                                        <div class="modal fade" id="reviewFormModal" tabindex="-1" role="dialog" aria-labelledby="reviewFormModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title" id="reviewFormModalLabel">Submit a Review</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="nobottommargin" id="template-reviewform" name="template-reviewform" action="#" method="post">

                                                            <div class="col_half">
                                                                <label for="template-reviewform-name">Name <small>*</small></label>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icon-user"></i></span>
                                                                    <input type="text" id="template-reviewform-name" name="template-reviewform-name" value="" class="form-control required" />
                                                                </div>
                                                            </div>

                                                            <div class="col_half col_last">
                                                                <label for="template-reviewform-email">Email <small>*</small></label>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">@</span>
                                                                    <input type="email" id="template-reviewform-email" name="template-reviewform-email" value="" class="required email form-control" />
                                                                </div>
                                                            </div>

                                                            <div class="clear"></div>

                                                            <div class="col_full col_last">
                                                                <label for="template-reviewform-rating">Rating</label>
                                                                <select id="template-reviewform-rating" name="template-reviewform-rating" class="form-control">
                                                                    <option value="">-- Select One --</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                </select>
                                                            </div>

                                                            <div class="clear"></div>

                                                            <div class="col_full">
                                                                <label for="template-reviewform-comment">Comment <small>*</small></label>
                                                                <textarea class="required form-control" id="template-reviewform-comment" name="template-reviewform-comment" rows="6" cols="30"></textarea>
                                                            </div>

                                                            <div class="col_full nobottommargin">
                                                                <button class="button button-3d nomargin" type="submit" id="template-reviewform-submit" name="template-reviewform-submit" value="submit">Submit Review</button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                        <!-- Modal Reviews End -->

                                    </div>

                                </div>

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
