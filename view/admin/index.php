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
                                            <a class="btn btn-primary btn-xs" href=""><i class="fa fa-eye"></i> Voir le produit</a>
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
                                            <td></td>
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
