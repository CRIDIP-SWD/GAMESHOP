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
                                    <a href="#"><img src="<?= $constante->getUrl(array(), false, true); ?>produit/cards/<?= $produit['ref_produit']; ?>.jpg" alt="Checked Short Dress"></a>
                                    <!--<div class="sale-flash">50% Off*</div>-->
                                    <div class="product-overlay">
                                        <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Ajouter au panier</span></a>
                                        <a href="assets/include/ajax/shop-item.php" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Voir</span></a>
                                    </div>
                                </div>
                                <div class="product-desc center">
                                    <div class="product-title"><h3><a href="#"><?= $produit['designation']; ?></a></h3></div>
                                    <div class="product-price"><ins><?= number_format($produit['prix_vente'], 2, ',', ' ')." €"; ?></ins></div>
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
                                    <li class="active"><a href="#">Shirts</a></li>
                                    <li class=""><a href="#">Shirts</a></li>
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

