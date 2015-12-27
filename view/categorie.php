<?php if(isset($_GET['idcategorie'])){ ?>
    <?php if(!isset($_GET['idsubcategorie'])){ ?>
        <?php
        $idcategorie = $_GET['idcategorie'];
        $sql_categorie = mysql_query("SELECT * FROM categorie WHERE id = '$idcategorie'")or die(mysql_error());
        $categorie = mysql_fetch_array($sql_categorie);
        ?>
        <!-- Page Title
		============================================= -->
        <section id="page-title">

            <div class="container clearfix">
                <img src="<?= $constante->getUrl(array(), false, true); ?>marque/<?= $categorie['images_cat']; ?>.png" width="240" class="img-responsive" />
                <!--<span>Start Buying your Favourite Theme</span>-->
                <ol class="breadcrumb">
                    <li><a href="#">GAMESHOP</a></li>
                    <li class="active"><?= $categorie['designation_cat']; ?></li>
                </ol>
            </div>

        </section><!-- #page-title end -->

        <!-- Content
        ============================================= -->
        <section id="content">

            <div class="content-wrap">

                <div class="container clearfix">

                    <!-- Post Content
                    ============================================= -->
                    <div class="postcontent nobottommargin col_last">

                        <!-- Shop
                        ============================================= -->
                        <div id="shop" class="product-3 clearfix">
                            <?php
                            $sql_produit = mysql_query("SELECT * FROM produits, produits_categorie, categorie WHERE produits_categorie.ref_produit = produits.ref_produit
                                           AND produits_categorie.idcategorie = categorie.id
                                           AND produits_categorie.idcategorie = '$idcategorie'")or die(mysql_error());
                            while($produit = mysql_fetch_array($sql_produit))
                            {
                            ?>
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
                            <?php } ?>
                        </div><!-- #shop end -->

                    </div><!-- .postcontent end -->

                    <!-- Sidebar
                    ============================================= -->
                    <div class="sidebar nobottommargin">
                        <div class="sidebar-widgets-wrap">

                            <div class="widget widget_links clearfix">

                                <h4><?= $categorie['designation_cat']; ?></h4>
                                <ul>
                                    <li><a href="#">Shirts</a></li>
                                    <li><a href="#">Pants</a></li>
                                    <li><a href="#">Tshirts</a></li>
                                    <li><a href="#">Sunglasses</a></li>
                                    <li><a href="#">Shoes</a></li>
                                    <li><a href="#">Bags</a></li>
                                    <li><a href="#">Watches</a></li>
                                </ul>

                            </div>


                        </div>
                    </div><!-- .sidebar end -->

                </div>

            </div>

        </section><!-- #content end -->
    <?php }else{ ?>
        <?php
        $idcategorie = $_GET['idcategorie'];
        $idsubcategorie = $_GET['idsubcategorie'];
        ?>
    <?php } ?>
<?php } ?>

