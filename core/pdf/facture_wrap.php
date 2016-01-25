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
        <table style="padding-top: 5em;">
            <thead>
                <tr>
                    <th>Référence</th>
                    <th>Description</th>
                    <th>Prix Unitaire</th>
                    <th>Qte</th>
                    <th>Total</th>
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
                    <td><?= $article->ref_article; ?></td>
                    <td><?= html_entity_decode($article['designation']); ?></td>
                    <td><?= $fonction->number_decimal($article->prix_vente); ?></td>
                    <td><?= $article->qte; ?></td>
                    <td><?= $fonction->number_decimal($article->total_article_commande); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>