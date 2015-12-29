<?php
if($_SESSION['logged'] == false) {
    header("Location: index.php?view=login&warning=no-connect");
}
?>
<!-- Page Title
		============================================= -->
<section id="page-title" class="page-title-parallax page-title-dark" style="background-image: url('<?= $constante->getUrl(array(), false, true) ?>autre/background/empty.jpg');" data-stellar-background-ratio="0.3">

    <div class="container clearfix">
        <h1>MON COMPTE</h1>
        <span>Bienvenue</span>
        <ol class="breadcrumb">
            <li><a href="#">GAMESHOP</a></li>
            <li><a href="#">MON COMPTE</a></li>
            <li class="active">Bienvenue</li>
        </ol>
    </div>

</section><!-- #page-title end -->

<!-- Content
		============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <div class="col-md-4">
                <div class="gamercard">
                    <h1><img src="<?= $xbox_profile->avatar; ?>"> <?= $xbox_profile->gamertag; ?> <?= $xbox->xboxlivestat($xbox_profile->status); ?></h1>
                    <h2 style="color: #9d9d9d"><img src="<?= $constante->getUrl(array(), false, true); ?>autre/icone/gamerscorelighticon.png" /> <?= $xbox_profile->gamerscore; ?></h2>
                </div>
            </div>

            <div class="clear"></div>

        </div>

    </div>

</section><!-- #content end -->


