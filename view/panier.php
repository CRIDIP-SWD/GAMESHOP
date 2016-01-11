<section id="page-title" class="page-title-parallax page-title-dark" style="background-image: url('<?= $constante->getUrl(array(), false, true) ?>autre/background/empty.jpg');" data-stellar-background-ratio="0.3">

    <div class="container clearfix">
        <h1>MON PANIER</h1>
        <ol class="breadcrumb">
            <li><a href="#">GAMESHOP</a></li>
            <li class="active">Mon panier</li>
        </ol>
    </div>

</section><!-- #page-title end -->

<!-- Content
		============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <div class="table-responsive bottommargin">

                <table class="table cart">
                    <thead>
                    <tr>
                        <th class="cart-product-remove">&nbsp;</th>
                        <th class="cart-product-thumbnail">&nbsp;</th>
                        <th class="cart-product-name">Produit</th>
                        <th class="cart-product-price">Prix unitaire</th>
                        <th class="cart-product-quantity">Quantité</th>
                        <th class="cart-product-subtotal">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if($panier_cls->creationPanier()){
                        $nbArticles = count($_SESSION['panier']['refProduit']);
                        if($nbArticles <= 0){
                    ?>
                        <tr class="cart_item">
                            <td class="text-center text-info" colspan="6" style=""><i>Votre Panier est vide</i></td>
                        </tr>
                            <?php }else{ ?>
                            <?php for($i=0;$i<$nbArticles;$i++): ?>
                                <?php
                                $ref_produit = $_SESSION['panier']['refProduit'][$i];
                                $article = $DB->query("SELECT * FROM produits WHERE ref_produit = :ref_produit", array("ref_produit" => $ref_produit));
                                $subtotal = $article[0]->prix_vente * $_SESSION['panier']['qteProduit'][$i];
                                ?>
                        <tr class="cart_item">
                            <td class="cart-product-remove">
                                <a href="<?= htmlspecialchars("core/panier.php?action=suppression&l=".rawurlencode($_SESSION['panier']['refProduit'][$i])); ?>" class="remove" title="Remove this item"><i class="icon-trash2"></i></a>
                            </td>

                            <td class="cart-product-thumbnail">
                                <a href="#"><img width="64" height="64" src="<?= $constante->getUrl(array(), false, true); ?>produit/cards/<?= $article[0]->ref_produit; ?>.jpg" alt="<?= $article[0]->designation; ?>"></a>
                            </td>

                            <td class="cart-product-name">
                                <a href="#"><?= $article[0]->designation; ?></a>
                            </td>

                            <td class="cart-product-price">
                                <span class="amount"><?= number_format($article[0]->prix_vente, 2, ',', ' ')." €"; ?></span>
                            </td>

                            <td class="cart-product-quantity">
                                <div class="quantity clearfix">
                                    <input type="button" value="-" class="minus">
                                    <input type="text" name="quantity" value="<?= $_SESSION['panier']['qteProduit']; ?>" class="qty" />
                                    <input type="button" value="+" class="plus">
                                </div>
                            </td>

                            <td class="cart-product-subtotal">
                                <span class="amount"><?= number_format($subtotal, 2, ',', ' ')." €"; ?></span>
                            </td>
                        </tr>
                            <?php endfor; ?>
                            <?php }?>
                    <?php } ?>
                    </tbody>

                </table>

            </div>

            <div class="row clearfix">
                <div class="col-md-6 clearfix">
                    <a href="javascript: history.back();'" class="button button-3d button-aqua"><i class="icon-arrow-left2"></i> Retour</a>
                    <a href="core/panier.php?action=blank" class="button button-3d button-blue"><i class="icon-trashcan"></i> Vider le panier</a>
                    <a href="index.php?view=checkout" class="button button-3d button-green"><i class="icon-check"></i> Valider le Panier</a>
                </div>

                <div class="col-md-6 clearfix">
                    <div class="table-responsive">
                        <h4>Total du panier</h4>

                        <table class="table cart">
                            <tbody>
                            <tr class="cart_item">
                                <td class="cart-product-name">
                                    <strong>Sous Total</strong>
                                </td>

                                <td class="cart-product-name">
                                    <span class="amount"><?= number_format($panier_cls->MontantGlobal(), 2, ',', ' ')." €"; ?></span>
                                </td>
                            </tr>
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>

        </div>

    </div>

</section><!-- #content end -->