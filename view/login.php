<?php
if(isset($_SESSION['logged']) && $_SESSION['logged'] == true)
{
    header("Location: index.php?view=profil");
}
?>

<?php if(!isset($_GET['sub'])){ ?>
    <!-- Page Title
            ============================================= -->
    <section id="page-title" style="background-image: url('<?= $constante->getUrl(array(), false, true) ?>autre/background/empty.jpg');">

        <div class="container clearfix">
            <h1>MON COMPTE</h1>
            <ol class="breadcrumb">
                <li><a href="#">GAMESHOP</a></li>
                <li><a href="#">MON COMPTE</a></li>
                <li class="active">Connexion</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
    ============================================= -->
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

    </section><!-- #content end -->
<?php } ?>
<?php if(isset($_GET['sub']) && $_GET['sub'] == 'reset-password'): ?>
    <!-- Page Title
		============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>REINITIALISATION DU MOT DE PASSE</h1>
            <ol class="breadcrumb">
                <li><a href="#">GAMESHOP</a></li>
                <li><a href="#">MON COMPTE</a></li>
                <li class="active">Réinitialisation du mot de passe</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="accordion accordion-lg divcenter nobottommargin clearfix" style="max-width: 550px;">

                    <div class="acctitle"><i class="acc-closed icon-lock3"></i><i class="acc-open icon-unlock"></i>Etape 1/2</div>
                    <div class="acc_content clearfix">
                        <form class="nobottommargin" action="<?= $constante->getUrl(array('core/'), false, false); ?>login.php" method="post">
                            <div class="col_full">
                                <label for="login-form-username">Adresse Mail:</label>
                                <input type="text" id="login-form-username" name="email" class="form-control" />
                            </div>

                            <div class="col_full nobottommargin">
                                <button class="button button-3d button-black nomargin" type="submit" name="action" value="reset-password-1">Réinitialisation</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>

    </section><!-- #content end -->
<?php endif; ?>

<?php if(isset($_GET['success']) && $_GET['success'] == 'reset-password-1'){ ?>
    <script type="text/javascript">
        toastr.success('En attente de la validation par adresse mail !','Succès')
    </script>
<?php } ?>
<?php if(isset($_GET['success']) && $_GET['success'] == 'reset-password-2'){ ?>
    <script type="text/javascript">
        toastr.success('Le mot de passe à été réinitialiser.<br>Veuillez utiliser le mot de passe inscrit dans votre boite mail.','Succès')
    </script>
<?php } ?>
 

<?php if(isset($_GET['error']) && $_GET['error'] == 'no-compte'){ ?>
    <script type="text/javascript">
        toastr.error("L'adresse mail ou le mot de passe est/sont incorrect !",'ERREUR')
    </script>
<?php } ?>
<?php if(isset($_GET['error']) && $_GET['error'] == 'bdd'){ ?>
    <script type="text/javascript">
        toastr.error('Erreur BDD SYS: Plusieurs utilisateur ont la même adresse mail, impossible de se connecter, <a href="mailto: webmaster@gameshop.com">contacter l\'administrateur du site</a>.','ERREUR')
    </script>
<?php } ?>
<?php if(isset($_GET['error']) && $_GET['error'] == 'correspondance'){ ?>
    <script type="text/javascript">
        toastr.error("Aucune correspondance avec l'adresse mail entrer dans la base de donnée",'ERREUR')
    </script>
<?php } ?>
<?php if(isset($_GET['error']) && $_GET['error'] == 'reset-password-1'){ ?>
    <script type="text/javascript">
        toastr.error("Erreur lors de l'envoie du mail de vérification !",'ERREUR')
    </script>
<?php } ?>
<?php if(isset($_GET['error']) && $_GET['error'] == 'reset-password-2'){ ?>
    <script type="text/javascript">
        toastr.error('Erreur lors de la réinitialisation du mot de passe, <a href="mailto: webmaster@gameshop.com">contacter l\'administrateur du site</a>.','ERREUR')
    </script>
<?php } ?>
<?php if(isset($_GET['error']) && $_GET['error'] == 'ip-correspondance'){ ?>
    <script type="text/javascript">
        toastr.error("L'adresse Ip à partir de la clé TOKEN est erronée, veuillez recommencer la procédure.",'ERREUR')
    </script>
<?php } ?>



<?php if(isset($_GET['warning']) && $_GET['warning'] == 'champs'){ ?>
<script type="text/javascript">
    toastr.warning('Un ou plusieurs champs sont vide', 'ATTENTION');
</script>
<?php } ?>
<?php if(isset($_GET['warning']) && $_GET['warning'] == 'no-connect'){ ?>
    <script type="text/javascript">
        toastr.warning('Accès interdit en visiteur, veuillez vous connectez ou vous inscrire.','ATTENTION')
    </script>
<?php } ?>
<?php if(isset($_GET['warning']) && $_GET['warning'] == 'timeout'){ ?>
    <script type="text/javascript">
        toastr.warning("Le temps de réinitialisation du mot de passe est dépasser, veuillez recommencer la procédure.",'ATTENTION')
    </script>
<?php } ?>
