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
                            <a data-toggle="tab" href="#produit" aria-expanded="true"><i class="fa fa-cubes"></i> Derniers Produits</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#cmd" aria-expanded="false"><i class="fa fa-shopping-cart"></i> Dernières Commandes</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="popular1">
                            <p>Popular</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat.</p>
                        </div>
                        <div class="tab-pane" id="recent1">
                            <p>Recent</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end: page -->
    </section>
<?php endif; ?>
