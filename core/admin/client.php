<?php
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

        if($sql === TRUE)
        {
            header("Location: ../../index.php?view=admin_sha&sub=client&data=view_client&idclient=$idclient&success=supp-adresse-fact");
        }else{
            header("Location: ../../index.php?view=admin_sha&sub=client&data=view_client&idclient=$idclient&error=supp-adresse-fact");
        }
    }
    if($type = 'livraison')
    {
        $sql = $DB->execute("DELETE FROM client_adresse_liv WHERE idadresse = :idadresse", array(
            "idadresse" => $idadresse
        ));

        if($sql === TRUE)
        {
            header("Location: ../../index.php?view=admin_sha&sub=client&data=view_client&idclient=$idclient&success=supp-adresse-liv");
        }else{
            header("Location: ../../index.php?view=admin_sha&sub=client&data=view_client&idclient=$idclient&success=supp-adresse-liv");
        }
    }

}
if(isset($_GET['action']) && $_GET['action'] == 'define_default')
{
    require "../../app/classe.php";

    $type = $_GET['type'];
    $idclient = $_GET['idclient'];

    if($type === 'facturation')
    {
        $sql = $DB->execute("UPDATE client_adresse_fact SET `default` = :default_stat WHERE idadresse = :idadresse", array(
            "default_stat"      => 1,
            "idadresse"         => $_GET['idadresse'],
        ));


        if($sql === true)
        {
            $text = "Une nouvelle adresse par défault à été définie";
            header("Location: ../../index.php?view=admin_sha&sub=client&data=view_client&idclient=$idclient&success=define_default&text=$text");
        }else{
            $text = "Une erreur à eu lieu lors de la définition de l'adresse par default";
            header("Location: ../../index.php?view=admin_sha&sub=client&data=view_client&idclient=$idclient&error=define_default&text=$text");
        }
    }
    if($type === 'livraison')
    {
        $sql = $DB->execute("UPDATE client_adresse_liv SET `default` = :default_stat WHERE idadresse = :idadresse", array(
            "default_stat"      => 1,
            "idadresse"         => $_GET['idadresse'],
        ));


        if($sql === true)
        {
            $text = "Une nouvelle adresse par défault à été définie";
            header("Location: ../../index.php?view=admin_sha&sub=client&data=view_client&idclient=$idclient&success=define_default&text=$text");
        }else{
            $text = "Une erreur à eu lieu lors de la définition de l'adresse par default";
            header("Location: ../../index.php?view=admin_sha&sub=client&data=view_client&idclient=$idclient&error=define_default&text=$text");
        }
    }
}