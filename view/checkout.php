<?php if(!isset($_GET['sub'])): ?>
    <?php if(!isset($_SESSION['panier'])){ ?>
        <div class="modal-on-load" data-target="#myModal1"></div>
        <div class="modal1 mfp-hide" id="myModal1">
            <div class="block divcenter" style="background-color: #FFF; max-width: 500px;">
                <div class="center" style="padding: 50px;">
                    <h3><i class="icon-line2-basket icon-3x text-danger text-center animated" data-animation="swing"></i><br>Aucun article dans le Panier</h3>
                    <p class="nobottommargin">Veuillez inscrire des articles dans le panier avant de passer à la commande.</p>
                </div>
                <div class="section center nomargin" style="padding: 30px;">
                    <a href="#" class="button" onClick="history.back()">Retour au panier</a>
                </div>
            </div>
        </div>
    <?php }else{ ?>
        <?php if(isset($_SESSION['logged'])): ?>
            <section id="page-title" class="page-title-parallax page-title-dark" style="background-image: url('<?= $constante->getUrl(array(), false, true) ?>autre/background/empty.jpg');">

                <div class="container clearfix">
                    <h1>COMMANDE</h1>
                    <ol class="breadcrumb">
                        <li><a href="#">GAMESHOP</a></li>
                        <li><a href="#">COMMANDE</a></li>
                        <li class="active">Panier</li>
                    </ol>
                </div>
            </section>


            <section id="content">
                <div class="content-wrap">
                    <ul class="process-steps process-5 bottommargin clearfix">
                        <li  class="active">
                            <a class="i-circled i-alt divcenter bgcolor" href="#">1</a>
                            <h5>Mon Panier</h5>
                        </li>
                        <li>
                            <a class="i-circled i-alt divcenter" href="#">2</a>
                            <h5>Adresse</h5>
                        </li>
                        <li>
                            <a class="i-circled i-alt divcenter" href="#">3</a>
                            <h5>Livraison</h5>
                        </li>
                        <li>
                            <a class="i-circled i-alt divcenter" href="#">4</a>
                            <h5>Paiement</h5>
                        </li>
                        <li>
                            <a class="i-circled i-alt divcenter" href="#">5</a>
                            <h5>Récapitulatif de la commande</h5>
                        </li>
                    </ul>
                    <div id="show-error"></div>
                    <div class="container clearfix bottommargin">
                        <div class="table-responsive bottommargin">

                            <table class="table cart">
                                <thead>
                                <tr>
                                    <th class="cart-product-remove">&nbsp;</th>
                                    <th class="cart-product-thumbnail">&nbsp;</th>
                                    <th class="cart-product-name">Produit</th>
                                    <th class="cart-product-price">Prix Unitaire</th>
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
                                                        <input type="text" name="q" value="<?= $qte; ?>" class="qty" />
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
                        <button type="button" class="button button-green button-3d pull-right" onclick="window.location.href='core/checkout.php?action=adresse'">Suivant <i class="icon-arrow-right"></i></button>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php if(!isset($_SESSION['logged'])): ?>
            <section id="page-title" class="page-title-parallax page-title-dark" style="background-image: url('<?= $constante->getUrl(array(), false, true) ?>autre/background/empty.jpg');">

                <div class="container clearfix">
                    <h1>MON COMPTE</h1>
                    <ol class="breadcrumb">
                        <li><a href="#">GAMESHOP</a></li>
                        <li><a href="#">MON COMPTE</a></li>
                        <li class="active">Connexion</li>
                    </ol>
                </div>

            </section>

            <section id="content">

                <div class="content-wrap">

                    <div class="container clearfix">

                        <div class="accordion accordion-lg divcenter nobottommargin clearfix" style="max-width: 550px;">

                            <div class="acctitle"><i class="acc-closed icon-lock3"></i><i class="acc-open icon-unlock"></i>Connexion à votre compte</div>
                            <div class="acc_content clearfix">
                                <form class="nobottommargin" action="<?= $constante->getUrl(array('core/'), false, false); ?>checkout.php" method="post">
                                    <div class="col_full">
                                        <label for="login-form-username">Adresse Mail:</label>
                                        <input type="text" id="login-form-username" name="email" class="form-control" />
                                    </div>

                                    <div class="col_full">
                                        <label for="login-form-password">Mot de Passe:</label>
                                        <input type="password" id="login-form-password" name="password" class="form-control" />
                                    </div>

                                    <div class="col_full nobottommargin">
                                        <button class="button button-3d button-black nomargin" type="submit" name="action" value="login">Connexion</button>
                                        <a href="index.php?view=login&sub=reset-password" class="fright">Mot de passe Perdu ?</a>
                                    </div>
                                </form>
                            </div>

                            <div class="acctitle"><i class="acc-closed icon-user4"></i><i class="acc-open icon-ok-sign"></i>Inscrivez-vous !</div>
                            <div class="acc_content clearfix">
                                <form id="register-form" name="register-form" class="nobottommargin" action="<?= $constante->getUrl(array('core/'), false, false); ?>account.php" method="post">
                                    <div class="col_full">
                                        <label for="register-form-name">Nom:</label>
                                        <input type="text" id="register-form-name" name="nom_client" value="" class="form-control" />
                                    </div>

                                    <div class="col_full">
                                        <label for="register-form-name">Prénom:</label>
                                        <input type="text" id="register-form-name" name="prenom_client" value="" class="form-control" />
                                    </div>

                                    <div class="col_full">
                                        <label for="register-form-email">Adresse E-mail:</label>
                                        <input type="text" id="register-form-email" name="email" value="" class="form-control" />
                                    </div>


                                    <div class="col_full">
                                        <label for="register-form-password">Mot de Passe:</label>
                                        <input type="password" id="register-form-password" name="password" value="" class="form-control" />
                                    </div>

                                    <div class="col_full">
                                        <label for="register-form-repassword">Confirmation du mot de Passe:</label>
                                        <input type="password" id="register-form-repassword" name="confirm-pass" value="" class="form-control" />
                                    </div>

                                    <div class="col_full nobottommargin">
                                        <button class="button button-3d button-black nomargin" id="register-form-submit" name="action" value="add-account">Enregistrez-vous !</button>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>

                </div>

            </section>
        <?php endif; ?>
    <?php } ?>
