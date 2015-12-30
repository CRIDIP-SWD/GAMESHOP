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
                                <?php
                                $convert_date_psn = $date_format->convert_strtotime($profil['presence']['primaryInfo']['lastOnlineDate']);
                                ?>
                                <div class="tab-content clearfix" id="profil" style="color: whitesmoke;">
                                    <div class="row">
                                        <div class="panel panel-default" style="background: url(<?= $constante->getUrl(array(), false, true); ?>autre/background/back_psn.jpg) no-repeat;">
                                            <div class="panel-body">
                                                <div class="row" style="margin-top: -15px; padding-top: 10px; padding-bottom: 15px">
                                                    <div class="col-md-1"><img src="<?= $profil['avatarUrl']; ?>" class="img-responsive" width="80"/></div>
                                                    <div class="col-md-11" style="margin: 0;">
                                                        <h2 style="margin: 0; color: white;"><?= $profil['onlineId']; ?></h2>
                                                        <h4 style="margin: 0; color: white;"><strong>Statut:</strong> <?= $profil['presence']['primaryInfo']['onlineStatus']; ?></h4>
                                                        <h6 style="margin: 0; color: white;"><i>Dernière connexion il y a <?= $date_format->format($convert_date_psn); ?></i></h6>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-top: -15px; padding-top: 10px; padding-bottom: 15px">
                                                    <div class="col-md-12">
                                                    <table style="width: 100%; text-align: center; margin-top: 70px; background-color: transparent;" cellspacing="0" cellpadding="0">
                                                        <thead>
                                                        <tr>
                                                            <th style="text-align: center; color: white;">Niveau</th>
                                                            <th style="text-align: center; color: white;">Trophées</th>
                                                            <th style="text-align: center; color: white;">Bronze</th>
                                                            <th style="text-align: center; color: white;">Argent</th>
                                                            <th style="text-align: center; color: white;">Or</th>
                                                            <th style="text-align: center; color: white;">Platine</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr style="font-size: 25px; font-weight: bold;">
                                                            <td style="padding-top: 15px; padding-bottom: 30px; color: white;">2</td>
                                                            <td style="padding-top: 15px; padding-bottom: 30px; color: white;">1860</td>
                                                            <td style="padding-top: 15px; padding-bottom: 30px; color: white;">985 <img src="<?= $constante->getUrl(array(), false, true); ?>autre/misc/trophy_bronze.png"></td>
                                                            <td style="padding-top: 15px; padding-bottom: 30px; color: white;">325 <img src="<?= $constante->getUrl(array(), false, true); ?>autre/misc/trophy_silver.png"></td>
                                                            <td style="padding-top: 15px; padding-bottom: 30px; color: white;">174 <img src="<?= $constante->getUrl(array(), false, true); ?>autre/misc/trophy_gold.png"></td>
                                                            <td style="padding-top: 15px; padding-bottom: 30px; color: white;">81 <img src="<?= $constante->getUrl(array(), false, true); ?>autre/misc/trophy_platinum.png"></td>
                                                        </tr>
                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <td colspan="6">
                                                                <div class="row">
                                                                    <div class="col-md-2" style="color: white;">Niveau 2</div>
                                                                    <div class="col-md-7" style="color: white;">&nbsp;</div>
                                                                    <div class="col-md-2" style="color: white;">Niveau 3</div>
                                                                    <div class="col-md-1" style="color: white; text-align: left;">
                                                                        <span style="font-size: 26px;">40</span>
                                                                        <span style="font-size: 18px;">%</span>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-11">
                                                                        <ul class="skills">
                                                                            <li data-percent="80">
                                                                                <div class="progress">
                                                                                    <div class="counter counter-inherit counter-instant"><span data-from="0" data-to="80" data-refresh-interval="30" data-speed="1100"></span>%</div>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        </tfoot>
                                                    </table>
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


