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
                    <!--<li><a href="#psn"><img src="<?= $constante->getUrl(array(), false, true); ?>autre/icone/psn.png" /> PSN</a></li>-->
                    <li><a href="#steam"><img src="<?= $constante->getUrl(array(), false, true); ?>autre/icone/steam.png" /> Steam</a></li>
                </ul>

                <div class="tab-container">

                    <div class="tab-content clearfix gamercard" id="xbox">
                        <img src="<?= $constante->getUrl(array(), false, true); ?>autre/logo/xbox-live-logo.png" class="img-responsive center" width="125" />
                        <div class="tabs side-tabs clearfix" id="tab-4">

                            <?php if(empty($info_client['pseudo_xbox'])){ ?>
                                <div class="row">
                                    <div class="col-md-12" style="position: relative; left: 350px; top: 50px">
                                        <button class="button button-desc button-3d button-rounded button-green" data-toggle="modal" data-target="#add-xbox-live">Lié votre compte Xbox Live<span>Bénéficier de 100 Points de fidélités</span></button>
                                    </div>
                                </div>
                                <div class="modal fade" id="add-xbox-live" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-body">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <img src="<?= $constante->getUrl(array(), false, true); ?>autre/logo/xbox-live-logo.png" />
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h2>Connexion au Xbox Live</h2>
                                                            <form class="form-horizontal" action="<?= $constante->getUrl(array('core/'), false, false); ?>account.php" method="post">
                                                                <input type="hidden" name="idclient" value="<?= $info_client['idclient']; ?>">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3" for="email">GamerTag</label>
                                                                    <div class="col-md-8">
                                                                        <input type="text" id="email" class="form-control" name="gamerTag" />
                                                                    </div>
                                                                </div>
                                                                <button type="submit" class="button button-3d button-green" name="action" value="add-xbox-live">Connexion</button>
                                                            </form>
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
                                </ul>

                                <div class="tab-container">
                                    <?php
                                    $convert_date_xbox = $date_format->convert_strtotime($lastseen['timestamp']);
                                    ?>
                                    <div class="tab-content clearfix" id="profil" style="color: whitesmoke;">
                                        <div class="row">
                                            <div class="panel panel-default" style="background: url(<?= $constante->getUrl(array(), false, true); ?>autre/background/back_xbox_live.jpg) no-repeat; background-position: -300px -300px;">
                                                <div class="panel-body">
                                                    <div class="row" style="margin-top: -15px; padding-top: 10px; padding-bottom: 15px">
                                                        <div class="col-md-1"><img src="<?= $gamercard['gamerpicLargeImagePath']; ?>" class="img-responsive" width="80"/></div>
                                                        <div class="col-md-11" style="margin: 0;">
                                                            <h2 style="margin: 0;"><?= $gamercard['gamertag']; ?></h2>
                                                            <h4 style="margin: 0;"><strong>Statut:</strong> <?= $presence['state']; ?></h4>
                                                            <?php if($presence['state'] == 'Offline'): ?>
                                                                <h6 style="margin: 0;"><i>Dernière connexion il y a <?= $date_format->format($convert_date_xbox); ?></i></h6>
                                                            <?php endif; ?>
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
                    <!--<div class="tab-content clearfix gamercard" id="psn">
                        <img src="<?= $constante->getUrl(array(), false, true); ?>autre/logo/psn-logo.png" class="img-responsive center" width="125" />
                        <div class="tabs side-tabs clearfix" id="tab-4">

                            <?php if(empty($info_client['pseudo_psn'])){ ?>
                                <div class="row">
                                    <div class="col-md-12" style="position: relative; left: 350px; top: 50px">
                                        <button class="button button-desc button-3d button-rounded button-blue" data-toggle="modal" data-target="#add-psn">Lié votre compte Playstation Network<span>Bénéficier de 100 Points de fidélités</span></button>
                                    </div>
                                </div>
                                <div class="modal fade" id="add-psn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-body">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <img src="<?= $constante->getUrl(array(), false, true); ?>autre/logo/psn-logo.png" style="position: relative; top: 120px;" />
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h2>Connexion au Playstation Network</h2>
                                                            <form class="form-horizontal" action="<?= $constante->getUrl(array('core/'), false, false); ?>account.php" method="post">
                                                                <input type="hidden" name="idclient" value="<?= $info_client['idclient']; ?>">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3" for="email">Adresse Mail</label>
                                                                    <div class="col-md-8">
                                                                        <input type="text" id="email" class="form-control" name="email" />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3" for="password">Mot de Passe</label>
                                                                    <div class="col-md-8">
                                                                        <input type="password" id="password" class="form-control" name="password" />
                                                                    </div>
                                                                </div>
                                                                <button type="submit" class="button button-3d button-green" name="action" value="add-psn">Connexion</button>
                                                            </form>
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
                    </div>-->
                    <div class="tab-content clearfix gamercard" id="steam">
                        <img src="<?= $constante->getUrl(array(), false, true); ?>autre/logo/steam-logo.png" class="img-responsive center" width="125" />
                        <div class="tabs side-tabs clearfix" id="tab-4">

                            <?php if(empty($info_client['pseudo_steam'])){ ?>
                                <div class="row">
                                    <div class="col-md-12" style="position: relative; left: 350px; top: 50px">
                                        <button class="button button-desc button-3d button-rounded button-black" data-toggle="modal" data-target="#add-steam">Lié votre compte Steam<span>Bénéficier de 100 Points de fidélités</span></button>
                                    </div>
                                </div>
                                <div class="modal fade" id="add-steam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-body">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <img src="<?= $constante->getUrl(array(), false, true); ?>autre/logo/steam-logo.png" style="position: relative; top: 60px;"/>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h2>Connexion à STEAM</h2>
                                                            <form class="form-horizontal" action="<?= $constante->getUrl(array('core/'), false, false); ?>account.php" method="post">
                                                                <input type="hidden" name="idclient" value="<?= $info_client['idclient']; ?>">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3" for="email">Id Steam*</label>
                                                                    <div class="col-md-8">
                                                                        <input type="text" id="email" class="form-control" name="idsteam" />
                                                                    </div>
                                                                </div>
                                                                <button type="submit" class="button button-3d button-green" name="action" value="add-steam">Connexion</button><br>
                                                                <h5>*: Pour trouvez votre identifiant connecteur de steam cliquer <a href="https://steamid.io/lookup" target="_blank">ICI</a>.</h5>
                                                            </form>
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
                                    <li><a href="#friends">Mes Amis</a></li>
                                </ul>

                                <div class="tab-container">
                                    <?php
                                    $convert_date_steam = $date_format->convert_strtotime($steam_playerSummary->lastLogoff);
                                    ?>
                                    <div class="tab-content clearfix" id="profil" style="color: whitesmoke;">
                                        <div class="row">
                                            <div class="panel panel-default" style="background: url(<?= $constante->getUrl(array(), false, true); ?>autre/background/back_steam.jpg) no-repeat;">
                                                <div class="panel-body">
                                                    <div class="row" style="margin-top: -15px; padding-top: 10px; padding-bottom: 15px">
                                                        <div class="col-md-2"><img src="<?= $steam_playerSummary->avatarFull; ?>" class="img-responsive" width="120"/></div>
                                                        <div class="col-md-5" style="margin: 0;">
                                                            <h2 style="margin: 0; color: white;"><?= $steam_playerSummary->personaName; ?></h2>
                                                            <h4 style="margin: 0; color: white;"><strong>Statut:</strong> <?= $steam_playerSummary->personaState; ?></h4>
                                                            <h6 style="margin: 0; color: white;"><i>Dernière connexion il y a <?= $date_format->format($convert_date_steam); ?></i></h6>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <?php
                                                            $level = $steam_p_level;

                                                            ?>
                                                            <div class="col_half center nobottommargin">
                                                                <div class="rounded-skill nobottommargin" style="color: whitesmoke;" data-color="#DD4B39" data-size="100" data-percent="<?= $steam_p_level_detail->percentThroughLevel; ?>" data-width="1" data-animate="2500"><?= $level; ?></div>
                                                            </div>
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

            <div class="row">
                <div class="col-md-4" style="">
                    <div class="feature-box fbox-center fbox-effect" style="background-color: rgb(233, 233, 233); border: 1px none; box-shadow: 0px 0px 5px 1px rgba(0, 0, 0, 0.1) inset; border-radius: 5px; padding: 25px;">
                        <div class="fbox-icon">
                            <a href="#"><i class="icon-screen i-alt"></i></a>
                        </div>
                        <h3 style="color: #0000E6;">Mes Informations Personnelles</h3>
                        <table style="width: 100%; text-align: left;">
                            <tbody>
                                <tr>
                                    <td style="font-weight: bold; width: 25%;">Nom :</td>
                                    <td style="width: 75%;"><?= $info_client['nom_client']; ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold; width: 25%;">Prénom :</td>
                                    <td style="width: 75%;"><?= $info_client['prenom_client']; ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold; width: 25%;">Email :</td>
                                    <td style="width: 75%;"><?= $info_client['email']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="button" class="button button-3d button-rounded button-green" data-toggle="modal" href="#edit-client">Modifier mes informations</button>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="edit-client" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-body">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel"><i class="icon-edit-sign"></i> Modifier mes informations de compte</h4>
                            </div>
                            <form class="form-horizontal" action="<?= $constante->getUrl(array('core/'), false, false); ?>account.php" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3" for="r">Nom:</label>
                                        <div class="col-md-9">
                                            <input id="r" type="text" name="nom_client" value="<?= $info_client['nom_client']; ?>" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3" for="r">Prénom:</label>
                                        <div class="col-md-9">
                                            <input id="r" type="text" name="prenom_client" value="<?= $info_client['prenom_client']; ?>" class="form-control" />
                                        </div>
                                    </div>
                                    <h2>Identification</h2>
                                    <div class="form-group">
                                        <label class="control-label col-md-3" for="r">ID Playstation Network:</label>
                                        <div class="col-md-9">
                                            <input id="r" type="text" name="pseudo_psn" value="<?= $info_client['pseudo_psn']; ?>" class="form-control" />
                                            <span class="help-block">Adresse email de connexion au PSN</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3" for="r">Mot de Passe PSN:</label>
                                        <div class="col-md-9">
                                            <input id="r" type="password" name="pass_psn" value="<?= $info_client['pass_psn']; ?>" class="form-control" />
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label class="control-label col-md-3" for="r">XBOX LIVE Gamertag:</label>
                                        <div class="col-md-9">
                                            <input id="r" type="text" name="pseudo_xbox" value="<?= $info_client['pseudo_xbox']; ?>" class="form-control" />
                                            <span class="help-block">Gamertag = Pseudo XBOX LIVE</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label class="control-label col-md-3" for="r">ID STEAM:</label>
                                        <div class="col-md-9">
                                            <input id="r" type="text" name="pseudo_steam" value="<?= $info_client['pseudo_steam']; ?>" class="form-control" />
                                            <span class="help-block">Identifiant 64 caractère</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-primary" name="action" value="edit-client">Valider</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</section><!-- #content end -->


<?php if(isset($_GET['success']) && $_GET['success'] == 'add-psn'){ ?>
    <script type="text/javascript">
        toastr.success('Votre compte Playstation Network est Maintenant lié à notre Boutique.','Succès')
    </script>
<?php } ?>
<?php if(isset($_GET['success']) && $_GET['success'] == 'add-xbox-live'){ ?>
    <script type="text/javascript">
        toastr.success('Votre compte XBOX LIVE est Maintenant lié à notre Boutique.','Succès')
    </script>
<?php } ?>
<?php if(isset($_GET['success']) && $_GET['success'] == 'add-steam'){ ?>
    <script type="text/javascript">
        toastr.success('Votre compte Steam est Maintenant lié à notre Boutique.','Succès')
    </script>
<?php } ?>
 
<?php if(isset($_GET['error']) && $_GET['error'] == 'add-psn'){ ?>
    <script type="text/javascript">
        toastr.error('Une erreur à eu lieu lors de la liaison de votre compte playstation Network avec la boutique, <a href="mailto: webmaster@gameshop.com">contacter l\'administrateur du site</a>.','ERREUR')
    </script>
<?php } ?>
<?php if(isset($_GET['error']) && $_GET['error'] == 'add-xbox-live'){ ?>
    <script type="text/javascript">
        toastr.error('Une erreur à eu lieu lors de la liaison de votre compte XBOX LIVE avec la boutique, <a href="mailto: webmaster@gameshop.com">contacter l\'administrateur du site</a>.','ERREUR')
    </script>
<?php } ?>
<?php if(isset($_GET['error']) && $_GET['error'] == 'add-steam'){ ?>
    <script type="text/javascript">
        toastr.error('Une erreur à eu lieu lors de la liaison de votre compte Steam avec la boutique, <a href="mailto: webmaster@gameshop.com">contacter l\'administrateur du site</a>.','ERREUR')
    </script>
<?php } ?>
