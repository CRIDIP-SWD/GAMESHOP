<?php
$num_commande = $_GET['num_commande'];
$cmd = $DB->query("SELECT * FROM commande, client WHERE commande.idclient = client.idclient AND num_commande = :num_commande", array(
    "num_commande"  => $num_commande
));

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
        <table style="width: 100%; border: 2px solid #8c8c8c; border-radius: 5px; padding: 10px 10px 10px 10px;" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th style="text-align: center; border-bottom: 1px solid #8c8c8c; border-right: 1px solid #8c8c8c;">Référence</th>
                    <th style="text-align: center;">Description</th>
                    <th style="text-align: center;">Prix Unitaire</th>
                    <th style="text-align: center;">Qte</th>
                    <th style="text-align: center;">Total</th>
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
                    <td style="width: 20%; text-align: center;"><?= $article->ref_produit; ?></td>
                    <td style="width: 45%;"><?= html_entity_decode($article->designation); ?></td>
                    <td style="width: 15%; text-align: right;"><?= $fonction->number_decimal($article->prix_vente); ?></td>
                    <td style="width: 5%; text-align: center;"><?= $article->qte; ?></td>
                    <td style="width: 15%; text-align: right;"><?= $fonction->number_decimal($article->total_article_commande); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>