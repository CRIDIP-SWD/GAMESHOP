<?php
include "../../../app/classe.php";
$ref_produit = $_GET['ref_produit'];
$sql_produit = mysql_query("SELECT * FROM produits, produits_categorie, categorie, produits_caracteristique WHERE produits_categorie.ref_produit = produits.ref_produit
                            AND produits_categorie.idcategorie = categorie.id
                            AND produits_caracteristique.ref_produit = produits.ref_produit
                            AND produits.ref_produit = '$ref_produit'")or die(mysql_error());
$produit = mysql_fetch_array($sql_produit);
?>
                <div class="single-product shop-quick-view-ajax clearfix">

                    <div class="ajax-modal-title">
                        <h2><?= $produit['designation']; ?></h2>
                        <span class="game-font">
                            <img src="<?= $constante->getUrl(array(), false, true); ?>marque/icon-<?= $produit['images_cat']; ?>.png" />
                        </span>
                    </div>

                    <div class="product modal-padding clearfix">

                        <div class="col_half nobottommargin">
                            <div class="product-image">
                                <a href="#"><img src="<?= $constante->getUrl(array(), false, true); ?>produit/cards/<?= $produit['ref_produit']; ?>.jpg" class="img-responsive" height="360" alt="Checked Short Dress"></a>
                                <!--<div class="sale-flash">Sale!</div>-->
                            </div>
                        </div>
                        <div class="col_half nobottommargin col_last product-desc">
                            <div class="product-price"><ins><?= number_format($produit['prix_vente'], 2, ',', ' ')." €"; ?></ins></div>
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
                                <button type="submit" class="add-to-cart button nomargin">Ajouter au Panier</button>
                            </form><!-- Product Single - Quantity & Cart Button End -->
                            <button type="button" class="button button-3d button-desc button-yellow" onclick="window.location.href='index.php?view=produit&ref_produit=<?= $produit['ref_produit']; ?>'">
                                Voir la fiche complete
                                <span>TEST</span>
                            </button>

                            <div class="clear"></div>
                            <div class="line"></div>
                            <p><?= html_entity_decode($produit['short_description']); ?></p>
                            <!--<ul class="iconlist">
                                <li><i class="icon-caret-right"></i> Dynamic Color Options</li>
                                <li><i class="icon-caret-right"></i> Lots of Size Options</li>
                                <li><i class="icon-caret-right"></i> 30-Day Return Policy</li>
                            </ul>
                            <div class="panel panel-default product-meta nobottommargin">
                                <div class="panel-body">
                                    <span itemprop="productID" class="sku_wrapper">SKU: <span class="sku">8465415</span></span>
                                    <span class="posted_in">Category: <a href="http://localhost/offbeat/wp/product-category/shoes/" rel="tag">Shoes</a>.</span>
                                    <span class="tagged_as">Tags: <a href="http://dante.swiftideas.net/product-tag/barena/" rel="tag">Barena</a>, <a href="http://dante.swiftideas.net/product-tag/blazers/" rel="tag">Blazers</a>, <a href="http://dante.swiftideas.net/product-tag/tailoring/" rel="tag">Tailoring</a>, <a href="http://dante.swiftideas.net/product-tag/unconstructed/" rel="tag">Unconstructed</a>.</span>
                                </div>
                            </div>-->
                        </div>

                    </div>

                </div>