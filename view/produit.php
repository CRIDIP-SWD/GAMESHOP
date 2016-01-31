<?php
$ref_produit = $_GET['ref_produit'];
$produit = $DB->query("SELECT * FROM produits, produits_categorie, categorie WHERE produits_categorie.idcategorie = categorie.id AND produits_categorie.ref_produit = produits.ref_produit AND produits.ref_produit = '$ref_produit'");
$caract = $DB->query("SELECt * FROM produits_caracteristique WHERE ref_produit = '$ref_produit'");
$verif_global = $produit_cls->verif_stat_global($ref_produit);
$verif_stock = $produit_cls->verif_stat_stock($ref_produit);
if($verif_global === 3)
{
    $c_promo = $DB->query("SELECT * FROM produits_promotion WHERE ref_produit = :ref_produit", array("ref_produit" => $ref_produit));
}
?>
<!-- Page Title
		============================================= -->
<section id="page-title" <?php if(!empty($produit[0]->banner)){echo "style='background-image: url(".$constante->getUrl(array(), false, true)."produit/banner/banner_".$produit[0]->banner.".jpg); background-position: 0 -200px;;'";} ?>>

    <div class="container clearfix">
        <h1 <?php if(!empty($produit[0]->banner)){echo "style='color: white;'";} ?>><?= $produit[0]->designation; ?></h1>
        <ol class="breadcrumb">
            <li <?php if(!empty($produit[0]->banner)){echo "style='color: white; font-size: 30px; font-weight: bolder;'";} ?> style="font-size: 30px; font-weight: bolder;"><?= $produit[0]->designation_cat; ?></li>
        </ol>
    </div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix bottommargin-lg">

            <div class="single-product">

                <div class="product">

                    <div class="col_two_fifth">

                        <!-- Product Single - Gallery
                        ============================================= -->
                        <div class="product-image">
                            <img src="<?= $constante->getUrl(array(), false,true); ?>produit/cards/<?= $produit[0]->ref_produit; ?>.jpg" />
                            <?php if($verif_global === 2): ?>
                                <div class="sale-flash precommande">PRECOMMANDEZ MAINTENANT!</div>
                            <?php endif; ?>
                            <?php if($verif_global === 3): ?>
                                <div class="sale-flash promotion">EN PROMOTION!</div>
                            <?php endif; ?>
                            <?php if($verif_global === 4): ?>
                                <div class="sale-flash nouveaute">NOUVEAUTE !</div>
                            <?php endif; ?>


                        </div><!-- Product Single - Gallery End -->

                    </div>

                    <div class="col_two_fifth product-desc">

                        <!-- Product Single - Price
                        ============================================= -->
                        <div class="product-price">
                            <?php if($verif_global === 3){ ?>
                                <del><?= number_format($produit[0]->prix_vente, 2, ',', ' ')." €" ?></del>
                                <ins><?= number_format($c_promo[0]->new_price, 2, ',', ' ')." €" ?></ins>
                            <?php }else{ ?>
                                <ins><?= number_format($produit[0]->prix_vente, 2, ',', ' ')." €" ?></ins>
                            <?php } ?>
                        </div><!-- Product Single - Price End -->

                        <div class="clear"></div>
                        <div class="line"></div>

                        <!-- Product Single - Quantity & Cart Button
                        ============================================= -->
                        <form class="cart nobottommargin clearfix" method="post" enctype='multipart/form-data'>
                            <?php if($verif_global === 2){ ?>
                                <a class="add-to-cart button nomargin" href="core/panier.php?action=ajout&l=<?= $produit[0]->ref_produit; ?>&q=1&p=<?= $produit[0]->prix_vente; ?>">PRECOMMANDER</a>
                            <?php }elseif($verif_global === 3){ ?>
                                <a class="add-to-cart button nomargin" href="core/panier.php?action=ajout&l=<?= $produit[0]->ref_produit; ?>&q=1&p=<?= $c_promo[0]->new_price; ?>">Ajouter au Panier</a>
                            <?php }else{ ?>
                                <a class="add-to-cart button nomargin" href="core/panier.php?action=ajout&l=<?= $produit[0]->ref_produit; ?>&q=1&p=<?= $produit[0]->prix_vente; ?>">Ajouter au Panier</a>
                            <?php } ?>
                        </form><!-- Product Single - Quantity & Cart Button End -->

                        <div class="clear"></div>
                        <div class="line"></div>

                        <!-- Product Single - Short Description
                        ============================================= -->
                        <?= html_entity_decode($produit[0]->short_description); ?>

                        <!-- Product Single - Short Description End -->
                        <div class="clear"></div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default product-meta">
                                    <div class="panel-body">
                                        <table style="width: 50%;">
                                            <tbody>
                                            <?php if(!empty($caract[0]->editeur)){ ?>
                                                <tr>
                                                    <td style="width: 50%; font-weight: bold;">EDITEUR:</td>
                                                    <td style="width: 50%; font-style: italic;"><?= $caract[0]->editeur; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if(!empty($caract[0]->genre)){ ?>
                                                <tr>
                                                    <td style="width: 50%; font-weight: bold;">GENRE:</td>
                                                    <td style="width: 50%; font-style: italic;"><?= $caract[0]->genre; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if(!empty($caract[0]->multijoueur)){ ?>
                                                <tr>
                                                    <td style="width: 50%; font-weight: bold;">MULTI JOUEUR:</td>
                                                    <td style="width: 50%; font-style: italic;"><?php if($caract[0]->multijoueur == 0){echo "Non";}else{echo "Oui";} ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if(!empty($caract[0]->internet)){ ?>
                                                <tr>
                                                    <td style="width: 50%; font-weight: bold;">INTERNET:</td>
                                                    <td style="width: 50%; font-style: italic;"><?php if($caract[0]->internet == 0){echo "Non";}else{echo "Oui";} ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if(!empty($caract[0]->option)){ ?>
                                                <tr>
                                                    <td style="width: 50%; font-weight: bold;">OPTION:</td>
                                                    <td style="width: 50%; font-style: italic;"><?= $caract[0]->option; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if(!empty($caract[0]->couleur)){ ?>
                                                <tr>
                                                    <td style="width: 50%; font-weight: bold;">COULEUR:</td>
                                                    <td style="width: 50%; font-style: italic;"><?= $caract[0]->couleur; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if(!empty($caract[0]->cap_hdd)){ ?>
                                                <tr>
                                                    <td style="width: 50%; font-weight: bold;">DISQUE DUR:</td>
                                                    <td style="width: 50%; font-style: italic;"><?= $caract[0]->cap_hdd; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if(!empty($caract[0]->eth)){ ?>
                                                <tr>
                                                    <td style="width: 50%; font-weight: bold;">ETHERNET:</td>
                                                    <td style="width: 50%; font-style: italic;"><?php if($caract[0]->eth == 0){echo "Non";}else{echo "Oui";} ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if(!empty($caract[0]->wifi)){ ?>
                                                <tr>
                                                    <td style="width: 50%; font-weight: bold;">WI-FI:</td>
                                                    <td style="width: 50%; font-style: italic;"><?php if($caract[0]->wifi == 0){echo "Non";}else{echo "Oui";} ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if(!empty($caract[0]->nb_usb)){ ?>
                                                <tr>
                                                    <td style="width: 50%; font-weight: bold;">PORT USB:</td>
                                                    <td style="width: 50%; font-style: italic;"><?= $caract[0]->nb_usb; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if(!empty($caract[0]->compatibilite)){ ?>
                                                <tr>
                                                    <td style="width: 50%; font-weight: bold;">COMPATIBLE:</td>
                                                    <td style="width: 50%; font-style: italic;"><?= $caract[0]->compatibilite; ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="panel panel-default product-meta">
                                    <div class="panel-body">
                                        <?php if($verif_stock === 0): ?>
                                            <span class="text-center">
                                                <i class="icon-remove-circle text-danger icon-3x"></i><br>
                                                <h2 class="text-danger" style="font-weight: bold;">RUPTURE DE STOCK</h2>
                                            </span>
                                        <?php endif; ?>
                                        <?php if($verif_stock === 1): ?>
                                            <span class="text-center">
                                                <i class="icon-download-alt text-warning icon-3x"></i><br>
                                                <h2 class="text-warning" style="font-weight: bold;">R&Eacute;ASSORT EN COURS...</h2>
                                                <h3 class="text-warning"><?= date("d/m/Y", $produit[0]->date_reassort);?></h3>
                                            </span>
                                        <?php endif; ?>
                                        <?php if($verif_stock === 2): ?>
                                            <span class="text-center">
                                                <i class="icon-check text-success icon-3x"></i><br>
                                                <h2 class="text-success" style="font-weight: bold;">EN STOCK</h2>
                                                <h3 class="text-success counter center"><span data-from="100" data-to="<?= $produit[0]->stock; ?>" data-refresh-interval="100" data-speed="3000"></span></h3>
                                            </span>
                                        <?php endif; ?>
                                        <?php if($verif_stock === 3): ?>
                                            <span class="text-center">
                                                <i class="icon-circle-arrow-right text-info icon-3x"></i><br>
                                                <h2 class="text-info" style="font-weight: bold;">PRECOMMANDE</h2>
                                                <h3 class="text-info"><?= date("d/m/Y", $produit[0]->date_sortie); ?></h3>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                        <div class="clear"></div>
                        <div class="col_full nobottommargin">

                            <h4>EN BONUS</h4>

                            <div id="oc-product" class="owl-carousel product-carousel">
                                <?php
                                $sql_bonus = $DB->query("SELECT * FROM produits_bonus WHERE ref_produit = :ref_produit", array(
                                    "ref_produit" => $ref_produit
                                ));
                                foreach($sql_bonus as $bonus):
                                ?>
                                <div class="oc-item">
                                    <div class="product iproduct clearfix">
                                        <div class="product-image">
                                            <a href="#"><img src="<?= $constante->getUrl(array(), false, true); ?>produit/bonus/<?= $bonus->images_bonus; ?>.jpg" alt="Checked Short Dress"></a>
                                        </div>
                                        <div class="product-desc center">
                                            <div class="product-title"><h3><a href="#"><?= $bonus->designation_bonus; ?></a></h3></div>
                                            <div class="product-price">
                                                <ins>OFFERT !!!</ins>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
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
                                <?php if(!empty($produit[0]->long_description)): ?>
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
                                <?php if(!empty($produit[0]->long_description)): ?>
                                <div class="tab-content clearfix" id="desc">
                                    <?= html_entity_decode($produit[0]->long_description); ?>
                                </div>
                                <?php endif; ?>
                                <?php if($produit_cls->count_images($ref_produit) != 0): ?>
                                <div class="tab-content clearfix" id="images">
                                    <h1>IMAGES</h1>

                                    <div id="related-portfolio" class="owl-carousel owl-carousel-full portfolio-carousel portfolio-notitle portfolio-nomargin footer-stick">
                                        <?php
                                        $sql_images = $DB->query("SELECT * FROM produits_images WHERE ref_produit = '$ref_produit'");
                                        foreach($sql_images as $images):
                                        ?>


                                                <div class="oc-item">
                                                    <div class="iportfolio">
                                                        <div class="portfolio-image">
                                                            <a href="portfolio-single.html">
                                                                <img src="<?= $constante->getUrl(array(), false, true); ?>produit/gallery/<?= $ref_produit; ?>/<?= $images->images; ?>.jpg" class="img-responsive" width="400" alt="Open Imagination">
                                                            </a>
                                                            <div class="portfolio-overlay">
                                                                <a href="<?= $constante->getUrl(array(), false, true); ?>produit/gallery/<?= $ref_produit; ?>/<?= $images->images; ?>.jpg" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <!-- .portfolio-carousel end -->

                                        <?php endforeach; ?>
                                        <script type="text/javascript">

                                            jQuery(document).ready(function($) {

                                                var relatedPortfolio = $("#related-portfolio");

                                                relatedPortfolio.owlCarousel({
                                                    margin: 0,
                                                    nav: true,
                                                    navText: ['<i class="icon-angle-left"></i>','<i class="icon-angle-right"></i>'],
                                                    autoplay: false,
                                                    autoplayHoverPause: true,
                                                    dots: false,
                                                    responsive:{
                                                        0:{ items:1 },
                                                        600:{ items:2 },
                                                        1000:{ items:3 },
                                                        1200:{ items:4 },
                                                        1400:{ items:5 }
                                                    }
                                                });

                                            });

                                        </script>
                                    </div>

                                </div>
                                <?php endif; ?>
                                <?php if($produit_cls->count_videos($ref_produit) != 0): ?>
                                <div class="tab-content clearfix" id="videos">
                                    <div class="flowplayer is-splash">
                                        <video>
                                            <source type="video/mp4" src="http://video2.cedemo.com/vdo/a656799d87f7a264789a21674f05ef40/56ae9c8d/51586/51586_1500.mp4">
                                        </video>
                                        <a class="fp-prev">prev</a>
                                        <a class="fp-next">next</a>
                                        <div class="fp-playlist">
                                            <!-- playlist entries or "trigger" elements -->
                                            <a href="http://video2.cedemo.com/vdo/a656799d87f7a264789a21674f05ef40/56ae9c8d/51586/51586_1500.mp4"></a>
                                            <a href="http://video2.cedemo.com/vdo/b237190d1b9fe951984fa5c8858180a2/56ae9d6a/51313/51313_1500.mp4"></a>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="clear"></div>

        </div>

    </div>

</section><!-- #content end -->
