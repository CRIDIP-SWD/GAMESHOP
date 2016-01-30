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
            <div class="col-md-12">
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
                <div class="col-md-12">
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
            </div>
            <section class="panel panel-featured panel-featured-primary">
                <header class="panel-heading">
                    <h2 class="panel-title">LISTE DES ADRESSES</h2>
                </header>
                <div class="panel-body">
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
                                        <a class="btn btn-danger" href="core/admin/client.php?action=supp-adresse&type=facturation&idclient=<?= $idclient; ?>&idadresse=<?= $fact->idadresse; ?>"><i class="fa fa-remove"></i></a>
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
                                        <a class="btn btn-danger" href="core/admin/client.php?action=supp-adresse&type=livraison&idclient=<?= $idclient; ?>&idadresse=<?= $liv->idadresse; ?>"><i class="fa fa-remove"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
            <section class="panel panel-featured panel-featured-primary">
                <header class="panel-heading">
                    <h2 class="panel-title">LISTE DES COMMANDES</h2>
                </header>
                <div class="panel-body">
                    <div class="well">
                        <button type="button" class="mb-xs mt-xs mr-xs modal-basic btn btn-primary" href="#add-commande"><i class="fa fa-plus-circle"></i> Nouvelle Commande</button>
                    </div>
                    <h2>LISTE DES COMMANDES</h2>
                    <div class="">
                        <table class="table table-bordered table-striped mb-none" id="datatable-default">
                            <thead>
                            <tr>
                                <th>N° de Commande</th>
                                <th>Date de la Commande</th>
                                <th>Total</th>
                                <th>Livraison</th>
                                <th>Paiement</th>
                                <th>Etat</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql_cmd = $DB->query("SELECT * FROM commande WHERE idclient = :idclient", array(
                                "idclient"  => $idclient
                            ));
                            foreach($sql_cmd as $cmd):
                                ?>
                                <tr>
                                    <td><?= $cmd->num_commande; ?></td>
                                    <td><?= $date_format->formatage("d/m/Y", $cmd->date_commande); ?></td>
                                    <td><?= $fonction->number_decimal($cmd->total_commande); ?></td>
                                    <td>
                                        <strong>Adresse:</strong> <?= html_entity_decode($cmd->adresse_liv); ?><br>
                                        <strong>Prix de l'envoie:</strong> <?= $fonction->number_decimal($cmd->prix_envoie); ?><br>
                                        <strong>Methode:</strong> <?= $cmd->methode_livraison; ?><br>
                                        <strong>Date de Livraison:</strong> <?= $date_format->formatage("d/m/Y", $cmd->date_livraison); ?>
                                    </td>
                                    <td>
                                        <strong>Methode:</strong> <?= $cmd->methode_paiement; ?><br>
                                    </td>
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
                                        <a class="btn btn-primary" href="index.php?view=admin_sha&sub=commande&data=view_commande&num_commande=<?= $cmd->num_commande; ?>"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
            <div id="add-adresse" class="modal-block modal-block-lg modal-header-color modal-block-primary mfp-hide">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Nouvelle adresse</h2>
                    </header>
                    <form id="summary-form" class="form-horizontal" action="core/admin/client.php" method="post">
                        <input type="hidden" name="idclient" value="<?= $idclient; ?>" />
                        <div class="panel-body">
                            <div class="modal-wrapper">

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="account">Type d'adresse</label>
                                    <div class="col-md-9">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="type_adresse" id="account" value="1">
                                                Facturation
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="type_adresse" id="account" value="2">
                                                Livraison
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="account">Alias <span class="required">*</span></label>
                                    <div class="col-md-9">
                                        <input id="account" type="text" name="alias" class="form-control" required title="Champs Requis">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="account">Société</label>
                                    <div class="col-md-9">
                                        <input id="account" type="text" name="societe" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="account">Nom <span class="required">*</span> </label>
                                    <div class="col-md-4">
                                        <input type="text" id="account" name="nom" class="form-control" required title="Champs Requis">
                                    </div>
                                    <label class="col-md-2 control-label" for="account">Prénom <span class="required">*</span> </label>
                                    <div class="col-md-4">
                                        <input type="text" id="account" name="prenom" class="form-control" required title="Champs Requis">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="account">N° de Téléphone <span class="required">*</span></label>
                                    <div class="col-md-9">
                                        <input id="account" type="text" name="telephone" class="form-control" required title="Champs Requis">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="account">Adresse <span class="required">*</span></label>
                                    <div class="col-md-9">
                                        <input id="account" type="text" name="adresse" class="form-control" required title="Champs Requis">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="account">Code Postal <span class="required">*</span> </label>
                                    <div class="col-md-3">
                                        <input type="text" id="account" name="code_postal" class="form-control" required title="Champs Requis">
                                    </div>
                                    <label class="col-md-2 control-label" for="account">Ville <span class="required">*</span> </label>
                                    <div class="col-md-5">
                                        <input type="text" id="account" name="ville" class="form-control" required title="Champs Requis">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="account">Adresse par default</label>
                                    <div class="col-md-9">
                                        <div class="switch switch-sm switch-primary">
                                            <input type="checkbox" name="default" data-plugin-ios-switch id="account" />
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-primary" type="submit" name="action" value="add-adresse">Valider</button>
                                    <button class="btn btn-default modal-dismiss">Annuler</button>
                                </div>
                            </div>
                        </footer>
                    </form>
                </section>
            </div>
            <div id="add-commande" class="modal-block modal-block-lg modal-header-color modal-block-primary mfp-hide">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Nouvelle Commande</h2>
                    </header>
                    <form id="summary-form" class="form-horizontal" action="core/admin/commande.php" method="post">
                        <input type="hidden" name="idclient" value="<?= $idclient; ?>" />
                        <div class="panel-body">
                            <div class="modal-wrapper">

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="cmd">Date de la Commande</label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            <input id="cmd" type="text" name="date_commande" data-plugin-datepicker class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Adresse de Facturation</label>
                                    <div class="col-md-9">
                                        <select data-plugin-selectTwo class="form-control populate" name="adresse_fact">
                                            <?php
                                            $sql_addresse_fact = $DB->query("SELECT * FROM client_adresse_fact WHERE idclient = :idclient", array(
                                                "idclient"      => $idclient
                                            ));
                                            foreach($sql_addresse_fact as $adresse):
                                            ?>
                                            <option value="<?= $adresse->adresse; ?><br><?= $adresse->code_postal; ?> <?= $adresse->ville; ?>"><?= $adresse->alias; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Adresse de Livraison</label>
                                    <div class="col-md-9">
                                        <select data-plugin-selectTwo class="form-control populate" name="adresse_liv">
                                            <?php
                                            $sql_addresse_liv = $DB->query("SELECT * FROM client_adresse_liv WHERE idclient = :idclient", array(
                                                "idclient"      => $idclient
                                            ));
                                            foreach($sql_addresse_liv as $adresse):
                                                ?>
                                                <option value="<?= $adresse->adresse; ?><br><?= $adresse->code_postal; ?> <?= $adresse->ville; ?>"><?= $adresse->alias; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-primary" type="submit" name="action" value="add-commande">Valider</button>
                                    <button class="btn btn-default modal-dismiss">Annuler</button>
                                </div>
                            </div>
                        </footer>
                    </form>
                </section>
            </div>
            <!-- end: page -->
        </section>
    <?php endif; ?>
