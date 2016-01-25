<?php
$num_commande = $_GET['num_commande'];
$cmd = $DB->query("SELECT * FROM commande, client WHERE commande.idclient = client.idclient AND num_commande = :num_commande", array(
    "num_commande"  => $num_commande
));
$sous_total = $cmd[0]->total_commande - $cmd[0]->prix_envoie;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
    </head>
    <body>
        <table style="width: 100%;">
            <tr>
                <td style="width: 33%;">
                    <img src="<?= $constante->getUrl(array('images/'), true, false); ?>logo.png" width="80" />
                </td>
                <td style="width: 33%; position: relative; left:-17%">
                    <div class="adresse_societe">
                        <strong>Gameshop</strong><br>
                        20 Avenue Jean Jaures<br>
                        85100 Les Sables d'Olonne<br>
                        Tel: 06 33 13 43 30<br>
                        Mail: gamedistri@gmail.com
                    </div>
                </td>
                <td style="text-align: right; font-size: 15px; color: #beb7bc; font-weight: bold; width: 34%;">FACTURE</td>
            </tr>
        </table>
        <table style="width: 100%; padding-top: 2em;">
            <tr>
                <td style="width: 40%;">
                    <div class="info_facture">
                        <table style="width: 100%;">
                            <tr>
                                <td style="font-weight: bold;">Date de la facture:</td>
                                <td><?= $date_format->formatage("d/m/Y", $cmd[0]->date_commande); ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Date de livraison:</td>
                                <td><?= $date_format->formatage("d/m/Y", $cmd[0]->date_livraison); ?> (<?= $cmd[0]->destination; ?>)</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Mode de Livraison:</td>
                                <td><?= $cmd[0]->methode_livraison; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Mode de paiement:</td>
                                <td><?= $cmd[0]->methode_paiement; ?></td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td style="width: 20%;"></td>
                <td style="width: 40%;">
                    <div class="adresse_client">
                        <strong><?= $cmd[0]->nom_client; ?> <?= $cmd[0]->prenom_client; ?></strong><br>
                        <?= html_entity_decode($cmd[0]->adresse_liv); ?>
                    </div>
                </td>
            </tr>
        </table>
        <div style="padding-top: 2em; padding-bottom: 2em;"></div>
        <h3>LISTING DE VOS ARTICLES</h3>
        <table style="width: 100%; border: 2px solid #8c8c8c; border-radius: 5px;" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th style="text-align: center; border-bottom: 3px solid #8c8c8c; border-right: 1px solid #8c8c8c; padding: 5px 5px 5px 5px; background-color: #00A8FF">Référence</th>
                    <th style="text-align: center; border-bottom: 3px solid #8c8c8c; border-right: 1px solid #8c8c8c; padding: 5px 5px 5px 5px; background-color: #00A8FF">Description</th>
                    <th style="text-align: center; border-bottom: 3px solid #8c8c8c; border-right: 1px solid #8c8c8c; padding: 5px 5px 5px 5px; background-color: #00A8FF">Prix Unitaire</th>
                    <th style="text-align: center; border-bottom: 3px solid #8c8c8c; border-right: 1px solid #8c8c8c; padding: 5px 5px 5px 5px; background-color: #00A8FF">Qte</th>
                    <th style="text-align: center; border-bottom: 3px solid #8c8c8c; padding: 5px 5px 5px 5px; background-color: #00A8FF">Total</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $sql_article = $DB->query("SELECT * FROM commande_article, produits WHERE commande_article.ref_produit = produits.ref_produit AND num_commande = :num_commande", array(
                "num_commande"  => $num_commande
            ));
            foreach($sql_article as $article):
            ?>
                <tr>
                    <td style="width: 20%; text-align: center; border: solid 1px #8c8c8c; padding: 5px 5px 5px 5px;"><?= $article->ref_produit; ?></td>
                    <td style="width: 45%; border: solid 1px #8c8c8c; padding: 5px 5px 5px 5px;"><?= html_entity_decode($article->designation); ?></td>
                    <td style="width: 15%; text-align: right; border: solid 1px #8c8c8c; padding: 5px 5px 5px 5px;"><?= $fonction->number_decimal($article->prix_vente); ?></td>
                    <td style="width: 5%; text-align: center; border: solid 1px #8c8c8c; padding: 5px 5px 5px 5px;"><?= $article->qte; ?></td>
                    <td style="width: 15%; text-align: right; border: solid 1px #8c8c8c; padding: 5px 5px 5px 5px;"><?= $fonction->number_decimal($article->total_article_commande); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" style="padding: 10px 10px 10px 10px; text-align: right; border-bottom: 1px solid #8c8c8c;">Sous-Total</td>
                    <td style="text-align: right; padding-right: 5px; border-bottom: 1px solid #8c8c8c;"><?= $fonction->number_decimal($sous_total); ?></td>
                </tr>
                <tr>
                    <td colspan="4" style="padding: 10px 10px 10px 10px; text-align: right; border-bottom: 1px solid #8c8c8c;">Livraison</td>
                    <td style="text-align: right; padding-right: 5px; border-bottom: 1px solid #8c8c8c;"><?= $fonction->number_decimal($cmd[0]->prix_envoie); ?></td>
                </tr>
                <tr>
                    <td colspan="4" style="padding: 10px 10px 10px 10px; text-align: right; border-bottom: 1px solid #8c8c8c;">Total</td>
                    <td style="text-align: right; padding-right: 5px; border-bottom: 1px solid #8c8c8c;"><?= $fonction->number_decimal($cmd[0]->total_commande); ?></td>
                </tr>
            </tfoot>
        </table>
        <div style="padding-top: 2em; padding-bottom: 2em;"></div>
        <h3>LISTING DE VOS PAIEMENTS</h3>
        <table style="width: 100%; border: 2px solid #8c8c8c; border-radius: 5px;" cellspacing="0" cellpadding="0">
            <thead>
            <tr>
                <th style="text-align: center; border-bottom: 3px solid #8c8c8c; border-right: 1px solid #8c8c8c; padding: 5px 5px 5px 5px; background-color: #00A8FF">Date</th>
                <th style="text-align: center; border-bottom: 3px solid #8c8c8c; border-right: 1px solid #8c8c8c; padding: 5px 5px 5px 5px; background-color: #00A8FF">Mode de réglement</th>
                <th style="text-align: center; border-bottom: 3px solid #8c8c8c; border-right: 1px solid #8c8c8c; padding: 5px 5px 5px 5px; background-color: #00A8FF">Reférence</th>
                <th style="text-align: center; border-bottom: 3px solid #8c8c8c; padding: 5px 5px 5px 5px; background-color: #00A8FF">Montant du Règlement</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql_reglement = $DB->query("SELECT * FROM commande_reglement WHERE num_commande = :num_commande", array(
                "num_commande"  => $num_commande
            ));
            foreach($sql_reglement as $reglement):
                ?>
                <tr>
                    <td style="width: 25%; text-align: center; border: solid 1px #8c8c8c; padding: 5px 5px 5px 5px;"><?= $date_format->formatage('d/m/Y', $reglement->date_reglement); ?></td>
                    <td style="width: 25%; text-align: center; border: solid 1px #8c8c8c; padding: 5px 5px 5px 5px;"><?= html_entity_decode($reglement->mode_reglement); ?></td>
                    <td style="width: 25%; text-align: center; border: solid 1px #8c8c8c; padding: 5px 5px 5px 5px;"><?= $reglement->ref_reglement; ?></td>
                    <td style="width: 25%; text-align: right; border: solid 1px #8c8c8c; padding: 5px 5px 5px 5px;"><?= $fonction->number_decimal($reglement->montant_reglement); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>