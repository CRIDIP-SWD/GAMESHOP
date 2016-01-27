<?php
if(isset($_POST['action']) && $_POST['action'] == 'add-commande')
{
    require "../../app/classe.php";
    $idclient = $_POST['idclient'];
    $date_commande = $_POST['date_commande'];
    $adresse_fact = $_POST['adresse_fact'];
    $adresse_liv = $_POST['adresse_liv'];

    $num_commande = "CMD".rand(100,999999999);

    $sql = $DB->execute("INSERT INTO commande(idcommande, num_commande, date_commande, idclient, total_commande, date_livraison, destination, statut, adresse_fact, adresse_liv, methode_livraison, methode_paiement, prix_envoie) VALUES
                          (NULL, :num_commande, :date_commande, :idclient, 0, '', '', 1, :adresse_fact, :adresse_liv, '', '', '')", array(
        "num_commande"      => $num_commande,
        "date_commande"     => $date_commande,
        "idclient"          => $idclient,
        "adresse_fact"      => $adresse_fact,
        "adresse_liv"       => $adresse_liv
    ));

    if($sql == 1)
    {
        $text = "La Commande N°<strong>".$num_commande."</strong> à été créé avec succès.";
        header("Location: ../../index.php?view=admin_sha&sub=commande&data=view_commande&num_commande=$num_commande&success=add-commande&text=$text");
    }else{
        $text = "Une erreur à eu lieu lors de la création de la commande !";
        header("Location: ../../index.php?view=admin_sha&sub=commande&data=view_commande&num_commande=$num_commande&error=add-commande&text=$text");
    }
}