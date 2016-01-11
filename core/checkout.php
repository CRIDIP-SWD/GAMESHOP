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