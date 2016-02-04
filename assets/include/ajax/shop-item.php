<?php
include "../../../app/classe.php";
$ref_produit = $_GET['ref_produit'];
$produit = $DB->query("SELECT * FROM produits, produits_categorie, categorie, produits_caracteristique WHERE produits_categorie.ref_produit = produits.ref_produit
                            AND produits_categorie.idcategorie = categorie.id
                            AND produits_caracteristique.ref_produit = produits.ref_produit
                            AND produits.ref_produit = :ref_produit", array("ref_produit" => $ref_produit));

if($produit[0]->statut_global == 3){
    $promo = $DB->query("SELECT * FROM produits_promotion WHERE ref_produit = :ref_produit", array("ref_produit" => $ref_produit));
}
?>
                <div class="single-product shop-quick-view-ajax clearfix">

                    <div class="ajax-modal-title">
                        <h2><?= $produit[0]->designation; ?></h2>
                        <span class="game-font">
                            <img src="<?= $constante->getUrl(array(), false, true); ?>marque/icon-<?= $produit[0]->images_cat; ?>.png" />
                        </span>
                    </div>

                    <div class="product modal-padding clearfix">

                        <div class="col_half nobottommargin">
                            <div class="product-image">
                                <a href="index.php?view=produit&ref_produit=<?= $produit[0]->ref_produit; ?>"><img src="<?= $constante->getUrl(array(), false, true); ?>produit/cards/<?= $produit[0]->ref_produit; ?>.jpg" class="img-responsive" height="360" alt="Checked Short Dress"></a>
                                <!--<div class="sale-flash">Sale!</div>-->
                            </div>
                        </div>
                        <div class="col_half nobottommargin col_last product-desc">
                            <div class="product-price">
                                <?php if($produit[0]->statut_global == 3): ?>
                                    <del><?= $fonction->number_decimal($produit[0]->prix_vente); ?></del>
                                    <ins><?= $fonction->number_decimal($promo[0]->new_price); ?></ins>
                                <?php else: ?>
                                    <ins><?= $fonction->number_decimal($produit[0]->prix_vente); ?></ins>
                                <?php endif; ?>

                            </div>
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
                                <a class="add-to-cart button nomargin" href="core/panier.php?action=ajout&l=<?= $produit[0]->ref_produit; ?>&q=1&p=<?= $produit[0]->prix_vente; ?>">Ajouter au Panier</a>
                                <?php if($produit[0]->statut_global == 3): ?>
                                    <a class="add-to-cart button nomargin" href="core/panier.php?action=ajout&l=<?= $produit[0]->ref_produit; ?>&q=1&p=<?= $promo[0]->new_price; ?>">Ajouter au Panier</a>
                                <?php else: ?>
                                    <a class="add-to-cart button nomargin" href="core/panier.php?action=ajout&l=<?= $produit[0]->ref_produit; ?>&q=1&p=<?= $produit[0]->prix_vente; ?>">Ajouter au Panier</a>
                                <?php endif; ?>
                            </form><!-- Product Single - Quantity & Cart Button End -->
                            <button type="button" class="button button-3d button-desc button-yellow" onclick="window.location.href='index.php?view=produit&ref_produit=<?= $produit[0]->ref_produit; ?>'">
                                Voir la fiche complete
                            </button>

                            <div class="clear"></div>
                            <div class="line"></div>
                            <p><?= html_entity_decode($produit[0]->short_description); ?></p>
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