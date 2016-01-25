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
                <td style="width: 33%; position: relative; left:-20%">
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
    </body>
</html>