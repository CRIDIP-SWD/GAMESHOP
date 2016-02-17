<?php if(isset($_GET['idcategorie'])){ ?>
    <?php if(!isset($_GET['idsubcategorie'])){ ?>
        <?php
        $idcategorie = $_GET['idcategorie'];
        $categorie = $DB->query("SELECT * FROM categorie WHERE id = :id", array(
            "id" => $idcategorie
        ));
        ?>
        <!-- Page Title
		============================================= -->
        <section id="page-title">

            <div class="container clearfix">
                <?php if($categorie[0]->images_cat){ ?>
                <img src="<?= $constante->getUrl(array(), false, true); ?>marque/<?= $categorie[0]->images_cat; ?>.png" width="240" class="img-responsive" />
                <?php }else{ ?>
                <img src="assets/images/logo.png" alt="Canvas Logo">
                <?php } ?>
                <!--<span>Start Buying your Favourite Theme</span>-->
                <ol class="breadcrumb">
                    <li><a href="#">GAMESHOP</a></li>
                    <li class="active"><?= $categorie[0]->designation_cat; ?></li>
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
                        <div id="shop" class="product-1 clearfix">
                            <?php
                            $sql_produit = $DB->query("SELECT * FROM produits, produits_categorie, categorie WHERE produits_categorie.ref_produit = produits.ref_produit
                                           AND produits_categorie.idcategorie = categorie.id
                                           AND produits_categorie.idcategorie = :idcategorie ORDER BY statut_global ASC", array(
                                "idcategorie" => $idcategorie
                            ));
                            foreach($sql_produit as $produit):
                                $ref_produit = $produit->ref_produit;
                                $verif_global = $produit_cls->verif_stat_global($ref_produit);
                                $verif_stock = $produit_cls->verif_stat_stock($ref_produit);
                                if($verif_global == 3)
                                {
                                    $c_promo = $DB->query("SELECT * FROM produits_promotion WHERE ref_produit = :ref_produit", array("ref_produit" => $ref_produit));
                                }
                            ?>
                                <?php if($categorie_cls->count_categorie($idcategorie) == 0){ ?>
                                <div class="style-msg infomsg">
                                    <div class="sb-msg"><i class="icon-info-sign"></i> Aucun Produit disponible pour cette catégorie</div>
                                </div>
                                <?php }else{ ?>
                                <div class="product clearfix">
                                    <div class="product-image">
                                        <?php if($verif_global == 2): ?>
                                            <div class="sale-flash precommande">PRECOMMANDEZ MAINTENANT!</div>
                                        <?php endif; ?>
                                        <?php if($verif_global == 3): ?>
                                            <div class="sale-flash promotion">EN PROMOTION!</div>
                                        <?php endif; ?>
                                        <?php if($verif_global == 4): ?>
                                            <div class="sale-flash nouveaute">NOUVEAUTE !</div>
                                        <?php endif; ?>
                                        <a href="index.php?view=produit&ref_produit=<?= $produit->ref_produit; ?>"><img src="<?= $constante->getUrl(array(), false, true); ?>produit/cards/<?= $produit->ref_produit; ?>.jpg" alt="<?= $produit->designation; ?>"></a>
                                        <div class="product-overlay">
                                            <a href="assets/include/ajax/shop-item.php?ref_produit=<?= $produit->ref_produit; ?>" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Voir</span></a>
                                        </div>
                                    </div>
                                    <div class="product-desc">
                                        <div class="product-title">
                                            <h3><a href="#"><?= $produit->designation; ?></a></h3>
                                            <small><strong>Tag:</strong> <?= $produit->tag_produit; ?></small>
                                        </div>
                                        <div class="product-price">
                                            <?php if($verif_global == 3){ ?>
                                                <del><?= $fonction->number_decimal($produit->prix_vente); ?></del>
                                                <ins class="text-danger"><?= $fonction->number_decimal($c_promo[0]->new_price); ?></ins>
                                                <div id="countdown-ex1" class="countdown"></div>
                                                <script type="text/javascript">
                                                    jQuery(document).ready(function($){
                                                        var newDate = new Date(<?= date('Y', $c_promo[0]->date_fin); ?>, <?= date('n', $c_promo[0]->date_fin); ?>, <?= date('d', $c_promo[0]->date_fin); ?>);
                                                        $("#countdown-ex1").countdown({until: newDate});
                                                    });
                                                </script>
                                            <?php }else{ ?>
                                                <ins><?= $fonction->number_decimal($produit->prix_vente); ?></ins>
                                            <?php } ?>
                                        </div>
                                        <p><?= html_entity_decode($produit->short_description); ?></p>

                                    </div>
                                </div>
                                <?php } ?>
                            <?php endforeach; ?>
                        </div><!-- #shop end -->

                    </div><!-- .postcontent end -->

                    <!-- Sidebar
                    ============================================= -->
                    <div class="sidebar nobottommargin">
                        <div class="sidebar-widgets-wrap">

                            <div class="widget widget_links clearfix">

                                <h4><?= $categorie[0]->designation_cat; ?></h4>
                                <ul>
                                    <?php
                                    $sql_subcat = $DB->query("SELECT * FROM subcategorie WHERE idcategorie = :idcategorie", array("idcategorie" => $idcategorie));
                                    foreach($sql_subcat as $subcat):
                                    ?>
                                    <li <?php if(isset($_GET['idsubcategorie'])){echo "style='font-weight: bold;'";} ?>><a href="index.php?view=categorie&idcategorie=<?= $idcategorie; ?>&idsubcategorie=<?= $subcat->id; ?>"><?= $subcat->designation_subcat; ?></a></li>
                                    <?php endforeach; ?>
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
        $categorie = $DB->query("SELECT * FROM categorie WHERE id = :idcategorie", array("idcategorie" => $idcategorie));
        $sub = $DB->query("SELECT * FROM subcategorie WHERE id = :idsubcategorie", array("idsubcategorie" => $idsubcategorie));
        ?>
        <!-- Page Title
		============================================= -->
        <section id="page-title">

            <div class="container clearfix">
                <img src="<?= $constante->getUrl(array(), false, true); ?>marque/<?= $categorie[0]->images_cat; ?>.png" width="240" class="img-responsive" />
                <!--<span>Start Buying your Favourite Theme</span>-->
                <ol class="breadcrumb">
                    <li><a href="#">GAMESHOP</a></li>
                    <li><a href=""><?= $categorie[0]->designation_cat; ?></a></li>
                    <li class="active"><?= $sub[0]->designation_subcat; ?></li>
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
                        <div id="shop" class="product-1 clearfix">
                            <?php
                            $sql_produit = $DB->query("SELECT * FROM produits, produits_subcategorie, subcategorie WHERE produits_subcategorie.ref_produit = produits.ref_produit
                                                        AND produits_subcategorie.idsubcategorie = subcategorie.id
                                                        AND produits_subcategorie.idsubcategorie = :idsubcategorie ORDER BY statut_global ASC", array("idsubcategorie" => $idsubcategorie));
                            foreach($sql_produit as $produit):
                                $ref_produit = $produit->ref_produit;
                                $verif_global = $produit_cls->verif_stat_global($ref_produit);
                                $verif_stock = $produit_cls->verif_stat_stock($ref_produit);
                                if($verif_global === 3)
                                {
                                    $c_promo = $DB->query("SELECT * FROM produits_promotion WHERE ref_produit = :ref_produit", array("ref_produit" => $ref_produit));
                                }

                                ?>
                                <?php if($categorie_cls->count_sub($idsubcategorie) == 0){ ?>
                                    <div class="style-msg infomsg">
                                        <div class="sb-msg"><i class="icon-info-sign"></i> Aucun Produit disponible pour cette catégorie</div>
                                    </div>
                                <?php }else{ ?>
                                <div class="product clearfix">
                                    <div class="product-image">
                                        <?php if($verif_global == 2): ?>
                                            <div class="sale-flash precommande">PRECOMMANDEZ MAINTENANT!</div>
                                        <?php endif; ?>
                                        <?php if($verif_global == 3): ?>
                                            <div class="sale-flash promotion">EN PROMOTION!</div>
                                        <?php endif; ?>
                                        <?php if($verif_global == 4): ?>
                                            <div class="sale-flash nouveaute">NOUVEAUTE !</div>
                                        <?php endif; ?>
                                        <a href="index.php?view=produit&ref_produit=<?= $produit->ref_produit; ?>"><img src="<?= $constante->getUrl(array(), false, true); ?>produit/cards/<?= $produit->ref_produit; ?>.jpg" alt="<?= $produit->designation; ?>"></a>
                                        <div class="product-overlay">
                                            <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Ajouter au Panier</span></a>
                                            <a href="assets/include/ajax/shop-item.php?ref_produit=<?= $produit->ref_produit; ?>" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Voir</span></a>
                                        </div>
                                    </div>
                                    <div class="product-desc">
                                        <div class="product-title">
                                            <h3><a href="#"><?= $produit->designation; ?></a></h3>
                                            <small><strong>Tag:</strong> <?= $produit->tag_produit; ?></small>
                                        </div>
                                        <div class="product-price">
                                            <?php if($verif_global == 3){ ?>
                                                <del><?= $fonction->number_decimal($produit->prix_vente); ?></del>
                                                <ins class="text-danger"><?= $fonction->number_decimal($c_promo[0]->new_price); ?></ins>
                                                <div id="countdown-ex1" class="countdown"></div>
                                                <script type="text/javascript">
                                                    jQuery(document).ready(function($){
                                                        var newDate = new Date(<?= date('Y', $c_promo[0]->date_fin); ?>, <?= date('n', $c_promo[0]->date_fin); ?>, <?= date('d', $c_promo[0]->date_fin); ?>);
                                                        $("#countdown-ex1").countdown({until: newDate});
                                                    });
                                                </script>
                                            <?php }else{ ?>
                                                <ins><?= $fonction->number_decimal($produit->prix_vente); ?></ins>
                                            <?php } ?>
                                        </div>
                                        <p><?= html_entity_decode($produit->short_description); ?></p>

                                    </div>
                                </div>
                                <?php } ?>
                            <?php endforeach; ?>
                        </div><!-- #shop end -->

                    </div><!-- .postcontent end -->

                    <!-- Sidebar
                    ============================================= -->
                    <div class="sidebar nobottommargin">
                        <div class="sidebar-widgets-wrap">

                            <div class="widget widget_links clearfix">

                                <h4><?= $categorie[0]->designation_cat; ?></h4>
                                <ul>
                                    <?php
                                    $sql_subcat = $DB->query("SELECT * FROM subcategorie WHERE idcategorie = :idcategorie", array("idcategorie" => $idcategorie));
                                    foreach($sql_subcat as $subcat):
                                        ?>
                                        <li <?php if(isset($_GET['idsubcategorie'])){echo "style='font-weight: bold;'";} ?>><a href="index.php?view=categorie&idcategorie=<?= $idcategorie; ?>&idsubcategorie=<?= $subcat->id; ?>"><?= $subcat->designation_subcat; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>

                            </div>


                        </div>
                    </div><!-- .sidebar end -->

                </div>

            </div>

        </section><!-- #content end -->
    <?php } ?>
<?php } ?>

