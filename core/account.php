<?php
if(isset($_POST['action']) && $_POST['action'] == 'add-psn')
{
    include "../app/classe.php";
    $idclient = $_POST['idclient'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $point = $info_client[0]->point;
    $new_point = $point + 100;

    $client = $DB->execute("UPDATE client SET pseudo_psn = :pseudo_psn, pass_psn = :pass_psn, point = :new_point WHERE idclient = :idclient", array(
        "pseudo_psn" => $email,
        "pass_psn" => $password,
        "new_point" => $new_point,
        "idclient" => $idclient
    ));

    if($client === TRUE)
    {
        header("Location: ../index.php?view=profil&success=add-psn");
    }else{
        header("Location: ../index.php?view=profil&error=add-psn");
    }
}
if(isset($_POST['action']) && $_POST['action'] == 'add-xbox-live')
{
    include "../app/classe.php";
    $idclient = $_POST['idclient'];
    $gamerTag = $_POST['gamerTag'];

    $point = $info_client[0]->point;
    $new_point = $point + 100;

    $client = $DB->execute("UPDATE client SET pseudo_xbox = :gamertag, point = :new_point WHERE idclient = :idclient", array(
        "gamertag" => $gamerTag,
        "new_point" => $new_point,
        "idclient" => $idclient
    ));

    if($client === TRUE)
    {
        header("Location: ../index.php?view=profil&success=add-xbox-live");
    }else{
        header("Location: ../index.php?view=profil&error=add-xbox-live");
    }
}
if(isset($_POST['action']) && $_POST['action'] == 'add-steam')
{
    include "../app/classe.php";
    $idclient = $_POST['idclient'];
    $idsteam = $_POST['idsteam'];

    $point = $info_client[0]->point;
    $new_point = $point + 100;

    $client = $DB->execute("UPDATE client SET pseudo_steam = :pseudo_steam, point = :new_point WHERE idclient = :idclient", array(
        "pseudo_steam" => $idsteam,
        "new_point" => $new_point,
        "idclient" => $idclient
    ));

    if($client === TRUE)
    {
        header("Location: ../index.php?view=profil&success=add-steam");
    }else{
        header("Location: ../index.php?view=profil&error=add-steam");
    }
}
if(isset($_POST['action']) && $_POST['action'] == 'add-adresse')
{
    include "../app/classe.php";
    $idclient = $_POST['idclient'];
    $alias = $_POST['alias'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $societe = htmlentities(addslashes($_POST['societe']));
    $telephone = $_POST['telephone'];
    $new_tel = "0033".substr($telephone, 1);
    $adresse = htmlentities(addslashes($_POST['adresse']));
    $code_postal = $_POST['code_postal'];
    $ville = htmlentities(addslashes($_POST['ville']));
    if(isset($_POST['default'])) {$default = 1;}else{$default = 0;}
    
    if($_POST['type_adresse'] == 'facturation')
    {
        $adresse = $DB->execute("INSERT INTO client_adresse_fact(idadresse, idclient, alias, nom, prenom, societe, telephone, adresse, code_postal, ville, pays, `default`) VALUES (NULL, :idclient, :alias, :nom, :prenom, :societe, :telephone, :adresse, :code_postal, :ville, :pays, :default_value)", array(
            "idclient" => $idclient,
            "alias" => $alias,
            "nom" => $nom,
            "prenom" => $prenom,
            "societe" => $societe,
            "telephone" => $new_tel,
            "adresse" => htmlentities(addslashes($adresse)),
            "code_postal" => $code_postal,
            "ville" => $ville,
            "pays" => 1,
            "default" => $default
        ));
        if($adresse === TRUE)
        {
            header("Location: ../index.php?view=profil&sub=adresse&success=add-adresse-fact");
        }else{
            header("Location: ../index.php?view=profil&sub=adresse&error=add-adresse-fact");
        }
    }
    if($_POST['type_adresse'] == 'livraison')
    {
        $adresse = $DB->execute("INSERT INTO client_adresse_liv(idadresse, idclient, alias, nom, prenom, societe, telephone, adresse, code_postal, ville, pays, `default`) VALUES (NULL, :idclient, :alias, :nom, :prenom, :societe, :telephone, :adresse, :code_postal, :ville, :pays, :default_value)", array(
            "idclient" => $idclient,
            "alias" => $alias,
            "nom" => $nom,
            "prenom" => $prenom,
            "societe" => $societe,
            "telephone" => $new_tel,
            "adresse" => htmlentities(addslashes($adresse)),
            "code_postal" => $code_postal,
            "ville" => $ville,
            "pays" => 1,
            "default" => $default
        ));
        if($adresse === TRUE)
        {
            header("Location: ../index.php?view=profil&sub=adresse&success=add-adresse-liv");
        }else{
            header("Location: ../index.php?view=profil&sub=adresse&error=add-adresse-liv");
        }
    }
}
if(isset($_GET['action']) && $_GET['action'] == 'supp-adresse')
{
    include "../app/classe.php";
    $type = $_GET['type'];
    $idadresse = $_GET['idadresse'];

    if($type = 'facturation')
    {
        $sql = $DB->execute("DELETE FROM client_adresse_fact WHERE idadresse = :idadresse", array(
            "idadresse" => $idadresse
        ));

        if($sql === TRUE)
        {
            header("Location: ../index.php?view=profil&sub=adresse&success=supp-adresse-fact");
        }else{
            header("Location: ../index.php?view=profil&sub=adresse&error=supp-adresse-fact");
        }
    }
    if($type = 'livraison')
    {
        $sql = $DB->execute("DELETE FROM client_adresse_liv WHERE idadresse = :idadresse", array(
            "idadresse" => $idadresse
        ));

        if($sql === TRUE)
        {
            header("Location: ../index.php?view=profil&sub=adresse&success=supp-adresse-liv");
        }else{
            header("Location: ../index.php?view=profil&sub=adresse&error=supp-adresse-liv");
        }
    }
}