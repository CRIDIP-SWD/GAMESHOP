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
                    <img src="" alt="" class="avatar">
                    <h1><img src="" alt=""></h1>
                    <h2>Pseudo</h2>
                    <ul>
                        <li></li>
                    </ul>
                </div>
            </div>

            <div class="clear"></div>

        </div>

    </div>

</section><!-- #content end -->


