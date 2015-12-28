<?php
if(isset($_SESSION['logged']) && $_SESSION['logged'] == true)
{
    header("Location: index.php?view=profil");
}
?>
<!-- Page Title
		============================================= -->
<section id="page-title">

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
                            <label for="login-form-password">Password:</label>
                            <input type="password" id="login-form-password" name="password" class="form-control" />
                        </div>

                        <div class="col_full nobottommargin">
                            <button class="button button-3d button-black nomargin" type="submit" name="action" value="login">Connexion</button>
                            <a href="#" class="fright">Mot de passe Perdu ?</a>
                        </div>
                    </form>
                </div>

                <div class="acctitle"><i class="acc-closed icon-user4"></i><i class="acc-open icon-ok-sign"></i>New Signup? Register for an Account</div>
                <div class="acc_content clearfix">
                    <form id="register-form" name="register-form" class="nobottommargin" action="#" method="post">
                        <div class="col_full">
                            <label for="register-form-name">Name:</label>
                            <input type="text" id="register-form-name" name="register-form-name" value="" class="form-control" />
                        </div>

                        <div class="col_full">
                            <label for="register-form-email">Email Address:</label>
                            <input type="text" id="register-form-email" name="register-form-email" value="" class="form-control" />
                        </div>

                        <div class="col_full">
                            <label for="register-form-username">Choose a Username:</label>
                            <input type="text" id="register-form-username" name="register-form-username" value="" class="form-control" />
                        </div>

                        <div class="col_full">
                            <label for="register-form-phone">Phone:</label>
                            <input type="text" id="register-form-phone" name="register-form-phone" value="" class="form-control" />
                        </div>

                        <div class="col_full">
                            <label for="register-form-password">Choose Password:</label>
                            <input type="password" id="register-form-password" name="register-form-password" value="" class="form-control" />
                        </div>

                        <div class="col_full">
                            <label for="register-form-repassword">Re-enter Password:</label>
                            <input type="password" id="register-form-repassword" name="register-form-repassword" value="" class="form-control" />
                        </div>

                        <div class="col_full nobottommargin">
                            <button class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" value="register">Register Now</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>

</section><!-- #content end -->

<?php if(isset($_GET['warning']) && $_GET['warning'] == 'champs'){ ?>
<script type="text/javascript">
    toastr.warning('Un ou plusieurs champs sont vide', 'ATTENTION');
</script>
<?php } ?>