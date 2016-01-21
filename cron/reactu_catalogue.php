<?php
ini_set('display_errors', 1);
include "../app/classe.php";
$date_jour = $date_format->format_strt(date("d-m-Y"));
$date_30 = $date_format->format_strt(date("d-m-Y")) - 2505600;
$date_reassort = $date_format->format_strt(date("d-m-Y")) + 2505600;

$sql_catalogue = $DB->query("SELECT * FROM produits");
foreach($sql_catalogue as $catalogue):

    $ref_produit = $catalogue->ref_produit;
    //Verification de l'expiration des Précommandes
    if($catalogue->date_sortie >= $date_jour)
    {
        $sql = $DB->execute("UPDATE produits SET statut_global = 4 WHERE ref_produit = :ref_produit", array(
            "ref_produit" => $ref_produit
        ));
    }

    //Verification de la nouveaute
    if($catalogue->date_sortie >= $date_30)
    {
        $sql = $DB->execute("UPDATE produits SET statut_global = 1 WHERE ref_produit = :ref_produit", array(
            "ref_produit" => $ref_produit
        ));
    }

    //Vérification des Promotions
    $promo_count = $DB->count("SELECT COUNT(ref_produit) FROM produits_promotion WHERE ref_produit = :ref_produit", array(
        "ref_produit" => $ref_produit
    ));
    if($promo_count >= 1)
    {
        $sql = $DB->execute("UPDATE produits SET statut_global = 3 WHERE ref_produit = :ref_produit", array(
            "ref_produit" => $ref_produit
        ));
    }

    mail("gamedistri@gmail.com", "TACHE JOURNALIERE", "Tache Effectuer");


endforeach;