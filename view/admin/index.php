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
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                    <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                </div>

                <h2 class="panel-title">Basic with Table Tools</h2>
            </header>
            <div class="panel-body">
                <table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
                    <thead>
                    <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th class="hidden-phone">Engine version</th>
                        <th class="hidden-phone">CSS grade</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="gradeX">
                        <td>Trident</td>
                        <td>Internet
                            Explorer 4.0
                        </td>
                        <td>Win 95+</td>
                        <td class="center hidden-phone">4</td>
                        <td class="center hidden-phone">X</td>
                    </tr>
                    <tr class="gradeC">
                        <td>Trident</td>
                        <td>Internet
                            Explorer 5.0
                        </td>
                        <td>Win 95+</td>
                        <td class="center hidden-phone">5</td>
                        <td class="center hidden-phone">C</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Trident</td>
                        <td>Internet
                            Explorer 5.5
                        </td>
                        <td>Win 95+</td>
                        <td class="center hidden-phone">5.5</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Trident</td>
                        <td>Internet
                            Explorer 6
                        </td>
                        <td>Win 98+</td>
                        <td class="center hidden-phone">6</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Trident</td>
                        <td>Internet Explorer 7</td>
                        <td>Win XP SP2+</td>
                        <td class="center hidden-phone">7</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Trident</td>
                        <td>AOL browser (AOL desktop)</td>
                        <td>Win XP</td>
                        <td class="center hidden-phone">6</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Firefox 1.0</td>
                        <td>Win 98+ / OSX.2+</td>
                        <td class="center hidden-phone">1.7</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Firefox 1.5</td>
                        <td>Win 98+ / OSX.2+</td>
                        <td class="center hidden-phone">1.8</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Firefox 2.0</td>
                        <td>Win 98+ / OSX.2+</td>
                        <td class="center hidden-phone">1.8</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Firefox 3.0</td>
                        <td>Win 2k+ / OSX.3+</td>
                        <td class="center hidden-phone">1.9</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Camino 1.0</td>
                        <td>OSX.2+</td>
                        <td class="center hidden-phone">1.8</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Camino 1.5</td>
                        <td>OSX.3+</td>
                        <td class="center hidden-phone">1.8</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Netscape 7.2</td>
                        <td>Win 95+ / Mac OS 8.6-9.2</td>
                        <td class="center hidden-phone">1.7</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Netscape Browser 8</td>
                        <td>Win 98SE+</td>
                        <td class="center hidden-phone">1.7</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Netscape Navigator 9</td>
                        <td>Win 98+ / OSX.2+</td>
                        <td class="center hidden-phone">1.8</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Mozilla 1.0</td>
                        <td>Win 95+ / OSX.1+</td>
                        <td class="center hidden-phone">1</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Mozilla 1.1</td>
                        <td>Win 95+ / OSX.1+</td>
                        <td class="center hidden-phone">1.1</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Mozilla 1.2</td>
                        <td>Win 95+ / OSX.1+</td>
                        <td class="center hidden-phone">1.2</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Mozilla 1.3</td>
                        <td>Win 95+ / OSX.1+</td>
                        <td class="center hidden-phone">1.3</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Mozilla 1.4</td>
                        <td>Win 95+ / OSX.1+</td>
                        <td class="center hidden-phone">1.4</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Mozilla 1.5</td>
                        <td>Win 95+ / OSX.1+</td>
                        <td class="center hidden-phone">1.5</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Mozilla 1.6</td>
                        <td>Win 95+ / OSX.1+</td>
                        <td class="center hidden-phone">1.6</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Mozilla 1.7</td>
                        <td>Win 98+ / OSX.1+</td>
                        <td class="center hidden-phone">1.7</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Mozilla 1.8</td>
                        <td>Win 98+ / OSX.1+</td>
                        <td class="center hidden-phone">1.8</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Seamonkey 1.1</td>
                        <td>Win 98+ / OSX.2+</td>
                        <td class="center hidden-phone">1.8</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Epiphany 2.20</td>
                        <td>Gnome</td>
                        <td class="center hidden-phone">1.8</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Webkit</td>
                        <td>Safari 1.2</td>
                        <td>OSX.3</td>
                        <td class="center hidden-phone">125.5</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Webkit</td>
                        <td>Safari 1.3</td>
                        <td>OSX.3</td>
                        <td class="center hidden-phone">312.8</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Webkit</td>
                        <td>Safari 2.0</td>
                        <td>OSX.4+</td>
                        <td class="center hidden-phone">419.3</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Webkit</td>
                        <td>Safari 3.0</td>
                        <td>OSX.4+</td>
                        <td class="center hidden-phone">522.1</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Webkit</td>
                        <td>OmniWeb 5.5</td>
                        <td>OSX.4+</td>
                        <td class="center hidden-phone">420</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Webkit</td>
                        <td>iPod Touch / iPhone</td>
                        <td>iPod</td>
                        <td class="center hidden-phone">420.1</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Webkit</td>
                        <td>S60</td>
                        <td>S60</td>
                        <td class="center hidden-phone">413</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Presto</td>
                        <td>Opera 7.0</td>
                        <td>Win 95+ / OSX.1+</td>
                        <td class="center hidden-phone">-</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Presto</td>
                        <td>Opera 7.5</td>
                        <td>Win 95+ / OSX.2+</td>
                        <td class="center hidden-phone">-</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Presto</td>
                        <td>Opera 8.0</td>
                        <td>Win 95+ / OSX.2+</td>
                        <td class="center hidden-phone">-</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Presto</td>
                        <td>Opera 8.5</td>
                        <td>Win 95+ / OSX.2+</td>
                        <td class="center hidden-phone">-</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Presto</td>
                        <td>Opera 9.0</td>
                        <td>Win 95+ / OSX.3+</td>
                        <td class="center hidden-phone">-</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Presto</td>
                        <td>Opera 9.2</td>
                        <td>Win 88+ / OSX.3+</td>
                        <td class="center hidden-phone">-</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Presto</td>
                        <td>Opera 9.5</td>
                        <td>Win 88+ / OSX.3+</td>
                        <td class="center hidden-phone">-</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Presto</td>
                        <td>Opera for Wii</td>
                        <td>Wii</td>
                        <td class="center hidden-phone">-</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Presto</td>
                        <td>Nokia N800</td>
                        <td>N800</td>
                        <td class="center hidden-phone">-</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Presto</td>
                        <td>Nintendo DS browser</td>
                        <td>Nintendo DS</td>
                        <td class="center hidden-phone">8.5</td>
                        <td class="center hidden-phone">C/A<sup>1</sup></td>
                    </tr>
                    <tr class="gradeC">
                        <td>KHTML</td>
                        <td>Konqureror 3.1</td>
                        <td>KDE 3.1</td>
                        <td class="center hidden-phone">3.1</td>
                        <td class="center hidden-phone">C</td>
                    </tr>
                    <tr class="gradeA">
                        <td>KHTML</td>
                        <td>Konqureror 3.3</td>
                        <td>KDE 3.3</td>
                        <td class="center hidden-phone">3.3</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>KHTML</td>
                        <td>Konqureror 3.5</td>
                        <td>KDE 3.5</td>
                        <td class="center hidden-phone">3.5</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeX">
                        <td>Tasman</td>
                        <td>Internet Explorer 4.5</td>
                        <td>Mac OS 8-9</td>
                        <td class="center hidden-phone">-</td>
                        <td class="center hidden-phone">X</td>
                    </tr>
                    <tr class="gradeC">
                        <td>Tasman</td>
                        <td>Internet Explorer 5.1</td>
                        <td>Mac OS 7.6-9</td>
                        <td class="center hidden-phone">1</td>
                        <td class="center hidden-phone">C</td>
                    </tr>
                    <tr class="gradeC">
                        <td>Tasman</td>
                        <td>Internet Explorer 5.2</td>
                        <td>Mac OS 8-X</td>
                        <td class="center hidden-phone">1</td>
                        <td class="center hidden-phone">C</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Misc</td>
                        <td>NetFront 3.1</td>
                        <td>Embedded devices</td>
                        <td class="center hidden-phone">-</td>
                        <td class="center hidden-phone">C</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Misc</td>
                        <td>NetFront 3.4</td>
                        <td>Embedded devices</td>
                        <td class="center hidden-phone">-</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeX">
                        <td>Misc</td>
                        <td>Dillo 0.8</td>
                        <td>Embedded devices</td>
                        <td class="center hidden-phone">-</td>
                        <td class="center hidden-phone">X</td>
                    </tr>
                    <tr class="gradeX">
                        <td>Misc</td>
                        <td>Links</td>
                        <td>Text only</td>
                        <td class="center hidden-phone">-</td>
                        <td class="center hidden-phone">X</td>
                    </tr>
                    <tr class="gradeX">
                        <td>Misc</td>
                        <td>Lynx</td>
                        <td>Text only</td>
                        <td class="center hidden-phone">-</td>
                        <td class="center hidden-phone">X</td>
                    </tr>
                    <tr class="gradeC">
                        <td>Misc</td>
                        <td>IE Mobile</td>
                        <td>Windows Mobile 6</td>
                        <td class="center hidden-phone">-</td>
                        <td class="center hidden-phone">C</td>
                    </tr>
                    <tr class="gradeC">
                        <td>Misc</td>
                        <td>PSP browser</td>
                        <td>PSP</td>
                        <td class="center hidden-phone">-</td>
                        <td class="center hidden-phone">C</td>
                    </tr>
                    <tr class="gradeU">
                        <td>Other browsers</td>
                        <td>All others</td>
                        <td>-</td>
                        <td class="center hidden-phone">-</td>
                        <td class="center hidden-phone">U</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <!-- end: page -->
    </section>
<?php endif; ?>
