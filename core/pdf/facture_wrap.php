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
        <div id="header">
            <div class="header_left">
                <div class="logo">
                    <img src="<?= $constante->getUrl(array('images/'), true, false); ?>logo.png" width="80"/>
                </div>
            </div>
            <div class="header_right">
                FACTURE
            </div>
        </div>
        <div id="block_adresse">
            <div class="adresse_societe">
                <h2>GAMESHOP</h2>
                20 Avenue Jean Jaures<br>
                85100 Les Sables d'Olonne<br>
                Tel: 06 33 13 43 30<br>
                Mail: gamedistri@gmail.com
            </div>
            <div class="adresse_client">
                <strong><?= $cmd[0]->nom_client; ?> <?= $cmd[0]->prenom_client; ?></strong><br>
                <?= html_entity_decode($cmd[0]->adresse_liv); ?>
            </div>
        </div>
        <div id="info_facture">
            <table>
                <tbody>
                    <tr>
                        <td>N° de Commande:</td>
                        <td><?= $num_commande; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>