<?php endif; ?>
<?php if(isset($_GET['sub']) && $_GET['sub'] == 'categories'): ?>
    <?php if(!isset($_GET['data'])): ?>
        <section role="main" class="content-body">
            <header class="page-header">
                <h2><i class="fa fa-search"></i> CATEGORIES</h2>

                <div class="right-wrapper pull-right">
                    <ol class="breadcrumbs">
                        <li>
                            <a href="index.php?view=admin_sha">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li><span>Catégorie</span></li>
                    </ol>

                    <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
                </div>
            </header>

            <!-- start: page -->
            <div class="row">
                <section class="panel panel-primary">
                    <header class="panel-heading">
                        <div class="panel-actions">
                            <a href="#add-categorie" class="mb-xs mt-xs mr-xs modal-basic panel-action" data-toggle="tooltip" data-original-title="Ajouter une catégorie"><i class="fa fa-plus-circle fa-lg"></i></a>
                            <a href="#add-subcategorie" class="mb-xs mt-xs mr-xs modal-basic panel-action" data-toggle="tooltip" data-original-title="Ajouter une sous catégorie"><i class="fa fa-plus-circle fa-lg"></i></a>
                        </div>
                        <h2 class="panel-title">Liste des Catégories</h2>
                    </header>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Désignation</th>
                                    <th>Sous catégories</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql_cat = $DB->query("SELECT * FROM categorie ORDER BY id ASC");
                                foreach($sql_cat as $cat):
                                    ?>
                                    <tr>
                                        <td><?= $cat->id; ?></td>
                                        <td><?= html_entity_decode($cat->designation_cat); ?></td>
                                        <td>
                                            <table style="width: 100%;">
                                                <?php
                                                $sql_sub = $DB->query("SELECT * FROM subcategorie WHERE idcategorie = :idcategorie", array(
                                                    "idcategorie"   => $cat->id
                                                ));
                                                foreach($sql_sub as $sub):
                                                ?>
                                                <tr>
                                                    <td><?= html_entity_decode($sub->designation_subcat); ?></td>
                                                    <td><a href="core/admin/categorie.php?action=supp-subcategorie&idsubcategorie=<?= $sub->id; ?>"><i class="fa fa-trash text-danger"></i></a></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </table>
                                        </td>
                                        <td>
                                            <a href="core/admin/categorie.php?action=supp-categorie&idcategorie=<?= $cat->id; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
            <div id="add-categorie" class="modal-block modal-block-lg modal-header-color modal-block-primary mfp-hide">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Nouvelle Catégorie</h2>
                    </header>
                    <form id="summary-form" class="form-horizontal" action="core/admin/categorie.php" method="post" enctype="multipart/form-data">
                        <div class="panel-body">
                            <div class="modal-wrapper">
                                <div class="validation-message">
                                    <ul></ul>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="cat">Désignation <span class="required">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" id="cat" class="form-control" name="designation_cat" required title="Champs Requis" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="cat">Images de la catégorie</label>
                                    <div class="col-md-9">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="input-append">
                                                <div class="uneditable-input">
                                                    <i class="fa fa-file fileupload-exists"></i>
                                                    <span class="fileupload-preview"></span>
                                                </div>
                                                <span class="btn btn-default btn-file">
                                                    <span class="fileupload-exists">Changer de Fichier</span>
                                                    <span class="fileupload-new">Sélectionner un fichier</span>
                                                    <input type="file" name="images_cat"/>
                                                </span>
                                                <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Supprimer</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-primary" type="submit" name="action" value="add-categories">Valider</button>
                                    <button class="btn btn-default modal-dismiss">Annuler</button>
                                </div>
                            </div>
                        </footer>
                    </form>
                </section>
            </div>
            <div id="add-subcategorie" class="modal-block modal-block-lg modal-header-color modal-block-primary mfp-hide">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Nouvelle Sous Catégorie</h2>
                    </header>
                    <form id="summary-form" class="form-horizontal" action="core/admin/categorie.php" method="post" enctype="multipart/form-data">
                        <div class="panel-body">
                            <div class="modal-wrapper">
                                <div class="validation-message">
                                    <ul></ul>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Catégorie <span class="required">*</span></label>
                                    <div class="col-md-9">
                                        <select data-plugin-selectTwo class="form-control populate" require name="idcategorie">
                                            <?php
                                            $sql_cat = $DB->query("SELECT * FROM categorie");
                                            foreach($sql_cat as $cat):
                                            ?>
                                            <option value="<?= $cat->id; ?>"><?= html_entity_decode($cat->designation_cat); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="cat">Désignation <span class="required">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" id="cat" class="form-control" name="designation_subcat" required title="Champs Requis" />
                                    </div>
                                </div>


                            </div>
                        </div>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-primary" type="submit" name="action" value="add-subcategorie">Valider</button>
                                    <button class="btn btn-default modal-dismiss">Annuler</button>
                                </div>
                            </div>
                        </footer>
                    </form>
                </section>
            </div>
            <!-- end: page -->
        </section>
    <?php endif; ?>
