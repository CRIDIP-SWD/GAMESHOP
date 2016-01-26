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