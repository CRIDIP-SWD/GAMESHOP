<?php
if(isset($_POST['action']) && $_POST['action'] == 'add-psn')
{
    include "../app/classe.php";
    $idclient = $_POST['idclient'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $point = $info_client['point'];
    $new_point = $point + 100;

    $client = mysql_query("UPDATE client SET pseudo_psn = '$email', pass_psn = '$password', point = '$new_point' WHERE idclient = '$idclient'")or die(mysql_error());

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

    $point = $info_client['point'];
    $new_point = $point + 100;

    $client = mysql_query("UPDATE client SET pseudo_xbox = '$gamerTag', point = '$new_point' WHERE idclient = '$idclient'")or die(mysql_error());

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

    $point = $info_client['point'];
    $new_point = $point + 100;

    $client = mysql_query("UPDATE client SET pseudo_steam = '$idsteam', point = '$new_point' WHERE idclient = '$idclient'")or die(mysql_error());

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
        $adresse = mysql_query("INSERT INTO client_adresse_fact(idadresse, idclient, alias, nom, prenom, societe, telephone, adresse, code_postal, ville, pays, `default`) VALUES (NULL, '$idclient', '$alias', '$nom', '$prenom', '$societe', '$telephone', '$adresse', '$code_postal', '$ville', '1', '$default')")or die(mysql_error());
        if($adresse === TRUE)
        {
            header("Location: ../index.php?view=profil&sub=adresse&success=add-adresse-fact");
        }else{
            header("Location: ../index.php?view=profil&sub=adresse&error=add-adresse-fact");
        }
    }
    if($_POST['type_adresse'] == 'livraison')
    {
        $adresse = mysql_query("INSERT INTO client_adresse_liv(idadresse, idclient, alias, nom, prenom, societe, telephone, adresse, code_postal, ville, pays, `default`) VALUES (NULL, '$idclient', '$alias', '$nom', '$prenom', '$societe', '$telephone', '$adresse', '$code_postal', '$ville', '1', '$default')")or die(mysql_error());
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
        $sql = mysql_query("DELETE FROM client_adresse_fact WHERE idadresse = '$idadresse'")or die(mysql_error());

        if($sql === TRUE)
        {
            header("Location: ../index.php?view=profil&sub=adresse&success=supp-adresse-fact");
        }else{
            header("Location: ../index.php?view=profil&sub=adresse&error=supp-adresse-fact");
        }
    }
    if($type = 'livraison')
    {
        $sql = mysql_query("DELETE FROM client_adresse_liv WHERE idadresse = '$idadresse'")or die(mysql_error());

        if($sql === TRUE)
        {
            header("Location: ../index.php?view=profil&sub=adresse&success=supp-adresse-liv");
        }else{
            header("Location: ../index.php?view=profil&sub=adresse&error=supp-adresse-liv");
        }
    }
}