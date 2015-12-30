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
                                    <div class="modal-dialog">
                                        <div class="modal-body">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="myModalLabel">Modal Heading</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <h4>Text in a modal</h4>
                                                    <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>

                                                    <h4>Popover in a modal</h4>
                                                    <p>This <a href="#" role="button" class="btn btn-default popover-test" title="" data-content="And here's some amazing content. It's very engaging. right?" data-original-title="A Title">button</a> should trigger a popover on click.</p>

                                                    <h4>Tooltips in a modal</h4>
                                                    <p><a href="#" class="tooltip-test" title="" data-original-title="Tooltip">This link</a> and <a href="#" class="tooltip-test" title="" data-original-title="Tooltip">that link</a> should have tooltips on hover.</p>
                                                    <hr>
                                                    <h4>Overflowing text to show scroll behavior</h4>
                                                    <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                                    <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                                    <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                                    <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                                    <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                                    <p class="nobottommargin">Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
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


