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

                                <div class="tab-content clearfix" id="profil">
                                    <div class="gamercard-psn">
                                        <div class="image-wrap">
                                            <div class="content-wrap">
                                                <div class="with-contextual-nav copy">
                                                    <div class="avatar-block">
                                                        <img class="avatar" src="<?= $profil['avatarUrl']; ?>" />
                                                    </div>
                                                    <div class="user-info">
                                                        <h2><?= $profil['onlineId']; ?></h2>
                                                        <h3><strong>Statut:</strong> <?= $profil['presence']['primaryInfo']['onlineStatus']; ?></h3>
                                                    </div>
                                                </div>
                                                <div class="info-bar">
                                                    <ul>
                                                        <li>
                                                            <div class="wrap">
                                                                <h4>Niveau</h4>
                                                                <div class="quantity content">2</div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="wrap">
                                                                <h4>Niveau</h4>
                                                                <div class="quantity content">2</div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="wrap">
                                                                <h4>Niveau</h4>
                                                                <div class="quantity content">2</div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="wrap">
                                                                <h4>Niveau</h4>
                                                                <div class="quantity content">2</div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="wrap">
                                                                <h4>Niveau</h4>
                                                                <div class="quantity content">2</div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="wrap">
                                                                <h4>Niveau</h4>
                                                                <div class="quantity content">2</div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div class="bottom">
                                                        <div class="wrap">
                                                            <div class="level">
                                                                <div class="level-info">
                                                                    <div class="current">Niveau <?= $profil['trophySummary']['level']; ?></div>
                                                                    <div class="next">Niveau <?= $profil['trophySummary']['level']+1; ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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