<?php endif; ?>
<?php if(isset($_GET['sub']) && $_GET['sub'] == 'produits'): ?>
    <?php if(!isset($_GET['data'])): ?>
        <section role="main" class="content-body">
            <header class="page-header">
                <h2><i class="fa fa-cubes"></i> PRODUITS</h2>

                <div class="right-wrapper pull-right">
                    <ol class="breadcrumbs">
                        <li>
                            <a href="index.php?view=admin_sha">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li><span>Produits</span></li>
                    </ol>

                    <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
                </div>
            </header>

            <!-- start: page -->
            <div class="row">
                <section class="panel panel-primary">
                    <header class="panel-heading">
                        <div class="panel-actions">
                            <a href="index.php?view=admin_sha&sub=produits&data=add-produit" class="panel-action" data-toggle="tooltip" data-original-title="Ajouter un Produit"><i class="fa fa-plus-circle fa-lg"></i></a>
                        </div>
                        <h2 class="panel-title">Liste des produits</h2>
                    </header>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped mb-none" id="datatable-default">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Réf</th>
                                                <th class="text-center">Image</th>
                                                <th class="text-center">Désignation</th>
                                                <th class="text-center">Date de Sortie</th>
                                                <th class="text-center">Prix de Vente</th>
                                                <th class="text-center">Stock</th>
                                                <th class="text-center">Statut</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $sql_product = $DB->query("SELECT * FROM produits, produits_categorie, categorie, produits_subcategorie, subcategorie WHERE produits_categorie.idcategorie = categorie.id
                                                                  AND produits_categorie.ref_produit = produits.ref_produit
                                                                  AND produits_subcategorie.idsubcategorie = subcategorie.id
                                                                  AND produits_subcategorie.ref_produit = produits.ref_produit");
                                        foreach($sql_product as $produit):
                                        ?>
                                            <tr class="gradeX">
                                                <td><?= $produit->ref_produit; ?></td>
                                                <td class="text-center">
                                                    <a class="image-popup-no-margins center" href="<?= $constante->getUrl(array(), false, true); ?>produit/cards/<?= $produit->ref_produit; ?>.jpg">
                                                        <img class="img-responsive" src="<?= $constante->getUrl(array(), false, true); ?>produit/cards/<?= $produit->ref_produit; ?>.jpg" width="75">
                                                    </a>
                                                </td>
                                                <td>
                                                    <span style=""><?= html_entity_decode($produit->designation); ?></span><br>
                                                    <span style=""><?= $produit->designation_cat; ?> - <?= $produit->designation_subcat; ?></span>
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
                        </div>
                    </div>
                </section>
            </div>
            <div id="add-categorie" class="modal-block modal-block-lg modal-header-color modal-block-primary mfp-hide">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Nouvelle Catégorie</h2>
                    </header>
                    <form id="summary-form" class="form-horizontal" action="core/admin/categorie.php" method="post" enctype="multipart/form-data">
                        <div class="panel-body">
                            <div class="modal-wrapper">
                                <div class="validation-message">
                                    <ul></ul>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="cat">Désignation <span class="required">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" id="cat" class="form-control" name="designation_cat" required title="Champs Requis" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="cat">Images de la catégorie</label>
                                    <div class="col-md-9">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="input-append">
                                                <div class="uneditable-input">
                                                    <i class="fa fa-file fileupload-exists"></i>
                                                    <span class="fileupload-preview"></span>
                                                </div>
                                                <span class="btn btn-default btn-file">
                                                    <span class="fileupload-exists">Changer de Fichier</span>
                                                    <span class="fileupload-new">Sélectionner un fichier</span>
                                                    <input type="file" name="images_cat"/>
                                                </span>
                                                <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Supprimer</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-primary" type="submit" name="action" value="add-categories">Valider</button>
                                    <button class="btn btn-default modal-dismiss">Annuler</button>
                                </div>
                            </div>
                        </footer>
                    </form>
                </section>
            </div>
            <div id="add-subcategorie" class="modal-block modal-block-lg modal-header-color modal-block-primary mfp-hide">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Nouvelle Sous Catégorie</h2>
                    </header>
                    <form id="summary-form" class="form-horizontal" action="core/admin/categorie.php" method="post" enctype="multipart/form-data">
                        <div class="panel-body">
                            <div class="modal-wrapper">
                                <div class="validation-message">
                                    <ul></ul>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Catégorie <span class="required">*</span></label>
                                    <div class="col-md-9">
                                        <select data-plugin-selectTwo class="form-control populate" require name="idcategorie">
                                            <?php
                                            $sql_cat = $DB->query("SELECT * FROM categorie");
                                            foreach($sql_cat as $cat):
                                                ?>
                                                <option value="<?= $cat->id; ?>"><?= html_entity_decode($cat->designation_cat); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="cat">Désignation <span class="required">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" id="cat" class="form-control" name="designation_subcat" required title="Champs Requis" />
                                    </div>
                                </div>


                            </div>
                        </div>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-primary" type="submit" name="action" value="add-subcategorie">Valider</button>
                                    <button class="btn btn-default modal-dismiss">Annuler</button>
                                </div>
                            </div>
                        </footer>
                    </form>
                </section>
            </div>
            <!-- end: page -->
        </section>
    <?php endif; ?>
    <?php if(isset($_GET['data']) && $_GET['data'] == 'add-produit'): ?>
        <section role="main" class="content-body">
            <header class="page-header">
                <h2><i class="fa fa-cubes"></i> PRODUITS</h2>

                <div class="right-wrapper pull-right">
                    <ol class="breadcrumbs">
                        <li>
                            <a href="index.php?view=admin_sha">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li><span>Ajout d'un Nouveau produit</span></li>
                    </ol>

                    <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
                </div>
            </header>

            <!-- start: page -->
            <div class="row">
                <section class="panel panel-success">
                    <header class="panel-heading">
                        <h2 class="panel-title"><i class="fa fa-plus-circle"></i> Ajout d'un nouveau produit</h2>
                    </header>
                    <form id="Produit" class="form-horizontal" action="core/admin/produit.php" method="post" enctype="multipart/form-data">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="data-validation-error-msg-container"></div>
                                        <ul></ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tabs tabs-vertical tabs-left tabs-success">
                                <ul class="nav nav-tabs col-sm-3 col-xs-5">
                                    <li class="active"><a href="#information" data-toggle="tab">Information</a></li>
                                    <li><a href="#prix" data-toggle="tab">Prix</a></li>
                                    <li><a href="#assoc" data-toggle="tab">Association</a></li>
                                    <li><a href="#stock" data-toggle="tab">Gestion de Stock</a></li>
                                    <li><a href="#images" data-toggle="tab">Images</a></li>
                                    <li><a href="#caracteristique" data-toggle="tab">Caractéristique</a></li>

                                </ul>
                                <div class="tab-content">
                                    <div id="information" class="tab-pane active">
                                        <h1 class="title">INFORMATION</h1>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="produit">Référence Produit <span class="required">*</span></label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="ref_produit" data-validation="alphanumeric length" data-validation-length="min2" data-validation-error-msg="Veuillez rentrer une Référence valide"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="produit">Désignation <span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="designation" required title="Veuillez entrez une Désignation (nom du produit)" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="textareaDefault">Courte description</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" name="short_description" rows="3" data-plugin-maxlength maxlength="200"></textarea>
                                                <p>
                                                    200 caractère maximum
                                                </p>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="long_description">Longue description</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" name="long_description" rows="5" id="long_description"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div id="prix" class="tab-pane">
                                        <h1 class="title">Tarif</h1>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="produit">Prix de Vente <span class="required">*</span> </label>
                                            <div class="col-md-3">
                                                <input type="text" id="prix_vente" class="form-control" name="prix_vente" onkeyup="calcul();" value="0" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Veuillez rentrer un chiffre Valide">
                                                <p>Prix de Vente TTC + Marge Brut</p>
                                                <p>Tarif en séparateur de (.)</p>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="revenue_point">Point pour le client</label>
                                            <div class="col-md-3">
                                                <input type="text" id="revenue_point" readonly="readonly" class="form-control" name="revenue_point" value="0">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="cout_point">Cout en point</label>
                                            <div class="col-md-3">
                                                <input type="text" id="cout_point" readonly="readonly" class="form-control" name="cout_point" value="0">
                                            </div>
                                        </div>


                                    </div>
                                    <div id="assoc" class="tab-pane">
                                        <h1 class="title">ASSOCIATION DE CATEGORIE</h1>

                                        <div class="form-group">
                                            <label class="control-label col-md-3" for="produit">Catégorie</label>
                                            <div class="col-md-6">
                                                <select data-plugin-selectTwo id="produit" name="idcategorie" class="form-control populate">
                                                    <?php
                                                    $sql_cat = $DB->query("SELECT * FROM categorie");
                                                    foreach($sql_cat as $cat):
                                                    ?>
                                                    <option value="<?= $cat->id; ?>"><?= html_entity_decode($cat->designation_cat); ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3" for="produit">Sous Catégorie</label>
                                            <div class="col-md-6">
                                                <select data-plugin-selectTwo id="produit" name="idsubcategorie" class="form-control populate">
                                                    <?php
                                                    $sql_cat = $DB->query("SELECT * FROM categorie");
                                                    foreach($sql_cat as $cat):
                                                    ?>
                                                    <optgroup label="<?= html_entity_decode($cat->designation_cat); ?>">
                                                        <?php
                                                        $sql_sub = $DB->query("SELECT * FROM subcategorie WHERE idcategorie = :idcategorie", array(
                                                            "idcategorie"   => $cat->id
                                                        ));
                                                        foreach($sql_sub as $sub):
                                                        ?>
                                                        <option value="<?= $sub->id; ?>"><?= html_entity_decode($sub->designation_subcat); ?></option>
                                                        <?php endforeach; ?>
                                                    </optgroup>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="stock" class="tab-pane">
                                        <h1 class="title">GESTION DE STOCK</h1>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="date_sortie">Date de Sortie</label>
                                            <div class="col-md-6">
                                                <div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</span>
                                                    <input type="text" id="date_sortie" name="date_sortie" data-plugin-datepicker class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="produit" class="col-md-3 control-label">Stock Actuel</label>
                                            <div class="col-md-3">
                                                <input type="text" id="produit" class="form-control" name="stock" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="produit">Poids</label>
                                            <div class="col-md-4">
                                                <input type="text" id="produit" class="form-control" name="poids">
                                            </div>
                                        </div>

                                    </div>
                                    <div id="images" class="tab-pane">
                                        <h1 class="title">IMAGES</h1>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Images Produits</label>
                                            <div class="col-md-6">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="input-append">
                                                        <div class="uneditable-input">
                                                            <i class="fa fa-file fileupload-exists"></i>
                                                            <span class="fileupload-preview"></span>
                                                        </div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Modifier</span>
																<span class="fileupload-new">Selectionner Fichier</span>
                                                                <input type="hidden" name="MAX_FILE_SIZE" value="3145728" />
																<input type="file" name="images_produit" accept="image/*"/>
															</span>
                                                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Supprimer</a>
                                                    </div>
                                                </div>
                                                <span>Maximum 3Mo</span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Bannière</label>
                                            <div class="col-md-6">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="input-append">
                                                        <div class="uneditable-input">
                                                            <i class="fa fa-file fileupload-exists"></i>
                                                            <span class="fileupload-preview"></span>
                                                        </div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Modifier</span>
																<span class="fileupload-new">Selectionner Fichier</span>
                                                                <input type="hidden" name="MAX_FILE_SIZE" value="8388608" />
																<input type="file" name="images_banner" accept="image/*"/>
															</span>
                                                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Supprimer</a>
                                                    </div>
                                                </div>
                                                <span>Maximum 3Mo</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div id="caracteristique" class="tab-pane">
                                        <h1 class="title">Définition des Caractéristiques</h1>

                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2"><strong>CARACTERISTIQUE DE JEUX</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Editeur</td>
                                                        <td>
                                                            <input type="text" class="form-control" name="editeur" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Genre</td>
                                                        <td>
                                                            <input type="text" class="form-control" name="genre" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Editeur</td>
                                                        <td>
                                                            <input type="text" class="form-control" name="editeur" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Multijoueur</td>
                                                        <td>
                                                            <div class="checkbox-custom checkbox-primary">
                                                                <input type="checkbox" checked="" name="multijoueur" id="checkboxExample2">
                                                                <label for="checkboxExample2">Jeux en Multijoueur</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Internet</td>
                                                        <td>
                                                            <div class="checkbox-custom checkbox-primary">
                                                                <input type="checkbox" checked="" name="internet" id="checkboxExample2">
                                                                <label for="checkboxExample2">Connexion Internet Requis</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Option</td>
                                                        <td>
                                                            <input type="text" class="form-control" name="option" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"><strong>CARACTERISTIQUE DE CONSOLE</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Couleur</td>
                                                        <td>
                                                            <input type="text" class="form-control" name="couleur" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Capacité Disque Dur</td>
                                                        <td>
                                                            <input type="text" class="form-control" name="cap_hdd" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ethernet</td>
                                                        <td>
                                                            <div class="checkbox-custom checkbox-primary">
                                                                <input type="checkbox" checked="" name="eth" id="checkboxExample2">
                                                                <label for="checkboxExample2">Connexion Internet par cable</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Wifi</td>
                                                        <td>
                                                            <div class="checkbox-custom checkbox-primary">
                                                                <input type="checkbox" checked="" name="internet" id="checkboxExample2">
                                                                <label for="checkboxExample2">Connexion Internet par Réseau Sans Fil</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nombre de Prise USB</td>
                                                        <td>
                                                            <input type="text" class="form-control" name="nb_usb" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">CARACTERISTIQUE AUTRE (Vourcher, etc...)</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Compatibilité</td>
                                                        <td>
                                                            <input type="text" class="form-control" name="compatibilite" />
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <footer class="panel-footer">

                        </footer>
                    </form>
                </section>
            </div>
            <div id="add-categorie" class="modal-block modal-block-lg modal-header-color modal-block-primary mfp-hide">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Nouvelle Catégorie</h2>
                    </header>
                    <form id="summary-form" class="form-horizontal" action="core/admin/categorie.php" method="post" enctype="multipart/form-data">
                        <div class="panel-body">
                            <div class="modal-wrapper">
                                <div class="validation-message">
                                    <ul></ul>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="cat">Désignation <span class="required">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" id="cat" class="form-control" name="designation_cat" required title="Champs Requis" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="cat">Images de la catégorie</label>
                                    <div class="col-md-9">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="input-append">
                                                <div class="uneditable-input">
                                                    <i class="fa fa-file fileupload-exists"></i>
                                                    <span class="fileupload-preview"></span>
                                                </div>
                                                <span class="btn btn-default btn-file">
                                                    <span class="fileupload-exists">Changer de Fichier</span>
                                                    <span class="fileupload-new">Sélectionner un fichier</span>
                                                    <input type="file" name="images_cat"/>
                                                </span>
                                                <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Supprimer</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-primary" type="submit" name="action" value="add-categories">Valider</button>
                                    <button class="btn btn-default modal-dismiss">Annuler</button>
                                </div>
                            </div>
                        </footer>
                    </form>
                </section>
            </div>
            <div id="add-subcategorie" class="modal-block modal-block-lg modal-header-color modal-block-primary mfp-hide">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Nouvelle Sous Catégorie</h2>
                    </header>
                    <form id="summary-form" class="form-horizontal" action="core/admin/categorie.php" method="post" enctype="multipart/form-data">
                        <div class="panel-body">
                            <div class="modal-wrapper">
                                <div class="validation-message">
                                    <ul></ul>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Catégorie <span class="required">*</span></label>
                                    <div class="col-md-9">
                                        <select data-plugin-selectTwo class="form-control populate" require name="idcategorie">
                                            <?php
                                            $sql_cat = $DB->query("SELECT * FROM categorie");
                                            foreach($sql_cat as $cat):
                                                ?>
                                                <option value="<?= $cat->id; ?>"><?= html_entity_decode($cat->designation_cat); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="cat">Désignation <span class="required">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" id="cat" class="form-control" name="designation_subcat" required title="Champs Requis" />
                                    </div>
                                </div>


                            </div>
                        </div>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-primary" type="submit" name="action" value="add-subcategorie">Valider</button>
                                    <button class="btn btn-default modal-dismiss">Annuler</button>
                                </div>
                            </div>
                        </footer>
                    </form>
                </section>
            </div>
            <!-- end: page -->
        </section>

    <?php endif; ?>
<?php endif; ?>
