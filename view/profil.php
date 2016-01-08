<?php
if($_SESSION['logged'] == false) {
    header("Location: index.php?view=login&warning=no-connect");
}else{
    $idclient = $info_client['idclient'];
}
?>

<?php if(!isset($_GET['sub'])): ?>
    <section id="page-title" class="page-title-parallax page-title-dark" style="background-image: url('<?= $constante->getUrl(array(), false, true) ?>autre/background/empty.jpg');" data-stellar-background-ratio="0.3">

        <div class="container clearfix">
            <h1>MON COMPTE</h1>
            <span>Bienvenue <?= $info_client['prenom_client']; ?> <?= $info_client['nom_client']; ?></span>
            <ol class="breadcrumb">
                <li><a href="#">GAMESHOP</a></li>
                <li><a href="#">MON COMPTE</a></li>
                <li class="active">Bienvenue</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix bottommargin">
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
            </div>
            <div class="container clearfix topmargin">
                <div class="row bottommargin-sm">
                    <div class="col-md-4" style="">
                        <div class="feature-box fbox-center fbox-effect" style="background-color: rgb(233, 233, 233); border: 1px none; box-shadow: 0px 0px 5px 1px rgba(0, 0, 0, 0.1) inset; border-radius: 5px; padding: 25px;">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-line2-info i-alt"></i></a>
                            </div>
                            <h3 style="color: #0000E6;">Mes Informations</h3>
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
                    <div class="col-md-4" style="">
                        <div class="feature-box fbox-center fbox-effect" style="background-color: rgb(233, 233, 233); border: 1px none; box-shadow: 0px 0px 5px 1px rgba(0, 0, 0, 0.1) inset; border-radius: 5px; padding: 25px;">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-book i-alt"></i></a>
                            </div>
                            <h3 style="color: #0000E6;">Mon Carnet d'Adresse</h3>
                            <table style="width: 100%; text-align: left;">
                                <?php
                                $adresse = $client_cls->fact_default($info_client['idclient']);
                                ?>
                                <tbody>
                                    <tr>
                                        <td style="font-weight: 700;">MON ADRESSE</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?= $adresse['nom']; ?> <?= $adresse['prenom']; ?><br>
                                            <?= html_entity_decode($adresse['adresse']); ?><br>
                                            <?= $adresse['code_postal']; ?> <?= html_entity_decode($adresse['ville']); ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="button" class="button button-3d button-rounded button-green" onclick="window.location.href='index.php?view=profil&sub=adresse'">Modifier mes adresses</button>
                        </div>
                    </div>
                    <div class="col-md-4" style="">
                        <div class="feature-box fbox-center fbox-effect" style="background-color: rgb(233, 233, 233); border: 1px none; box-shadow: 0px 0px 5px 1px rgba(0, 0, 0, 0.1) inset; border-radius: 5px; padding: 25px;">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-line2-basket i-alt"></i></a>
                            </div>
                            <h3 style="color: #0000E6;">Mes Achats</h3>
                            <?php if($cmd_cls->count_cmd($info_client['idclient']) != 0){ ?>
                                <table style="width: 100%; text-align: left;">
                                    <tbody>
                                    <?php
                                    $sql_cmd = mysql_query("SELECT * FROM commande WHERE idclient = '$idclient' ORDER BY date_commande ASC LIMIT 4 ")or die(mysql_error());
                                    while($cmd = mysql_fetch_array($sql_cmd)){
                                        ?>
                                        <tr>
                                            <td><span class="text-info">Commande N° <?= $cmd['num_commande']; ?></span></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            <?php }else{ ?>
                                <table style="width: 100%; text-align: left;">
                                    <tbody>
                                        <tr>
                                            <td style="w100%">Vous n'avez pas effectuer d'achat récemment !</td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php } ?>
                            <button type="button" class="button button-3d button-rounded button-green" onclick="window.location.href='index.php?view=profil&sub=achat'">Voir mes achat</button>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="row">
                    <div class="col-md-4" style="">
                        <div class="feature-box fbox-center fbox-effect" style="background-color: rgb(233, 233, 233); border: 1px none; box-shadow: 0px 0px 5px 1px rgba(0, 0, 0, 0.1) inset; border-radius: 5px; padding: 25px;">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-euro i-alt"></i></a>
                            </div>
                            <h3 style="color: #0000E6;">Mes Bon d'Achat</h3>
                            <?php if($vourcher_cls->count_vourcher_clt($info_client['idclient']) == 0){ ?>
                                <table style="width: 100%; text-align: left;">
                                    <tbody>
                                    <tr>
                                        <td style="width: 100%;">Vous n'avez pas de bon d'achat de disponible</td>
                                    </tr>
                                    </tbody>
                                </table>
                            <?php }else{ ?>
                                <table style="width: 100%; text-align: left;">
                                    <tbody>
                                    <?php
                                    $sql_vourcher = mysql_query("SELECT * FROM shop_vourcher WHERE client = '1' AND idclient = '$idclient' ORDER BY perempsion ASC LIMIT 4")or die(mysql_error());
                                    while($vourcher = mysql_fetch_array($sql_vourcher)){
                                    ?>
                                        <tr>
                                            <td style="width: 100%;">
                                                <?php if($vourcher['perempsion'] <= time()){ ?>
                                                    <span class="text-danger">Bon d'achat de <?= $vourcher['percent_rem']; ?>% valable jusqu'au <?= date("d/m/Y", $vourcher['perempsion']); ?></span>
                                                <?php }else{ ?>
                                                    <span class="text-info">Bon d'achat de <?= $vourcher['percent_rem']; ?>% valable jusqu'au <?= date("d/m/Y", $vourcher['perempsion']); ?></span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            <?php } ?>
                            <button type="button" class="button button-3d button-rounded button-green" onclick="window.location.href='index.php?view=profil&sub=vourcher'">Voir mes bons d'achats</button>
                        </div>
                    </div>
                    <div class="col-md-4" style="">
                        <div class="feature-box fbox-center fbox-effect" style="background-color: rgb(233, 233, 233); border: 1px none; box-shadow: 0px 0px 5px 1px rgba(0, 0, 0, 0.1) inset; border-radius: 5px; padding: 25px;">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-calendar3 i-alt"></i></a>
                            </div>
                            <h3 style="color: #0000E6;">Mes Reservations</h3>
                            <?php if($resa_cls->count_resa($idclient) != 0){ ?>
                                <table style="width: 100%; text-align: left;">
                                    <tbody>
                                    <?php
                                    $sql_resa = mysql_query("SELECT * FROM client_reservation WHERE idclient = '$idclient' ORDER BY num_reservation ASC LIMIT 4")or die(mysql_error());
                                    while($resa = mysql_fetch_array($sql_resa)){
                                    ?>
                                        <tr>
                                            <td><span class="text-info">Réservation N° <?= $resa['num_reservation']; ?></span></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            <?php }else{ ?>
                                <table style="width: 100%; text-align: left;">
                                    <tbody>
                                        <tr>
                                            <td style="width: 100%;">Aucune réservation</td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php } ?>
                            <button type="button" class="button button-3d button-rounded button-green" onclick="window.location.href='index.php?view=profil&sub=reservation'">Voir mes reservations</button>
                        </div>
                    </div>
                    <div class="col-md-4" style="">
                        <div class="feature-box fbox-center fbox-effect" style="background-color: rgb(233, 233, 233); border: 1px none; box-shadow: 0px 0px 5px 1px rgba(0, 0, 0, 0.1) inset; border-radius: 5px; padding: 25px;">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-envelope2 i-alt"></i></a>
                            </div>
                            <h3 style="color: #0000E6;">Newsletter</h3>
                            <?php if($newsletter_cls->count_newsletter($idclient) != 0){ ?>
                                <span class="text-center"><i class="icon-check icon-3x text-success"></i></span><br>
                                <span class="text-center">Inscrit à la newsletter</span>
                            <?php }else{ ?>
                                <span class="text-center"><i class="icon-remove-sign icon-3x text-danger"></i></span><br>
                                <span class="text-center">Non inscrit à la newsletter</span>
                            <?php } ?>
                            <button type="button" class="button button-3d button-rounded button-green" data-toggle="modal" href="#edit-client-newsletter">Gérer mon abonnement</button>
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
                                        <section id="page-title" class="page-title-parallax page-title-dark" style="background-image: url('<?= $constante->getUrl(array(), false, true) ?>autre/background/empty.jpg');" data-stellar-background-ratio="0.3">

                                            <div class="container clearfix">
                                                <h1>MON COMPTE</h1>
                                                <span>Bienvenue</span>
                                            </div>

                                        </section>
                                        <br>
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

    </section>
<?php endif; ?>
<?php if(isset($_GET['sub']) && $_GET['sub'] == 'adresse'): ?>
    <section id="page-title" class="page-title-parallax page-title-dark" style="background-image: url('<?= $constante->getUrl(array(), false, true) ?>autre/background/empty.jpg');" data-stellar-background-ratio="0.3">

        <div class="container clearfix">
            <h1>MON COMPTE</h1>
            <span>Bienvenue <?= $info_client['prenom_client']; ?> <?= $info_client['nom_client']; ?></span>
            <ol class="breadcrumb">
                <li><a href="index.php?view=index">GAMESHOP</a></li>
                <li><a href="index.php?view=profil">MON COMPTE</a></li>
                <li class="active">Mon carnet d'adresse</li>
            </ol>
        </div>

    </section><!-- #page-title end -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="promo promo-border promo-full bottommargin header-stick">
                    <div class="container clearfix">
                        <h3>MON CARNET D'ADRESSE</h3>
                        <a class="button button-xlarge button-rounded" data-toggle="modal" href="#add-adresse"><i class="icon-plus"></i> Ajouter une adresse</a>
                    </div>
                </div>
            </div>
            <div class="container clearfix bottommargin-lg">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <caption>
                                <div class="fancy-title title-dotted-border title-center">
                                    <h2>Adresse de <span>Facturation</span></h2>
                                </div>
                            </caption>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Alias</th>
                                    <th>Identité</th>
                                    <th>Adresse</th>
                                    <th>Téléphone</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql_adresse_facture = mysql_query("SELECT * FROM client_adresse_fact WHERE idclient = '$idclient'")or die(mysql_error());
                            while($adresse = mysql_fetch_array($sql_adresse_facture)){
                            ?>
                                <tr>
                                    <td style="text-align: center;">
                                        <?php if($adresse['default'] == 1): ?>
                                            <i class="icon-star3 icon-2x text-center text-warning" data-toggle="tooltip" data-original-title="Par Default"></i>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $adresse['alias']; ?></td>
                                    <td>
                                        <?php if(!empty($adresse['societe'])){echo "<strong>".$adresse['societe']."</strong><br><i>".$adresse['nom']." ".$adresse['prenom']."</i>";}else{echo "<strong>".$adresse['nom']." ".$adresse['prenom']."</strong>";} ?>
                                    </td>
                                    <td>
                                        <?= html_entity_decode($adresse['adresse']); ?><br>
                                        <?= $adresse['code_postal']; ?> <?= html_entity_decode($adresse['ville']); ?><br>
                                        FRANCE
                                    </td>
                                    <td>
                                        <i class="icon-phone3"></i> 0<?= substr($adresse['telephone'], 4, 12); ?>
                                    </td>
                                    <td>
                                        <a class="btn" href="<?= $constante->getUrl(array("core/"), false, false);?>account.php?action=supp-adresse&type=livraison&idadresse=<?= $adresse['idadresse']; ?>"><i class="icon-remove-sign text-danger icon-2x"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <caption>
                                <div class="fancy-title title-dotted-border title-center">
                                    <h2>Adresse de <span>Livraison</span></h2>
                                </div>
                            </caption>
                            <thead>
                            <tr>
                                <th></th>
                                <th>Alias</th>
                                <th>Identité</th>
                                <th>Adresse</th>
                                <th>Téléphone</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql_adresse_liv = mysql_query("SELECT * FROM client_adresse_liv WHERE idclient = '$idclient'")or die(mysql_error());
                            while($adresse = mysql_fetch_array($sql_adresse_liv)){
                                ?>
                                <tr>
                                    <td style="text-align: center;">
                                        <?php if($adresse['default'] == 1): ?>
                                            <i class="icon-star3 icon-2x text-center text-warning" data-toggle="tooltip" data-original-title="Par Default"></i>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $adresse['alias']; ?></td>
                                    <td>
                                        <?php if(!empty($adresse['societe'])){echo "<strong>".$adresse['societe']."</strong><br><i>".$adresse['nom']." ".$adresse['prenom']."</i>";}else{echo "<strong>".$adresse['nom']." ".$adresse['prenom']."</strong>";} ?>
                                    </td>
                                    <td>
                                        <?= html_entity_decode($adresse['adresse']); ?><br>
                                        <?= $adresse['code_postal']; ?> <?= html_entity_decode($adresse['ville']); ?><br>
                                        FRANCE
                                    </td>
                                    <td>
                                        <i class="icon-phone3"></i> 0<?= substr($adresse['telephone'], 4, 12); ?>
                                    </td>
                                    <td>
                                        <a class="btn" href="<?= $constante->getUrl(array("core/"), false, false);?>account.php?action=supp-adresse&type=livraison&idadresse=<?= $adresse['idadresse']; ?>"><i class="icon-remove-sign text-danger icon-2x"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="add-adresse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-body">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel"><i class="icon-plus"></i> Ajouter une adresse</h4>
                    </div>
                    <form class="form-horizontal" action="<?= $constante->getUrl(array('core/'), false, false); ?>account.php" method="post">
                        <input type="hidden" name="idclient" value="<?= $idclient; ?>" />
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="control-label col-md-3">Type d'adresse</label>
                                <div class="col-md-9">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="type_adresse" id="type_adresse" value="facturation" checked>
                                            Facturation
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="type_adresse" id="type_adresse" value="livraison" checked>
                                            Livraison
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="r">Alias <span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" id="r" name="alias" class="form-control" required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="r">Nom <span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" id="r" name="nom" class="form-control" required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="r">Prénom <span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" id="r" name="prenom" class="form-control" required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="r">Société</label>
                                <div class="col-md-9">
                                    <input type="text" id="r" name="societe" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="telephone">Téléphone <span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" id="telephone" name="telephone" class="form-control" required mask="9999999999"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="r">Adresse <span class="required">*</span></label>
                                <div class="col-md-9">
                                    <textarea name="adresse" id="r" cols="10"  class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="code_postal">Code Postal <span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" id="code_postal" name="code_postal" class="form-control" required mask="99999"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="r">Ville <span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" id="r" name="ville" class="form-control" required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="default" value="" />
                                            Adresse par Default
                                        </label>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary" name="action" value="add-adresse">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if(isset($_GET['sub']) && $_GET['sub'] == 'achat'): ?>
    <section id="page-title" class="page-title-parallax page-title-dark" style="background-image: url('<?= $constante->getUrl(array(), false, true) ?>autre/background/empty.jpg');" data-stellar-background-ratio="0.3">

        <div class="container clearfix">
            <h1>MON COMPTE</h1>
            <span>Bienvenue <?= $info_client['prenom_client']; ?> <?= $info_client['nom_client']; ?></span>
            <ol class="breadcrumb">
                <li><a href="index.php?view=index">GAMESHOP</a></li>
                <li><a href="index.php?view=profil">MON COMPTE</a></li>
                <li class="active">Mes Achats</li>
            </ol>
        </div>

    </section><!-- #page-title end -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix bottommargin-lg">
                <div class="row">
                    <div class="col-md-3">
                        <div class="widget clearfix">

                            <h4>Nouveau produit</h4>
                            <div id="post-list-footer">

                                <div class="spost clearfix">
                                    <div class="entry-image">
                                        <a href="#"><img alt="Image" src="images/shop/small/1.jpg"></a>
                                    </div>
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">Blue Round-Neck Tshirt</a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <li class="color">$29.99</li>
                                            <li><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-half-full"></i></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="spost clearfix">
                                    <div class="entry-image">
                                        <a href="#"><img alt="Image" src="images/shop/small/6.jpg"></a>
                                    </div>
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">Checked Short Dress</a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <li class="color">$23.99</li>
                                            <li><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-half-full"></i> <i class="icon-star-empty"></i></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="spost clearfix">
                                    <div class="entry-image">
                                        <a href="#"><img alt="Image" src="images/shop/small/7.jpg"></a>
                                    </div>
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">Light Blue Denim Dress</a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <li class="color">$19.99</li>
                                            <li><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="container clearfix bottommargin">
                            <div class="fancy-title title-dotted-border title-center">
                                <h1>Listing de vos <span>Achats</span></h1>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>N° de la commande</th>
                                            <th>Montant TTC</th>
                                            <th>Statut</th>
                                            <th>Facture</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sql_cmd = mysql_query("SELECT * FROM commande WHERE idclient = '$idclient' ORDER BY date_commande DESC")or die(mysql_error());
                                    while($cmd = mysql_fetch_array($sql_cmd)){
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= date("d", $cmd['date_commande']); ?> <?= $date_format->mois(date("m", $cmd['date_commande'])); ?> <?= date("Y", $cmd['date_commande']); ?></td>
                                            <td class="text-center"><?= $cmd['num_commande']; ?></td>
                                            <td class="text-center" style="font-weight: 700; color: #0E76A8;"><?= number_format($cmd['total_commande'], 2, ',', ' ')." €"; ?></td>
                                            <td class="text-center">
                                                <?php
                                                switch($cmd['statut'])
                                                {
                                                    case 0:
                                                        echo "<span class='label label-danger'>Annulée</span>";
                                                        break;

                                                    case 1:
                                                        echo "<span class='label label-default'>Valider - En attente du Paiement (Chèque)</span>";
                                                        break;
                                                    case 2:
                                                        echo "<span class='label label-default'>Valider - En attente du Paiement (Mandat Cash)</span>";
                                                        break;
                                                    case 3:
                                                        echo "<span class='label label-default'>Valider - En attente du Paiement (Virement)</span>";
                                                        break;

                                                    case 4:
                                                        echo "<span class='label label-info'>Valider - Paiement Acceptée</span>";
                                                        break;
                                                    case 5:
                                                        echo "<span class='label label-warning'>Préparation en cours...</span>";
                                                        break;
                                                    case 6:
                                                        echo "<span class='label label-success'>Expédié</span>";
                                                        break;

                                                    case 7:
                                                        echo "<span class='label label-danger'>Refuser - Paiement refuser par l'établissement bancaire</span>";
                                                        break;

                                                    case 8:
                                                        echo "<span class='label label-default'>En attente (Rupture)</span>";
                                                        break;
                                                    case 9:
                                                        echo "<span class='label label-default'>En attente (Précommande)</span>";
                                                        break;
                                                }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if($cmd['statut'] == 4 OR $cmd['statut'] == 5 OR $cmd['statut'] == 6): ?>
                                                    <i class="icon-file-text icon-2x text-info" data-toggle="tooltip" data-original-title="Votre facture"></i>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="index.php?view=profil&sub=achat-detail&num_commande=<?= $cmd['num_commande']; ?>" class="button button-mini button-rounded button-blue">Détail</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if(isset($_GET['sub']) && $_GET['sub'] == 'achat-detail'): ?>
    <?php
    $num_commande = $_GET['num_commande'];
    $sql_cmd = mysql_query("SELECT * FROM commande, client
                            WHERE commande.idclient = client.idclient
                            AND commande.num_commande = '$num_commande'")or die(mysql_error());
    $cmd = mysql_fetch_array($sql_cmd);
    ?>
    <section id="page-title" class="page-title-parallax page-title-dark" style="background-image: url('<?= $constante->getUrl(array(), false, true) ?>autre/background/empty.jpg');" data-stellar-background-ratio="0.3">

        <div class="container clearfix">
            <h1>COMMANDE N° <strong><?= $num_commande; ?></strong></h1>
            <span><?= $date_format->jour_semaine(date("N", $cmd['date_commande'])); ?> <?= date("d", $cmd['date_commande']); ?> <?= $date_format->mois(date("n", $cmd['date_commande'])); ?> <?= date("Y", $cmd['date_commande']); ?> </span>
            <ol class="breadcrumb">
                <li><h1 class="text-info"><?= number_format($cmd['total_commande'], 2, ',', ' ')." €"; ?></h1></li>
            </ol>
        </div>

    </section><!-- #page-title end -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix bottommargin header-stick">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tabs tabs-bordered clearfix" id="tab-2">

                            <ul class="tab-nav clearfix">
                                <li><a href="#general">GENERAL</a></li>
                                <li><a href="#item">ARTICLES</a></li>
                                <li><a href="#customers">CLIENT</a></li>
                            </ul>

                            <div class="tab-container">

                                <div class="tab-content clearfix" id="general">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h2>Informations Globales</h2>
                                            <table style="width: 100%;">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 25%; padding-bottom: 10px; padding-top: 10px;">Numéro de la commande</td>
                                                        <td style="width: 75%; padding-bottom: 10px; padding-top: 10px; font-weight: 700;"><?= $num_commande; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 25%; padding-bottom: 10px; padding-top: 10px;">Date</td>
                                                        <td style="width: 75%; padding-bottom: 10px; padding-top: 10px; font-weight: 700;"><?= $date_format->jour_semaine(date("N", $cmd['date_commande'])); ?> <?= date("d", $cmd['date_commande']); ?> <?= $date_format->mois(date("n", $cmd['date_commande'])); ?> <?= date("Y", $cmd['date_commande']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 25%; padding-bottom: 10px; padding-top: 10px;">Client</td>
                                                        <td style="width: 75%; padding-bottom: 10px; padding-top: 10px; font-weight: 700;"><?= $cmd['nom_client']; ?> <?= $cmd['prenom_client']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 25%; padding-bottom: 10px; padding-top: 10px;">Total de la commande</td>
                                                        <td style="width: 75%; padding-bottom: 10px; padding-top: 10px; font-weight: 700;"><?= number_format($cmd['total_commande'], 2, ',', ' ')." €"; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 25%; padding-bottom: 10px; padding-top: 10px;">Nb d'article</td>
                                                        <td style="width: 75%; padding-bottom: 10px; padding-top: 10px; font-weight: 700;"><?= $cmd_cls->count_article($num_commande); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 25%; padding-bottom: 10px; padding-top: 10px;">Date de Livraison:</td>
                                                        <td style="width: 75%; padding-bottom: 10px; padding-top: 10px; font-weight: 700;"><?= $date_format->jour_semaine(date("N", $cmd['date_livraison'])); ?> <?= date("d", $cmd['date_livraison']); ?> <?= $date_format->mois(date("n", $cmd['date_livraison'])); ?> <?= date("Y", $cmd['date_livraison']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 25%; padding-bottom: 10px; padding-top: 10px;">Destination</td>
                                                        <td style="width: 75%; padding-bottom: 10px; padding-top: 10px; font-weight: 700;"><?= $cmd['destination']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 25%; padding-bottom: 10px; padding-top: 10px;">Statut de la commande</td>
                                                        <td style="width: 75%; padding-bottom: 10px; padding-top: 10px; font-weight: 700;">
                                                            <?php
                                                            switch($cmd['statut'])
                                                            {
                                                                case 0:
                                                                    echo "<span class='label label-danger'>Annulée</span>";
                                                                    break;

                                                                case 1:
                                                                    echo "<span class='label label-default'>Valider - En attente du Paiement (Chèque)</span>";
                                                                    break;
                                                                case 2:
                                                                    echo "<span class='label label-default'>Valider - En attente du Paiement (Mandat Cash)</span>";
                                                                    break;
                                                                case 3:
                                                                    echo "<span class='label label-default'>Valider - En attente du Paiement (Virement)</span>";
                                                                    break;

                                                                case 4:
                                                                    echo "<span class='label label-info'>Valider - Paiement Acceptée</span>";
                                                                    break;
                                                                case 5:
                                                                    echo "<span class='label label-warning'>Préparation en cours...</span>";
                                                                    break;
                                                                case 6:
                                                                    echo "<span class='label label-success'>Expédié</span>";
                                                                    break;

                                                                case 7:
                                                                    echo "<span class='label label-danger'>Refuser - Paiement refuser par l'établissement bancaire</span>";
                                                                    break;

                                                                case 8:
                                                                    echo "<span class='label label-default'>En attente (Rupture)</span>";
                                                                    break;
                                                                case 9:
                                                                    echo "<span class='label label-default'>En attente (Précommande)</span>";
                                                                    break;
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <h2>Autres Informations</h2>
                                            <table style="width: 100%;">
                                                <tbody>
                                                <tr>
                                                    <td style="width: 25%; padding-bottom: 10px; padding-top: 10px;">Adresse de Livraison</td>
                                                    <td style="width: 75%; padding-bottom: 10px; padding-top: 10px; font-weight: 700;"><?= $cmd['adresse_liv']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 25%; padding-bottom: 10px; padding-top: 10px;">Methode de Livraison</td>
                                                    <td style="width: 75%; padding-bottom: 10px; padding-top: 10px; font-weight: 700;"><?= $cmd['methode_livraison']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 25%; padding-bottom: 10px; padding-top: 10px;">Methode de paiement</td>
                                                    <td style="width: 75%; padding-bottom: 10px; padding-top: 10px; font-weight: 700;"><?= $cmd['methode_paiement']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 25%; padding-bottom: 10px; padding-top: 10px;">Etat des Articles</td>
                                                    <td style="width: 75%; padding-bottom: 10px; padding-top: 10px; font-weight: 700;">
                                                        <?php if($cmd_cls->verif_article_cmd_sortie($num_commande) != 0 AND $cmd_cls->verif_article_cmd_stock($num_commande) != 0){ ?>
                                                            <i class="icon-check text-success"></i> OK
                                                        <?php }else{ ?>
                                                            <i class="icon-remove text-danger"></i> <?= $cmd_cls->verif_article_cmd_stock($num_commande); ?> articles en rupture de stock.<br>
                                                            <i class="icon-remove text-danger"></i> <?= $cmd_cls->verif_article_cmd_sortie($num_commande); ?> articles ne sont pas sortie.
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <a href="" class="button button-3d button-amber btn-block">Voir la facture</a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content clearfix" id="item">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h2>ARTICLES</h2>
                                            <br>
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Produit</th>
                                                            <th>Référence</th>
                                                            <th>Catégorie</th>
                                                            <th>Prix Unitaire</th>
                                                            <th>Quantité</th>
                                                            <th>Total</th>
                                                            <th>Statut</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $sql_article = mysql_query("SELECT * FROM commande_article, produits
                                                                                WHERE commande_article.idarticle = produits.id
                                                                                AND num_commande = '$num_commande'")or die(mysql_error());
                                                    while($article = mysql_fetch_array($sql_article)){
                                                    ?>
                                                        <tr>
                                                            <td class="text-center"><?= $article['id']; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content clearfix" id="customers">
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>



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
<?php if(isset($_GET['success']) && $_GET['success'] == 'add-adresse-fact'){ ?>
    <script type="text/javascript">
        setTimeout(function () {
            $.notific8("L'adresse postal de facturation à bien été ajouter.",{ sticky:true, horizontalEdge:"top", theme:"success" ,heading:"SUCCES"})
        }, 1000);
    </script>
<?php } ?>
 <?php if(isset($_GET['success']) && $_GET['success'] == 'add-adresse-liv'){ ?>
     <script type="text/javascript">
         setTimeout(function () {
             $.notific8("L'adresse postal de Livraison à bien été ajouter.",{ sticky:true, horizontalEdge:"top", theme:"success" ,heading:"SUCCES"})
         }, 1000);
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
<?php if(isset($_GET['error']) && $_GET['error'] == 'add-adresse-fact'){ ?>
    <script type="text/javascript">
        setTimeout(function () {
            $.notific8("Une erreur à eu lieu lors de l'ajout de l'adresse de facturation, <a href='mailto: webmaster@gameshop.com'>contacter l\'administrateur du site</a>.",{ sticky:true, horizontalEdge:"top", theme:"danger" ,heading:"ERREUR"})
        }, 1000);
    </script>
<?php } ?>
<?php if(isset($_GET['error']) && $_GET['error'] == 'add-adresse-liv'){ ?>
    <script type="text/javascript">
        setTimeout(function () {
            $.notific8("Une erreur à eu lieu lors de l'ajout de l'adresse de livraison, <a href='mailto: webmaster@gameshop.com'>contacter l\'administrateur du site</a>.",{ sticky:true, horizontalEdge:"top", theme:"danger" ,heading:"ERREUR"})
        }, 1000);
    </script>
<?php } ?>

<!-- AUTRE JS -->
<script type="text/javascript">
    $("#telephone").maskInput();
    $("#code_postal").maskInput();
</script>
