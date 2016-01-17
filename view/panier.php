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
                                $qte = $_SESSION['panier']['qteProduit'][$i];
                                ?>
                        <tr class="cart_item">
                            <td class="cart-product-remove">
                                <a href="core/panier.php?action=suppression&l=<?= $ref_produit; ?>" class="remove" title="Supprimer l'article"><i class="icon-trash2"></i></a>
                            </td>

                            <td class="cart-product-thumbnail">
                                <a href="#"><img width="64" height="64" src="<?= $constante->getUrl(array(), false, true); ?>produit/cards/<?= $article[0]->ref_produit; ?>.jpg" alt="<?= $article[0]->designation; ?>"></a>
                            </td>

                            <td class="cart-product-name">
                                <a href="#"><?= $article[0]->designation; ?></a><br>
                                <?php
                                if($article[0]->statut_global == 2)
                                {
                                    echo "Article en Précommande, Livraison prévue le <strong>".date("d/m/Y", $article[0]->date_sortie)."</strong>.";
                                }else{
                                    if($article[0]->statut_stock == 0)
                                    {
                                        echo "<div class='text-danger'>Rupture de Stock, Réassort Inconnue</div>";
                                    }elseif($article[0]->statut_stock == 1)
                                    {
                                        echo "Réassort demander, date prévue de réassort le <strong>".date("d/m/Y", $article[0]->date_reassort)."</strong>.";
                                    }
                                }
                                ?>
                            </td>

                            <td class="cart-product-price">
                                <span class="amount"><?= number_format($article[0]->prix_vente, 2, ',', ' ')." €"; ?></span>
                            </td>

                            <td class="cart-product-quantity">
                                <div class="quantity clearfix">
                                    <input type="text" name="q[]" value="<?= $qte; ?>" class="qty" />
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
                <p>Attention: Certains articles sont soit en rupture ou la date de précommande est actuellement effective, votre ou vos articles vous seront livrer en différer.</p>
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