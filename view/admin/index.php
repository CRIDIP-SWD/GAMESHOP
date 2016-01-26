<?php if(!isset($_GET['sub'])): ?>
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Bienvenue</h2>

            <div class="right-wrapper pull-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="index.php?view=admin_sha">
                            <i class="fa fa-home"></i>
                        </a>
                    </li>
                    <li><span>Bienvenue</span></li>
                </ol>

                <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
            </div>
        </header>

        <!-- start: page -->
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <section class="panel">
                            <div class="panel-body bg-secondary">
                                <div class="widget-summary">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon">
                                            <i class="fa fa-users"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h4 class="title">Nombre de Client</h4>
                                            <div class="info">
                                                <strong class="amount"><?= $client_cls->count_client(); ?></strong>
                                            </div>
                                        </div>
                                        <div class="summary-footer">
                                            <a class="text-uppercase" href="index.php?view=admin_sha&sub=client">(Liste des Clients)</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-md-6">
                        <section class="panel">
                            <div class="panel-body bg-primary">
                                <div class="widget-summary">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon">
                                            <i class="fa fa-cubes"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h4 class="title">Nombre d'articles</h4>
                                            <div class="info">
                                                <strong class="amount"><?= $produit_cls->count_produits(); ?></strong>
                                            </div>
                                        </div>
                                        <div class="summary-footer">
                                            <a class="text-uppercase" href="index.php?view=admin_sha&sub=produits">(Liste des produits)</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <section class="panel">
                    <div class="panel-body">
                        <div class="chart chart-md" id="morrisLine"></div>
                        <script type="text/javascript">

                            var morrisLineData = [{
                                y: '2006',
                                a: 100,
                                b: 90
                            }, {
                                y: '2007',
                                a: 75,
                                b: 65
                            }, {
                                y: '2008',
                                a: 50,
                                b: 40
                            }, {
                                y: '2009',
                                a: 75,
                                b: 65
                            }, {
                                y: '2010',
                                a: 50,
                                b: 40
                            }, {
                                y: '2011',
                                a: 75,
                                b: 65
                            }, {
                                y: '2012',
                                a: 100,
                                b: 90
                            }, {
                                y: '2013',
                                a: 75,
                                b: 65
                            }, {
                                y: '2014',
                                a: 100,
                                b: 90
                            }];

                            // See: assets/javascripts/ui-elements/examples.charts.js for more settings.

                        </script>
                    </div>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tabs tabs-primary">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#client" aria-expanded="true"><i class="fa fa-users"></i> Derniers Clients</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#produit" aria-expanded="true"><i class="fa fa-cubes"></i> Prochaine Sortie</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#cmd" aria-expanded="false"><i class="fa fa-shopping-cart"></i> Dernières Commandes</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="client">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Identité</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql_client = $DB->query("SELECT * FROM client ORDER BY nom_client ASC LIMIT 5");
                                foreach($sql_client as $client){
                                ?>
                                    <tr>
                                        <td><?= $client->idclient; ?></td>
                                        <td>
                                            <strong><?= $client->nom_client; ?> <?= $client->prenom_client; ?></strong><br>
                                            <i><strong>Email:</strong> <?= $client->email; ?></i>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-xs" href="index.php?view=admin_sha&sub=client&data=view_client&idclient=<?= $client->idclient; ?>"><i class="fa fa-eye"></i> Voir le produit</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="produit">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Réf.</th>
                                            <th>Images</th>
                                            <th>Désignation</th>
                                            <th>Date de Sortie</th>
                                            <th>Prix de Vente</th>
                                            <th>Stock</th>
                                            <th>Statut</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sql_produit = $DB->query("SELECT * FROM produits ORDER BY id DESC LIMIT 5");
                                    foreach($sql_produit as $produit):
                                        $cat = $DB->query("SELECT * FROM produits_categorie, categorie WHERE produits_categorie.idcategorie = categorie.id AND ref_produit = :ref_produit", array(
                                            "ref_produit" => $produit->ref_produit
                                        ));
                                    ?>
                                        <tr>
                                            <td><?= $produit->ref_produit; ?></td>
                                            <td>
                                                <a href="<?= $constante->getUrl(array(), false, true); ?>produit/cards/<?= $produit->ref_produit; ?>.jpg" data-plugin-lightbox data-plugin-options='{ "type":"image" }' title="Caption. Can be aligned it to any side and contain any HTML.">
                                                    <img class="img-responsive" src="<?= $constante->getUrl(array(), false, true); ?>produit/cards/<?= $produit->ref_produit; ?>.jpg" width="80">
                                                </a>
                                            </td>
                                            <td>
                                                <?= html_entity_decode($produit->designation); ?><br>
                                                <i><?= $cat[0]->designation_cat; ?></i>
                                            </td>
                                            <td><?= $date_format->formatage("d/m/Y", $produit->date_sortie); ?></td>
                                            <td><?= $fonction->number_decimal($produit->prix_vente); ?></td>
                                            <td>
                                                <?php
                                                switch($produit->statut_stock)
                                                {
                                                    case 0:
                                                        echo "<span class='text-danger'><i class='fa fa-circle'></i> Rupture</span>";
                                                        break;
                                                    case 1:
                                                        echo "<span class='text-warning'><i class='fa fa-circle'></i> Réassort Prévue le <strong>".$date_format->formatage('d/m/Y', $produit->date_reassort)."</strong></span>";
                                                        break;
                                                    case 2:
                                                        echo "<span class='text-success'><i class='fa fa-check-circle'></i> OK (".$produit->stock.")</span>";
                                                        break;
                                                    case 3:
                                                        echo "<span class='text-primary'><i class='fa fa-arrow-circle-down'></i> En Précommande Uniquement</span>";
                                                        break;
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                switch($produit->statut_global)
                                                {
                                                    case 1:
                                                        echo "<span class='label label-dark'>Courant</span>";
                                                        break;
                                                    case 2:
                                                        echo "<span class='label label-primary'>Précommande</span>";
                                                        break;
                                                    case 3:
                                                        echo "<span class='label label-warning'>Promotion</span>";
                                                        break;
                                                    case 4:
                                                        echo "<span class='label label-danger'>Nouveauté</span>";
                                                        break;
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary btn-xs" href="index.php?view=admin_sha&sub=produit&data=view_produit&ref_produit=<?= $produit->ref_produit; ?>"><i class="fa fa-eye"></i> Voir le produit</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="cmd">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>N° Commande</th>
                                            <th>Date de la Commande</th>
                                            <th>Client</th>
                                            <th>Total</th>
                                            <th>Statut</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sql_cmd = $DB->query("SELECT * FROM commande, client WHERE commande.idclient = client.idclient ORDER BY date_commande ASC LIMIT 5");
                                    foreach ($sql_cmd as $cmd):
                                    ?>
                                        <tr>
                                            <td><?= $cmd->num_commande; ?></td>
                                            <td><?= $date_format->formatage("d/m/Y", $cmd->date_commande); ?></td>
                                            <td><?= $cmd->nom_client; ?> <?= $cmd->prenom_client; ?></td>
                                            <td><?= $fonction->number_decimal($cmd->total_commande + $cmd->prix_envoie); ?></td>
                                            <td>
                                                <?php
                                                switch($cmd->statut)
                                                {
                                                    case 1:
                                                        echo "<span class='label label-default'>En Attente de Validation</span>";
                                                        break;

                                                    case 2:
                                                        echo "<span class='label label-primary'>En Attente de Paiement</span>";
                                                        break;

                                                    case 3:
                                                        echo "<span class='label label-success'>Paiement Valider</span>";
                                                        break;

                                                    case 4:
                                                        echo "<span class='label label-warning'>Préparation en cours...</span>";
                                                        break;

                                                    case 5:
                                                        echo "<span class='label label-success'>Expédié</span>";
                                                        break;

                                                    case 6:
                                                        echo "<span class='label label-danger'>Paiement Refuser</span>";
                                                        break;

                                                    case 7:
                                                        echo "<span class='label label-default'>Commande Annulé</span>";
                                                        break;
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary btn-xs" href="index.php?view=admin_sha&sub=commande&data=view_commande&num_commande=<?= $cmd->num_commande; ?>"><i class="fa fa-eye"></i> Voir la commande</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end: page -->
    </section>
<?php endif; ?>
<?php if(isset($_GET['sub']) && $_GET['sub'] == 'client'): ?>
    <?php if(!isset($_GET['data'])): ?>
        <section role="main" class="content-body">
            <header class="page-header">
                <h2><i class="fa fa-users"></i> CLIENT</h2>

                <div class="right-wrapper pull-right">
                    <ol class="breadcrumbs">
                        <li>
                            <a href="index.php?view=admin_sha">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li><span>Client</span></li>
                    </ol>

                    <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
                </div>
            </header>

            <!-- start: page -->
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <?php
                        $sql_client = $DB->query("SELECT * FROM client ORDER BY nom_client ASC");
                        foreach ($sql_client as $client):
                            ?>
                            <div class="col-md-4">
                                <section class="panel">
                                    <header class="panel-heading bg-primary">

                                        <div class="widget-profile-info">
                                            <div class="profile-picture">
                                                <img src="assets/images/logo.png">
                                            </div>
                                            <div class="profile-info">
                                                <h4 class="name text-weight-semibold"><?= $client->nom_client; ?> <?= $client->prenom_client; ?></h4>
                                                <h5 class="role"><?= $client->email; ?></h5>
                                                <div class="profile-footer">
                                                    <a href="index.php?view=admin_sha&sub=client&data=view_client&idclient=<?= $client->idclient; ?>">(Voir le Client)</a>
                                                </div>
                                            </div>
                                        </div>

                                    </header>
                                    <div class="panel-body">
                                        <table style="width: 100%;">
                                            <tr>
                                                <td style="width: 40%; border-bottom: 1px solid #ccc; padding: 4px 4px 4px 4px;">Compte PSN</td>
                                                <td style="width: 60%; text-align: right; border-bottom: 1px solid #ccc; padding: 4px 4px 4px 4px;">
                                                    <?php if(!empty($client->pseudo_psn)){ ?>
                                                        <i class="fa fa-check-circle fa-lg text-success"></i>
                                                    <?php }else{ ?>
                                                        <i class="fa fa-times-circle fa-lg text-danger"></i>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; border-bottom: 1px solid #ccc; padding: 4px 4px 4px 4px;">Compte Xbox Live</td>
                                                <td style="width: 60%; text-align: right; border-bottom: 1px solid #ccc; padding: 4px 4px 4px 4px;">
                                                    <?php if(!empty($client->pseudo_xbox)){ ?>
                                                        <i class="fa fa-check-circle fa-lg text-success"></i>
                                                    <?php }else{ ?>
                                                        <i class="fa fa-times-circle fa-lg text-danger"></i>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; border-bottom: 1px solid #ccc; padding: 4px 4px 4px 4px;">Compte Steam</td>
                                                <td style="width: 60%; text-align: right; border-bottom: 1px solid #ccc; padding: 4px 4px 4px 4px;">
                                                    <?php if(!empty($client->pseudo_steam)){ ?>
                                                        <i class="fa fa-check-circle fa-lg text-success"></i>
                                                    <?php }else{ ?>
                                                        <i class="fa fa-times-circle fa-lg text-danger"></i>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </section>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-md-3 well">
                    <button type="button" class="mb-xs mt-xs mr-xs modal-basic btn btn-primary btn-block" href="#add-client"><i class="fa fa-user-plus"></i> Ajouter un client</button>
                </div>
                <div id="add-client" class="modal-block modal-block-lg modal-header-color modal-block-primary mfp-hide">
                    <section class="panel">
                        <header class="panel-heading">
                            <h2 class="panel-title">Nouveau Client</h2>
                        </header>
                        <form id="summary-form" class="form-horizontal" action="core/account.php" method="post">
                            <div class="panel-body">
                                <div class="modal-wrapper">
                                    <div class="validation-message">
                                        <ul></ul>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="account">Adresse Mail <span class="required">*</span></label>
                                        <div class="col-md-9">
                                            <input id="account" type="email" name="email" class="form-control" required title="Entrez une adresse Mail Valide !">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="account">Mot de Passe <span class="required">*</span></label>
                                        <div class="col-md-9">
                                            <input type="password" id="account" name="password" class="form-control" required title="Entrez un mot de Passe Valide !">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="account">Nom <span class="required">*</span></label>
                                        <div class="col-md-3">
                                            <input type="text" id="account" name="nom_client" class="form-control" required title="Entrez un nom de famille Valide">
                                        </div>
                                        <label class="col-md-3 control-label" for="account">Prénom <span class="required">*</span></label>
                                        <div class="col-md-3">
                                            <input type="text" id="account" name="prenom_client" class="form-control" required title="Entrez un Prénom Valide">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <footer class="panel-footer">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <button class="btn btn-primary" type="submit" name="action" value="create-account">Valider</button>
                                        <button class="btn btn-default modal-dismiss">Annuler</button>
                                    </div>
                                </div>
                            </footer>
                        </form>
                    </section>
                </div>
            </div>
            <!-- end: page -->
        </section>
    <?php endif; ?>
    <?php if(isset($_GET['data']) && $_GET['data'] == 'view_client'): ?>
        <?php
        $idclient = $_GET['idclient'];
        $client = $DB->query("SELECT * FROM client WHERE idclient = :idclient", array(
            "idclient"      => $idclient
        ));
        ?>
        <section role="main" class="content-body">
            <header class="page-header">
                <h2><i class="fa fa-users"></i> <?= $client[0]->nom_client; ?> <?= $client[0]->prenom_client; ?></h2>

                <div class="right-wrapper pull-right">
                    <ol class="breadcrumbs">
                        <li>
                            <a href="index.php?view=admin_sha">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li><span>Client</span></li>
                    </ol>

                    <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
                </div>
            </header>

            <!-- start: page -->
            <div class="row">
                <div class="col-md-4">
                    <section class="panel panel-group">
                        <header class="panel-heading bg-primary">

                            <div class="widget-profile-info">
                                <div class="profile-picture">
                                    <img src="assets/images/logo.png">
                                </div>
                                <div class="profile-info">
                                    <h4 class="name text-weight-semibold"><?= $client[0]->nom_client; ?> <?= $client[0]->prenom_client; ?></h4>
                                    <h5 class="role"><?= $client[0]->email; ?></h5>
                                    <div class="profile-footer" style="display: inline-flex; float: right;">
                                        <?php if(!empty($client[0]->pseudo_psn)){ ?>
                                            <img src="<?= $constante->getUrl(array(''), false, true); ?>autre/icone/psn.png" width="20" class="img-responsive" style="margin-right: 12px;"/>
                                        <?php }else{ ?>
                                            <img src="<?= $constante->getUrl(array(''), false, true); ?>autre/icone/psn.png" width="20" class="img-responsive" style="opacity: 0.2;margin-right: 12px;"/>
                                        <?php } ?>
                                        <?php if(!empty($client[0]->pseudo_xbox)){ ?>
                                            <img src="<?= $constante->getUrl(array(''), false, true); ?>autre/icone/xbox.png" width="20" class="img-responsive" style="margin-right: 12px;"/>
                                        <?php }else{ ?>
                                            <img src="<?= $constante->getUrl(array(''), false, true); ?>autre/icone/xbox.png" width="20" class="img-responsive" style="opacity: 0.2;margin-right: 12px;"/>
                                        <?php } ?>
                                        <?php if(!empty($client[0]->pseudo_steam)){ ?>
                                            <img src="<?= $constante->getUrl(array(''), false, true); ?>autre/icone/steam.png" width="20" class="img-responsive" style="margin-right: 12px;"/>
                                        <?php }else{ ?>
                                            <img src="<?= $constante->getUrl(array(''), false, true); ?>autre/icone/steam.png" width="20" class="img-responsive" style="opacity: 0.2;margin-right: 12px;"/>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                        </header>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4" style="border-right: solid 1px #ccc;">
                                    <div class="h2 text-weight-bold mb-none mt-lg text-center">0</div>
                                    <p class="text-muted mb-none text-center">Commandes</p>
                                </div>
                                <div class="col-md-4" style="border-right: solid 1px #ccc;">
                                    <div class="h2 text-weight-bold mb-none mt-lg text-center">0</div>
                                    <p class="text-muted mb-none text-center">Points</p>
                                </div>
                                <div class="col-md-4" style="border-right: solid 1px #ccc;">
                                    <div class="h2 text-weight-bold mb-none mt-lg text-center">0</div>
                                    <p class="text-muted mb-none text-center">Réservations</p>
                                </div>
                            </div>
                            <div style="margin-top: 10px; margin-bottom: 10px;"></div>
                            <hr class="solid short mt-lg" />
                            <div style="margin-top: 10px; margin-bottom: 10px;"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table style="width: 100%;">
                                        <tr>
                                            <td style="padding: 10px 10px 10px 10px; font-weight: bold; font-size: 16px;">NewsLetter</td>
                                            <td style="text-align: right; padding: 10px 10px 10px 10px;">
                                                <?php if($newsletter_cls->count_newsletter($client[0]->idclient) == 1){ ?>
                                                    <i class="fa fa-check-circle text-success fa-2x"></i>
                                                <?php }else{ ?>
                                                    <i class="fa fa-times-circle text-danger fa-2x"></i>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-8">
                    <div class="tabs tabs-vertical tabs-left tabs-primary">
                        <ul class="nav nav-tabs col-sm-3 col-xs-5">
                            <li class="active">
                                <a data-toggle="tab" href="#adresse"><i class="fa fa-book"></i> Adresse</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#achat"><i class="fa fa-shopping-cart"></i> Commandes</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#vourcher"><i class="fa fa-ticket"></i> Bon D'achat</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#reservation"><i class="fa fa-calendar"></i> Réservation </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="adresse">
                                <div class="well">
                                    <button type="button" class="mb-xs mt-xs mr-xs modal-basic btn btn-primary" href="#add-adresse"><i class="fa fa-plus-square"></i> Ajouter une Adresse</button>
                                </div>
                                <h3>ADRESSE DE FACTURATION</h3>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Alias</th>
                                                <th>Identité</th>
                                                <th>Adresse</th>
                                                <th>Coordonnées</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $sql_adresse_fact = $DB->query("SELECT * FROM client_adresse_fact WHERE idclient = :idclient", array(
                                            "idclient"      => $client[0]->idclient
                                        ));
                                        foreach ($sql_adresse_fact as $fact):
                                        ?>
                                            <tr>
                                                <td><?php if($fact->default == 1){echo "<i class='fa fa-star fa-2x text-danger'></i>";} ?></td>
                                                <td><?= html_entity_decode($fact->alias); ?></td>
                                                <td>
                                                    <?php if(!empty($fact->societe)){echo "<strong>".$fact->societe."</strong><br><i>".$fact->nom." ".$fact->prenom."</i>";}else{echo "<strong>".$fact->nom." ".$fact->prenom."</strong>";} ?><br>
                                                </td>
                                                <td>
                                                    <?= html_entity_decode($fact->adresse); ?><br>
                                                    <?= $fact->code_postal; ?> <?= html_entity_decode($fact->ville); ?><br>
                                                    France
                                                </td>
                                                <td>
                                                    <i class="fa fa-phone"></i> : <?= $fact->telephone; ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-primary"><i class="fa fa-remove"></i></a>
                                                    <?php if($fact->default == 0){ ?>
                                                        <button type="button" class="btn btn-success"><i class="fa fa-star"></i></button>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <h3>ADRESSE DE LIVRAISON</h3>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>Alias</th>
                                            <th>Identité</th>
                                            <th>Adresse</th>
                                            <th>Coordonnées</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $sql_adresse_liv = $DB->query("SELECT * FROM client_adresse_liv WHERE idclient = :idclient", array(
                                            "idclient"      => $client[0]->idclient
                                        ));
                                        foreach ($sql_adresse_liv as $liv):
                                            ?>
                                            <tr>
                                                <td><?php if($liv->default == 1){echo "<i class='fa fa-star fa-2x text-danger'></i>";} ?></td>
                                                <td><?= html_entity_decode($liv->alias); ?></td>
                                                <td>
                                                    <?php if(!empty($liv->societe)){echo "<strong>".$liv->societe."</strong><br><i>".$liv->nom." ".$liv->prenom."</i>";}else{echo "<strong>".$liv->nom." ".$liv->prenom."</strong>";} ?><br>
                                                </td>
                                                <td>
                                                    <?= html_entity_decode($liv->adresse); ?><br>
                                                    <?= $liv->code_postal; ?> <?= html_entity_decode($liv->ville); ?><br>
                                                    France
                                                </td>
                                                <td>
                                                    <i class="fa fa-phone"></i> : <?= $liv->telephone; ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-primary"><i class="fa fa-remove"></i></a>
                                                    <?php if($liv->default == 0){ ?>
                                                        <button type="button" class="btn btn-success"><i class="fa fa-star"></i></button>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="recent11">
                                <p>Recent</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat.</p>
                            </div>
                        </div>
                        <div id="add-adresse" class="modal-block modal-block-lg modal-header-color modal-block-primary mfp-hide">
                            <section class="panel">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Nouveau Client</h2>
                                </header>
                                <form id="summary-form" class="form-horizontal" action="core/account.php" method="post">
                                    <div class="panel-body">
                                        <div class="modal-wrapper">
                                            <div class="validation-message">
                                                <ul></ul>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="account">Adresse Mail <span class="required">*</span></label>
                                                <div class="col-md-9">
                                                    <input id="account" type="email" name="email" class="form-control" required title="Entrez une adresse Mail Valide !">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="account">Mot de Passe <span class="required">*</span></label>
                                                <div class="col-md-9">
                                                    <input type="password" id="account" name="password" class="form-control" required title="Entrez un mot de Passe Valide !">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="account">Nom <span class="required">*</span></label>
                                                <div class="col-md-3">
                                                    <input type="text" id="account" name="nom_client" class="form-control" required title="Entrez un nom de famille Valide">
                                                </div>
                                                <label class="col-md-3 control-label" for="account">Prénom <span class="required">*</span></label>
                                                <div class="col-md-3">
                                                    <input type="text" id="account" name="prenom_client" class="form-control" required title="Entrez un Prénom Valide">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <footer class="panel-footer">
                                        <div class="row">
                                            <div class="col-md-12 text-right">
                                                <button class="btn btn-primary" type="submit" name="action" value="create-account">Valider</button>
                                                <button class="btn btn-default modal-dismiss">Annuler</button>
                                            </div>
                                        </div>
                                    </footer>
                                </form>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: page -->
        </section>
    <?php endif; ?>
<?php endif; ?>
