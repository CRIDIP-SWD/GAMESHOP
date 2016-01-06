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

}