<?php endif; ?>
<?php if(isset($_GET['sub']) && $_GET['sub'] == 'adresse'): ?>
    <section id="page-title" class="page-title-parallax page-title-dark" style="background-image: url('<?= $constante->getUrl(array(), false, true) ?>autre/background/empty.jpg');">

        <div class="container clearfix">
            <h1>COMMANDE</h1>
            <ol class="breadcrumb">
                <li><a href="#">GAMESHOP</a></li>
                <li><a href="#">COMMANDE</a></li>
                <li class="active">Choix de L'adresse</li>
            </ol>
        </div>
    </section>


    <section id="content">
        <div class="content-wrap">
            <ul class="process-steps process-5 bottommargin clearfix">
                <li>
                    <a class="i-circled i-alt divcenter" href="#">1</a>
                    <h5>Mon Panier</h5>
                </li>
                <li class="active">
                    <a class="i-circled i-alt divcenter bgcolor" href="#">2</a>
                    <h5>Adresse</h5>
                </li>
                <li>
                    <a class="i-circled i-alt divcenter" href="#">3</a>
                    <h5>Livraison</h5>
                </li>
                <li>
                    <a class="i-circled i-alt divcenter" href="#">4</a>
                    <h5>Paiement</h5>
                </li>
                <li>
                    <a class="i-circled i-alt divcenter" href="#">5</a>
                    <h5>Récapitulatif de la commande</h5>
                </li>
            </ul>
            <div id="show-error"></div>
            <div class="container clearfix bottommargin">
                <form class="form-horizontal" action="core/checkout.php" method="post">
                    <!--<div class="radio-gameshop well">
                        <div class="col-md-11">
                            <label for="adresse" class="radio-gameshop">
                                <strong>MON ADRESSE DE LIVRAISON</strong><br>
                                M. MOCKELYN Maxime<br>
                                20 Avenue Jean Jaures<br>
                                Résidence "Les IRIS"<br>
                                85100 Les Sables d'Olonne
                            </label>
                        </div>
                        <div class="col-md-1">
                            <input id="adresse" class="radio-gameshop" type="radio" name="adresse" value="idadresse"/>
                            <span class="round"></span>
                        </div>
                    </div>-->
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            $sql_adresse = $DB->query("SELECT * FROM client_adresse_liv WHERE idclient = :idclient", array(
                                "idclient" => $idclient
                            ));
                            foreach($sql_adresse as $adresse):
                            ?>
                            <div class="well">
                                <div class="radio-gameshop">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <label for="adresse" class="radio-gameshop">
                                                <strong><?= $adresse->alias; ?></strong><br>
                                                <?php if(!empty($adresse->societe)){echo $adresse->societe."<br>";} ?>
                                                <?= $adresse->nom; ?> <?= $adresse->prenom; ?><br>
                                                <?= html_entity_decode($adresse->adresse); ?><br>
                                                <?= $adresse->code_postal; ?> <?= html_entity_decode($adresse->ville); ?><br>
                                                FRANCE<br>
                                                Tel: <?= $adresse->telephone; ?>
                                            </label>
                                        </div>
                                        <div class="col-md-1">
                                            <input id="adresse" class="radio-gameshop" type="radio" name="adresse" value="<?= $adresse->idadresse; ?>" <?php if($adresse->default == 1){echo "checked";} ?>/>
                                            <span class="round"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if(isset($_GET['error']) && $_GET['error'] == 'critical'): ?>
    <script type="text/javascript">
        $("#show-error").html("" +
            "<div class='style-msg errormsg'>" +
            "   <div class='sb-msg'>" +
            "       <i class='icon-remove'></i>" +
            "       <strong>ERREUR</strong>" +
            "       <?= $_GET['data']; ?>"+
            "   </div>" +
            "</div>").fadeIn("slow");
    </script>
<?php endif; ?>
