<?php
if(isset($_POST['action']) && $_POST['action'] == 'add-adresse')
{
    require "../../app/classe.php";
    $idclient = $_POST['idclient'];
    $type_adresse = $_POST['type_adresse'];
    if($_POST['default'])
    {
        $default = 1;
    }else{
        $default = 0;
    }

    if($type_adresse == 1)
    {
        $sql = $DB->execute("INSERT INTO client_adresse_fact(idadresse, idclient, alias, nom, prenom, societe, telephone, adresse, code_postal, ville, pays, `default`) VALUES
                            (NULL, :idclient, :alias, :nom, :prenom, :societe, :telephone, :adresse, :code_postal, :ville, 1, :default_adresse)", array(
            "idclient"          => $idclient,
            "alias"             => $_POST['alias'],
            "nom"               => $_POST['nom'],
            "prenom"            => $_POST['prenom'],
            "societe"           => htmlentities(addslashes($_POST['societe'])),
            "telephone"         => $_POST['telephone'],
            "adresse"           => htmlentities(addslashes($_POST['adresse'])),
            "code_postal"       => $_POST['code_postal'],
            "ville"             => htmlentities(addslashes($_POST['ville'])),
            "default_adresse"   => $default
        ));

        if($sql == 1)
        {
            $text = "Une nouvelle adresse de facturation à été créé.";
            header("Location: ../../index.php?view=admin_sha&sub=client&data=view_client&idclient=$idclient&success=add-adresse&text=$text");
        }else{
            $text = "Une Erreur à eu lieu lors de la création de l'adresse de facturation !";
            header("Location: ../../index.php?view=admin_sha&sub=client&data=view_client&idclient=$idclient&error=add-adresse&text=$text");
        }
    }
    if($type_adresse == 2)
    {
        $sql = $DB->execute("INSERT INTO client_adresse_liv(idadresse, idclient, alias, nom, prenom, societe, telephone, adresse, code_postal, ville, pays, `default`) VALUES
                            (NULL, :idclient, :alias, :nom, :prenom, :societe, :telephone, :adresse, :code_postal, :ville, 1, :default_adresse)", array(
            "idclient"          => $idclient,
            "alias"             => $_POST['alias'],
            "nom"               => $_POST['nom'],
            "prenom"            => $_POST['prenom'],
            "societe"           => htmlentities(addslashes($_POST['societe'])),
            "telephone"         => $_POST['telephone'],
            "adresse"           => htmlentities(addslashes($_POST['adresse'])),
            "code_postal"       => $_POST['code_postal'],
            "ville"             => htmlentities(addslashes($_POST['ville'])),
            "default_adresse"   => $default
        ));

        if($sql == 1)
        {
            $text = "Une nouvelle adresse de Livraison à été créé.";
            header("Location: ../../index.php?view=admin_sha&sub=client&data=view_client&idclient=$idclient&success=add-adresse&text=$text");
        }else{
            $text = "Une Erreur à eu lieu lors de la création de l'adresse de livraison !";
            header("Location: ../../index.php?view=admin_sha&sub=client&data=view_client&idclient=$idclient&error=add-adresse&text=$text");
        }
    }

}
if(isset($_GET['action']) && $_GET['action'] == 'supp-adresse')
{

    include "../../app/classe.php";
    $type = $_GET['type'];
    $idclient = $_GET['idclient'];
    $idadresse = $_GET['idadresse'];

    if($type = 'facturation')
    {
        $sql = $DB->execute("DELETE FROM client_adresse_fact WHERE idadresse = :idadresse", array(
            "idadresse" => $idadresse
        ));

        if($sql == 1)
        {
            $text = "L'adresse à bien été supprimer !";
            header("Location: ../../index.php?view=admin_sha&sub=client&data=view_client&idclient=$idclient&success=supp-adresse&text=$text");
        }else{
            $text = "Une erreur à eu lieu lors de la suppression de l'adresse !";
            header("Location: ../../index.php?view=admin_sha&sub=client&data=view_client&idclient=$idclient&error=supp-adresse&text=$text");
        }
    }
    if($type = 'livraison')
    {
        $sql = $DB->execute("DELETE FROM client_adresse_liv WHERE idadresse = :idadresse", array(
            "idadresse" => $idadresse
        ));

        if($sql == 1)
        {
            $text = "L'adresse à bien été supprimer !";
            header("Location: ../../index.php?view=admin_sha&sub=client&data=view_client&idclient=$idclient&success=supp-adresse&text=$text");
        }else{
            $text = "Une erreur à eu lieu lors de la suppression de l'adresse !";
            header("Location: ../../index.php?view=admin_sha&sub=client&data=view_client&idclient=$idclient&success=supp-adresse&text=$text");
        }
    }

}