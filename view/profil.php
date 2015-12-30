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
                                    <img src="<?= $gamercard['avatarBodyImagePath']; ?>" alt="<?= $gamercard['gamertag']; ?>" />
                                </div>
                                <div id="gamerInfo">
                                    <div class="statusIcon">
                                        <?php if($presence['state'] == 'Online'): ?>
                                            <img src="https://assets.xbox.com/xweb-1512-23008-rtm-rolling/social/images/icon_greendot.png" />
                                        <?php endif; ?>
                                    </div>
                                    <div id="mygamertagWrapper">
                                        <div id="myGamerTag" style="visibility: visible;"><?= $gamercard['gamertag']; ?></div>
                                    </div>
                                    <div class="presence" style="display: block;">
                                        <p class="primaryPresence" style="margin: 0;">Vue en dernier: <?= $lastseen['titleName']; ?> (<?= $lastseen['deviceType']; ?>)</p>
                                        <p class="secondaryPresence" style="margin: 0;">
                                            <?php
                                            $convert_date = $date_format->convert_strtotime($lastseen['timestamp']);
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

                            <?php if(empty($info_client['pseudo_psn'])){ ?>
                                <div class="row">
                                    <div class="col-md-12" style="align-content: center;">
                                        <button class="button button-desc button-3d button-rounded button-blue center" data-toggle="modal" data-target="#add-psn">Lié votre compte Playstation Network<span>Bénéficier de 100 Points de fidélités</span></button>
                                    </div>
                                </div>
                                <div class="modal fade" id="add-psn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-body">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="block divcenter" style="background-color: #FFF; max-width: 700px;">
                                                        <div class="row nomargin clearfix">
                                                            <div class="col-sm-6" data-height-lg="456" data-height-md="456" data-height-sm="456" data-height-xs="0" data-height-xxs="0" style="background-image: url(<?= $constante->getUrl(array(), false, true); ?>autre/background/back_psn_title.png); background-size: cover;"></div>
                                                            <div class="col-sm-6 col-padding" data-height-lg="456" data-height-md="456" data-height-sm="456" data-height-xs="456" data-height-xxs="456">
                                                                <div>
                                                                    <h4 class="uppercase ls1">Sign Up for Offers</h4>
                                                                    <form action="#" class="clearfix" style="max-width: 300px;">
                                                                        <div class="col_full">
                                                                            <label for="" class="capitalize t600">Username or Email:</label>
                                                                            <input type="email" id="template-op-form-email" name="template-op-form-email" value="" class="sm-form-control" />
                                                                        </div>
                                                                        <div class="col_full">
                                                                            <label for="" class="capitalize t600">Choose Password:</label>
                                                                            <input type="password" id="template-op-form-password" name="template-op-form-password" value="" class="sm-form-control" />
                                                                        </div>
                                                                        <div class="col_full nobottommargin">
                                                                            <button type="submit" class="button button-rounded button-small button-dark nomargin" value="submit">Register Now</button>
                                                                        </div>
                                                                    </form>
                                                                    <p class="nobottommargin"><small class="t300"><em>* No Credit Card Required</em></small></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }else{ ?>
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
                                                        <div class="col-md-12" style="position: relative; top: -15px;">
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
                                                                <?php
                                                                $total_trophy = $profil['trophySummary']['earnedTrophies']['platinum'] + $profil['trophySummary']['earnedTrophies']['gold'] + $profil['trophySummary']['earnedTrophies']['silver'] + $profil['trophySummary']['earnedTrophies']['bronze'];
                                                                ?>
                                                                <tr style="font-size: 25px; font-weight: bold;">
                                                                    <td style="padding-top: 15px; padding-bottom: 30px; color: white;"><?= $profil['trophySummary']['level']; ?></td>
                                                                    <td style="padding-top: 15px; padding-bottom: 30px; color: white;"><div class="counter center"><span data-from="100" data-to="<?= $total_trophy; ?>" data-refresh-interval="100" data-speed="2000"></span></div></td>
                                                                    <td style="padding-top: 15px; padding-bottom: 30px; color: white;"><div class="counter center"><span data-from="100" data-to="<?= $profil['trophySummary']['earnedTrophies']['bronze'];?>" data-refresh-interval="100" data-speed="2000"></span> <img src="<?= $constante->getUrl(array(), false, true); ?>autre/misc/trophy_bronze.png"></div> </td>
                                                                    <td style="padding-top: 15px; padding-bottom: 30px; color: white;"><div class="counter center"><span data-from="100" data-to="<?= $profil['trophySummary']['earnedTrophies']['silver'];?>" data-refresh-interval="100" data-speed="2000"></span> <img src="<?= $constante->getUrl(array(), false, true); ?>autre/misc/trophy_silver.png"></div></td>
                                                                    <td style="padding-top: 15px; padding-bottom: 30px; color: white;"><div class="counter center"><span data-from="100" data-to="<?= $profil['trophySummary']['earnedTrophies']['gold'];?>" data-refresh-interval="100" data-speed="2000"></span> <img src="<?= $constante->getUrl(array(), false, true); ?>autre/misc/trophy_gold.png"></div></td>
                                                                    <td style="padding-top: 15px; padding-bottom: 30px; color: white;"><div class="counter center"><span data-from="100" data-to="<?= $profil['trophySummary']['earnedTrophies']['platinum'];?>" data-refresh-interval="100" data-speed="2000"></span> <img src="<?= $constante->getUrl(array(), false, true); ?>autre/misc/trophy_platinum.png"></div></td>
                                                                </tr>
                                                                </tbody>
                                                                <tfoot>
                                                                <tr>
                                                                    <td colspan="6">
                                                                        <div class="row">
                                                                            <div class="col-md-2" style="color: white;">Niveau <?= $profil['trophySummary']['level']; ?></div>
                                                                            <div class="col-md-8" style="color: white;">&nbsp;</div>
                                                                            <div class="col-md-2" style="color: white;">Niveau <?= $profil['trophySummary']['level']+1; ?></div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <ul class="skills">
                                                                                    <li data-percent="<?= $profil['trophySummary']['progress']; ?>">
                                                                                        <div class="progress">
                                                                                            <div class="progress-percent"><div class="counter counter-inherit counter-instant"><span data-from="0" data-to="<?= $profil['trophySummary']['progress']; ?>" data-refresh-interval="30" data-speed="1100"></span>%</div></div>
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
                                    <div class="tab-content clearfix" id="trophy" style="color: whitesmoke;">
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
                                                        <div class="col-md-12" style="position: relative; top: -15px;">
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
                                                                <?php
                                                                $total_trophy = $profil['trophySummary']['earnedTrophies']['platinum'] + $profil['trophySummary']['earnedTrophies']['gold'] + $profil['trophySummary']['earnedTrophies']['silver'] + $profil['trophySummary']['earnedTrophies']['bronze'];
                                                                ?>
                                                                <tr style="font-size: 25px; font-weight: bold;">
                                                                    <td style="padding-top: 15px; padding-bottom: 30px; color: white;"><?= $profil['trophySummary']['level']; ?></td>
                                                                    <td style="padding-top: 15px; padding-bottom: 30px; color: white;"><div class="counter center"><span data-from="100" data-to="<?= $total_trophy; ?>" data-refresh-interval="100" data-speed="2000"></span></div></td>
                                                                    <td style="padding-top: 15px; padding-bottom: 30px; color: white;"><div class="counter center"><span data-from="100" data-to="<?= $profil['trophySummary']['earnedTrophies']['bronze'];?>" data-refresh-interval="100" data-speed="2000"></span> <img src="<?= $constante->getUrl(array(), false, true); ?>autre/misc/trophy_bronze.png"></div> </td>
                                                                    <td style="padding-top: 15px; padding-bottom: 30px; color: white;"><div class="counter center"><span data-from="100" data-to="<?= $profil['trophySummary']['earnedTrophies']['silver'];?>" data-refresh-interval="100" data-speed="2000"></span> <img src="<?= $constante->getUrl(array(), false, true); ?>autre/misc/trophy_silver.png"></div></td>
                                                                    <td style="padding-top: 15px; padding-bottom: 30px; color: white;"><div class="counter center"><span data-from="100" data-to="<?= $profil['trophySummary']['earnedTrophies']['gold'];?>" data-refresh-interval="100" data-speed="2000"></span> <img src="<?= $constante->getUrl(array(), false, true); ?>autre/misc/trophy_gold.png"></div></td>
                                                                    <td style="padding-top: 15px; padding-bottom: 30px; color: white;"><div class="counter center"><span data-from="100" data-to="<?= $profil['trophySummary']['earnedTrophies']['platinum'];?>" data-refresh-interval="100" data-speed="2000"></span> <img src="<?= $constante->getUrl(array(), false, true); ?>autre/misc/trophy_platinum.png"></div></td>
                                                                </tr>
                                                                </tbody>
                                                                <tfoot>
                                                                <tr>
                                                                    <td colspan="6">
                                                                        <div class="row">
                                                                            <div class="col-md-2" style="color: white;">Niveau <?= $profil['trophySummary']['level']; ?></div>
                                                                            <div class="col-md-8" style="color: white;">&nbsp;</div>
                                                                            <div class="col-md-2" style="color: white;">Niveau <?= $profil['trophySummary']['level']+1; ?></div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <ul class="skills">
                                                                                    <li data-percent="<?= $profil['trophySummary']['progress']; ?>">
                                                                                        <div class="progress">
                                                                                            <div class="progress-percent"><div class="counter counter-inherit counter-instant"><span data-from="0" data-to="<?= $profil['trophySummary']['progress']; ?>" data-refresh-interval="30" data-speed="1100"></span>%</div></div>
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
                            <?php } ?>

                        </div>
                    </div>

                </div>

            </div>

            <div class="clear"></div>

        </div>

    </div>

</section><!-- #content end -->


