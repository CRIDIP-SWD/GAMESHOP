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

            <div class="tabs tabs-alt tabs-justify clearfix" id="tab-10">

                <ul class="tab-nav clearfix">
                    <li><a href="#xbox"><img src="<?= $constante->getUrl(array(), false, true); ?>autre/icone/xbox.png" /> Xbox Live</a></li>
                    <li><a href="#psn"><img src="<?= $constante->getUrl(array(), false, true); ?>autre/icone/psn.png" /> PSN</a></li>
                    <li><a href="#steam"><img src="<?= $constante->getUrl(array(), false, true); ?>autre/icone/steam.png" /> Steam</a></li>
                </ul>

                <div class="tab-container">

                    <div class="tab-content clearfix gamercard" id="xbox">
                        <img src="<?= $constante->getUrl(array(), false, true); ?>autre/logo/xbox-live-logo.png" class="img-responsive center" width="125" />
                        <div class="gamercard-xbox">
                            <section id="leftArea">
                                <div class="gamerPicContainer">
                                    <img src="<?= $xbox_gamercard['avatarBodyImagePath']; ?>" alt="<?= $xbox_gamercard['gamertag']; ?>" />
                                </div>
                                <div id="gamerInfo">
                                    <div class="statusIcon">
                                        <?php if($xbox_presence['state'] == 'Online'): ?>
                                            <img src="https://assets.xbox.com/xweb-1512-23008-rtm-rolling/social/images/icon_greendot.png" />
                                        <?php endif; ?>
                                    </div>
                                    <div id="mygamertagWrapper">
                                        <div id="myGamerTag" style="visibility: visible;"><?= $xbox_gamercard['gamertag']; ?></div>
                                    </div>
                                    <div class="presence" style="display: block;">
                                        <p class="primaryPresence" style="margin: 0;">Vue en dernier: <?= $xbox_presence['lastSeen']['titleName']; ?> (<?= $xbox_presence['lastSeen']['deviceType']; ?>)</p>
                                        <p class="secondaryPresence" style="margin: 0;">
                                            <?php
                                            $convert_date = $date_format->convert_strtotime($xbox_presence['lastSeen']['timestamp']);
                                            echo $date_format->format($convert_date);
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    <div class="tab-content clearfix gamercard" id="psn">
                        <img src="<?= $constante->getUrl(array(), false, true); ?>autre/logo/psn-logo.png" class="img-responsive center" width="125" />
                        <div class="tabs side-tabs clearfix" id="tab-4">

                            <ul class="tab-nav clearfix">
                                <li><a href="#profil">Mon profil</a></li>
                                <li><a href="#trophy">Mes Trophées</a></li>
                                <li><a href="#friends">Mes Amis</a></li>
                            </ul>

                            <div class="tab-container">

                                <div class="tab-content clearfix" id="tabs-13">
                                    Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.
                                </div>
                                <div class="tab-content clearfix" id="tabs-14">
                                    Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.
                                </div>
                                <div class="tab-content clearfix" id="tabs-15">
                                    <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
                                    Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.
                                </div>
                                <div class="tab-content clearfix" id="tabs-16">
                                    Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

            </div>

            <div class="clear"></div>

        </div>

    </div>

</section><!-- #content end -->


