<?php

if(isset($_POST['action']) && $_POST['action'] == 'login')
{
    include "../app/classe.php";
    if((isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['password']) && !empty($_POST['password'])))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $pass_crypt = sha1($email."_".$password);

        $data = $DB->count("SELECT count(*) FROM client WHERE email = '$email' AND password = '$pass_crypt'");

        if($data[0] == 1)
        {
            session_start();
            $client = $DB->query("SELECT * FROM client WHERE email = '$email'");
            $_SESSION['logged'] = true;
            $_SESSION['email'] = $email;
            header("Location: ../index.php?view=checkout");
        }elseif($data[0] == 0)
        {
            header("Location: ../index.php?view=checkout&error=no-compte");
        }else{
            header("Location: ../index.php?view=checkout&error=bdd");
        }
    }else{
        header("Location: ../index.php?view=checkout&warning=champs");
    }
}
if(isset($_GET['action']) && $_GET['action'] == 'adresse')
{
    session_start();
    require "../app/classe.php";
    $data = array(
        "num_commande"          => "CMD".rand(1000000,9999999),
        "date_commande"         => strtotime(date("d-m-Y h:i")),
        "idclient"              => $info_client[0]->idclient,
        "total_commande"        => $panier_cls->MontantGlobal(),
        "date_livraison"        => "",
        "destination"           => "",
        "statut"                => 0,
        "adresse_fact"          => "",
        "adresse_liv"           => "",
        "methode_livraison"      => "",
        "methode_paiement"       => "",
        "prix_envoie"           => ""
    );

    $num_commande = $data['num_commande'];
    $nbArticles = count($_SESSION['panier']['refProduit']);

    $sql = $DB->execute("INSERT INTO commande(idcommande, num_commande, date_commande, idclient, total_commande, date_livraison, destination, statut, adresse_fact, adresse_liv, methode_livraison, methode_paiement, prix_envoie)
                          VALUES (NULL, :num_commande, :date_commande, :idclient, :total_commande, :date_livraison, :destination, :statut, :adresse_fact, :adresse_liv, :methode_livraison, :methode_paiement, :prix_envoie)", $data);

    for($i=0;$i<$nbArticles;$i++)
    {
        $ref_produit = $_SESSION['panier']['refProduit'][$i];
        $qte = $_SESSION['panier']['qteProduit'][$i];
        $prix_article = $_SESSION['panier']['prixProduit'][$i];
        $total_article_commande = $prix_article * $qte;

        $sql_article = $DB->execute("INSERT INTO commande_article(idcommandearticle, num_commande, ref_produit, qte, total_article_commande) VALUES (NULL, :num_commande, :ref_produit, :qte, :total_article_commande)", array(
            "num_commande"              => $num_commande,
            "ref_produit"               => $ref_produit,
            "qte"                       => $qte,
            "total_article_commande"    => $total_article_commande
        ));
    }

    $error = "Impossible de Créer votre commande.<br>Veuillez contactez un administrateur.";
    if($sql == 1 AND $sql_article >= 1)
    {
        header("Location: ../index.php?view=checkout&sub=adresse&num_commande=$num_commande");
    }else{
        header("Location: ../index.php?view=checkout&error=critical&data=$error");
    }
}
if(isset($_POST['action']) && $_POST['action'] == 'livraison')
{

    session_start();
    require "../app/classe.php";
    $num_commande = $_POST['num_commande'];
    $idaddresse = $_POST['adresse'];

    $adresse = $DB->query("SELECT * FROM client_adresse_liv WHERE idadresse = :idadresse", array(
        "idadresse" => $idaddresse
    ));


    $cmd = $DB->execute("UPDATE commande SET destination = :destination, adresse_liv = :adresse_liv WHERE num_commande = :num_commande", array(
        "destination" => "France",
        "adresse_liv" => $adresse[0]->adresse.", ".$adresse[0]->code_postal." ".$adresse[0]->ville,
        "num_commande" => $num_commande
    ));
    $error = "Impossible de continuer.<br>Veuillez contactez un administrateur";
    if($cmd == 1)
    {
        header("Location: ../index.php?view=checkout&sub=livraison&num_commande=$num_commande");
    }else{
        header("Location: ../index.php?view=checkout&sub=adresse&num_commande=$num_commande&error=critical&data=$error");
    }



}
if(isset($_POST['action']) && $_POST['action'] == 'paiement')
{

    session_start();
    include "../app/classe.php";
    $num_commande = $_POST['num_commande'];
    $poids_commande = $_POST['poids_commande'];
    $type_livraison = $_POST['livraison'];

    $cmd = $DB->query("SELECT * FROM commande WHERE num_commande = :num_commande", array(
        "num_commande" => $num_commande
    ));

    if($type_livraison == 1) {$methode_livraison = "LA POSTE";$tarif = $transport_cls->calc_transport_laposte($poids_commande);}
    if($type_livraison == 2) {$methode_livraison = "CHRONOPOST 10H";$tarif = $transport_cls->calc_transport_chrono10($poids_commande);}
    if($type_livraison == 3) {$methode_livraison = "CHRONOPOST 13H";$tarif = $transport_cls->calc_transport_chrono13($poids_commande);}
    if($type_livraison == 4) {$methode_livraison = "UPS STANDARD PROTECTED+";$tarif = $transport_cls->calc_transport_ups($poids_commande);}

    $new_total = $cmd[0]->total_commande + $tarif;

    $sql = $DB->execute("UPDATE commande SET methode_livraison = :methode_livraison, prix_envoie = :prix_envoie, total_commande = :total_commande WHERE num_commande = :num_commande", array(
        "methode_livraison" => $methode_livraison,
        "prix_envoie"       => $tarif,
        "num_commande"      => $num_commande,
        "total_commande"    => $new_total
    ));
    $error = "Impossible de Définir le moyen de livraison.<br>Veuillez contactez un administrateur.";

    if($sql === 1)
    {
        header("Location: ../index.php?view=checkout&sub=paiement&num_commande=$num_commande");
    }else{
        header("Location: ../index.php?view=checkout&sub=livraison&num_commande=$num_commande&error=critical&data=$error");
    }


}