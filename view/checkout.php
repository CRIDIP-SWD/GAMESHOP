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
        TEST
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
                            <form class="nobottommargin" action="<?= $constante->getUrl(array('core/'), false, false); ?>login.php" method="post">
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
