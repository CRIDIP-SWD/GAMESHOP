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
                <td style="display: inline-block;">
                    <img src="<?= $constante->getUrl(array('images/'), true, false); ?>logo.png" width="80" />TEST<br>fjkhfjkdsh
                </td>
                <td style="text-align: right; font-size: 15px; color: #beb7bc; font-weight: bold;">FACTURE</td>
            </tr>
        </table>
    </body>
</html>