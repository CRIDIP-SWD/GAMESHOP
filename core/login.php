<?php

if(isset($_POST['action']) && $_POST['action'] == 'login')
{
    include "../app/classe.php";
    if((isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['password']) && !empty($_POST['password'])))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $pass_crypt = sha1($email."_".$password);

        $sql = mysql_query("SELECT count(*) FROM client WHERE email = '$email' AND password = '$pass_crypt'")or die(mysql_error());
        $data = mysql_fetch_array($sql);

        if($data[0] == 1)
        {
            session_start();
            $sql_client = mysql_query("SELECT * FROM client WHERE email = '$email'")or die(mysql_error());
            $client = mysql_fetch_array($sql_client);
            $_SESSION['logged'] = true;
            $_SESSION['logged']['email'] = $email;
            header("Location: ../index.php?view=index");
        }elseif($data[0] == 0)
        {
            header("Location: ../index.php?view=login&error=no-compte");
        }else{
            header("Location: ../index.php?view=login&error=bdd");
        }
    }else{
        header("Location: ../index.php?view=login&warning=champs");
    }
}