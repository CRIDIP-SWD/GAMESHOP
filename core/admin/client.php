<?php
if($)
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