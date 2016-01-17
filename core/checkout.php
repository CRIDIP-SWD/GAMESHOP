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

    foreach($_SESSION['panier'] as $article)
    {
        var_dump($article[0]);
    }

    /*$error = "Impossible de Créer votre commande.<br>Veuillez contactez un administrateur.";
    if($sql == 1 AND $sql_article >= 1)
    {
        header("Location: ../index.php?view=checkout&sub=adresse&num_commande=$num_commande");
    }else{
        header("Location: ../index.php?view=checkout&error=critical&data=$error");
    }*/
}