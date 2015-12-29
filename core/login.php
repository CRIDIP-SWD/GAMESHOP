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
            $_SESSION['email'] = $email;
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
if(isset($_GET['action']) && $_GET['action'] == 'logout')
{
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../index.php?view=index");
}
if(isset($_POST['action']) && $_POST['action'] == 'reset-password-1')
{
    include "../app/classe.php";
    $email = $_POST['email'];
    $sql = mysql_query("SELECT count(email) FROM client WHERE email = '$email'")or die(mysql_error());
    $data = mysql_result($sql, 0);
    if($data != 0)
    {
        $sql_client = mysql_query("SELECT * FROM client WHERE email = '$email'")or die(mysql_error());
        $client = mysql_fetch_array($sql_client);
        $idclient = $client['idclient'];
        $token = $fonction->gen_token($idclient);
        $to = $email;
        $sujet = "GAMESHOP - 1/2 Réinitialisation de votre mote de passe";
        $headers = 'Mime-Version: 1.0'."\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
        $headers .= "\r\n";
        ob_start();
        ?>
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
        <html xmlns:v="urn:shemas-microsoft-com:vml">
        <head>
            <meta http-equiv="content-type" content="text/html; charset=utf-8">
            <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0">
            <title>Réinitialisation de votre mot de passe 1/2</title>
            <link href='https://fonts.googleapis.com/css?family=Product+Sans' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        </head>
        <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

        <!--TABLE HEAD-->
        <table bgcolor="#131448" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody>
            <tr>
                <td background="http://imgur.com/kBStm0X" bgcolor="#373e80" valign="top">
                    <!--[if gte mso 9]>
                    <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="mso-width-percent:1000;">
                        <v:fill type="tile" src="http://imgur.com/kBStm0X" color="#373e80" />
                        <v:textbox style="mso-fit-shape-to-text:true" inset="0,0,0,0">
                    <![endif]-->
                    <div>
                        <table align="center" width="590" border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                            <tr>
                                <td height="70" style="font-size: 30px; line-height: 30px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="center" style="text-align: center;">
                                    <a href="http://vps221243.ovh.net/gameshop/">
                                        <img src="http://vps221243.ovh.net/gameshop/assets/images/logo.png" width="240" border="0" alt="Logo GAMESHOP" />
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td height="30" style="font-size: 30px; line-height: 30px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="center" style="text-align: center; font-size: 25px; color: white; mso-line-height-rule: exactly; line-height: 30px; font-family: 'Product Sans',Helvetica, Arial, sans-serif">
                                    Réinitialisation de Votre Mot de Passe<br>1 / 2
                                </td>
                            </tr>
                            <tr>
                                <td height="30" style="font-size: 30px; line-height: 30px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <table align="center" width="45" border="0" cellpadding="0" cellspacing="0" bgcolor="#1eff83">
                                        <tbody>
                                        <tr>
                                            <td height="4" style="font-size: 4px; line-height: 4px;"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--[if gte mso 9]>
                    </v:textbox>
                    </v:rect>
                    <![endif]-->
                </td>
            </tr>
            </tbody>
        </table>
        <!-- / TABLE HEAD -->

        <!-- TABLE CORPS -->
        <table bgcolor="#2c3164" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody>
            <tr>
                <td height="30" style="font-size: 30px; line-height: 30px;">&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table align="center" width="590" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                        <tr>
                            <td align="left" style="text-align: left; font-size: 13px; color: #989bb9; font-family: 'Product Sans',Helvetica, Arial, sans-serif">
                                <p>Bonjour,</p>
                                <p>Une demande de réinitialisations de mot de passe à été enregistré suivant les informations suivantes:</p><br>
                                <ul>
                                    <li>Identifiant: <strong><?= $email; ?></strong></li>
                                    <li>ADRESSE IP: <strong><?= $_SERVER['REMOTE_ADDR']; ?></strong></li>
                                    <li>Date de la demande: <strong><?= date("d-m-Y à H:i"); ?></strong></li>
                                </ul>
                                <p>
                                    Si vous êtes celui qui à demander cette réinitialisation, veuillez cliquer sur le lien ci-dessous afin de réinitialiser le mot de passe:
                                </p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td height="30" style="font-size: 30px; line-height: 30px;">&nbsp;</td>
            </tr>
            <tr>
                <td align="center" style="text-align: center;">
                    <div><!--[if mso]>
                        <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://" style="height:80px;v-text-anchor:middle;width:300px;" arcsize="125%" strokecolor="#32f143" fillcolor="#32f143">
                            <w:anchorlock/>
                            <center style="color:#ffffff;font-family:sans-serif;font-size:13px;font-weight:bold;">Réinitialiser votre mot de passe</center>
                        </v:roundrect>
                        <![endif]-->
                        <a href="http://vps221243.ovh.net/gameshop/core/login.php?action=reset-password-2&token=<?= $token; ?>" style="background-color:#32f143;border:1px solid #32f143;border-radius:100px;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:13px;font-weight:bold;line-height:80px;text-align:center;text-decoration:none;width:300px;-webkit-text-size-adjust:none;mso-hide:all;">Réinitialiser votre mot de passe</a>
                    </div>
                </td>
            </tr>
            <tr>
                <td height="30" style="font-size: 30px; line-height: 30px;">&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table align="center" width="590" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                        <tr>
                            <td align="left" style="text-align: left; font-size: 13px; color: #989bb9; font-family: 'Product Sans',Helvetica, Arial, sans-serif">
                                <p>Si vous avez des question sur l'utilisation de nos services, n'hésitez pas à nous recontacter.</p>
                                <p>Cordialement,</p><br>
                                <p>LE SUPPORT TECHNIQUE<br><i>GAMESHOP</i></p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td height="30" style="font-size: 30px; line-height: 30px;">&nbsp;</td>
            </tr>
            </tbody>
        </table>
        <!-- /TABLE CORPS -->

        <!-- TABLE FOOTER -->
        <table bgcolor="#131448" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody>
            <tr>
                <td background="http://imgur.com/kBStm0X" bgcolor="#373e80" valign="top">
                    <!--[if gte mso 9]>
                    <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="mso-width-percent:1000;">
                        <v:fill type="tile" src="http://imgur.com/kBStm0X" color="#373e80" />
                        <v:textbox style="mso-fit-shape-to-text:true" inset="0,0,0,0">
                    <![endif]-->
                    <div>
                        <table align="center" width="590" border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                            <tr>
                                <td height="30" style="font-size: 30px; line-height: 30px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="left" style="text-align: left; font-size: 15px; color: white; font-family: 'Product Sans',Helvetica, Arial, sans-serif">
                                    <img src="http://vps221243.ovh.net/gameshop/assets/images/logo.png" width="240" border="0" alt="Logo GAMESHOP" />
                                </td>
                            </tr>
                            <tr>
                                <td align="right" style="text-align: right; font-size: 15px; color: white; font-family: 'Product Sans',Helvetica, Arial, sans-serif">
                                    <a href="" style="color: white; padding-right: 5px;"><i class="fa fa-globe"></i></a>
                                    <a href="" style="color: white; padding-right: 5px;"><i class="fa fa-facebook"></i></a>
                                    <a href="" style="color: white; padding-right: 5px;"><i class="fa fa-twitter"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td height="30" style="font-size: 30px; line-height: 30px;">&nbsp;</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <!-- /TABLE FOOTER -->

        </body>
        </html>
        <?php
        $message = ob_get_contents();
        $mail = mail($to, $sujet, $message, $headers);
        if($mail === TRUE)
        {
            header("Location: ../index.php?view=login&sub=reset-password&success=reset-password-1");
        }else{
            header("Location: ../index.php?view=login&sub=reset-password&error=reset-password-1");
        }
    }else{
        header("Location: ../index.php?view=login&sub=reset-password&error=correspondance");
    }

}
if(isset($_GET['action']) && $_GET['action'] == 'reset-password-2')
{
    include "../app/classe.php";
    $token = $_GET['token'];
    $ex = explode("_", $token);
    $ip = $ex[2];
    $heure = $ex[0];
    $idclient = $ex[3];
    $heure_actuel = strtotime(date("H:i"));
    $ip_actuel = sha1($_SERVER['REMOTE_ADDR']);

    $sql_client = mysql_query("SELECT * FROM client WHERE idclient = '$idclient'")or die(mysql_error());
    $client = mysql_fetch_array($sql_client);
    $email = $client['email'];

    //Vérification heure
    if($heure >= ($heure_actuel-900))
    {
        if($ip == $ip_actuel)
        {
            $new_pass_clear = $fonction->gen_password();
            $new_pass_crypt = sha1($email."_".$new_pass_clear);

            $sql_up_user = mysql_query("UPDATE client SET password = '$new_pass_crypt' WHERE idclient = '$idclient'")or die(mysql_error());

            $to = $email;
            $sujet = "GA%ESHOP - 2/2 Réinitialisation de votre mote de passe";


            $headers = 'Mime-Version: 1.0'."\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
            $headers .= "\r\n";
            ob_start();
            ?>
            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
            <html xmlns:v="urn:shemas-microsoft-com:vml">
            <head>
                <meta http-equiv="content-type" content="text/html; charset=utf-8">
                <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0">
                <title>Réinitialisation de votre mot de passe 1/2</title>
                <link href='https://fonts.googleapis.com/css?family=Product+Sans' rel='stylesheet' type='text/css'>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
            </head>
            <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

            <!--TABLE HEAD-->
            <table bgcolor="#131448" width="100%" border="0" cellpadding="0" cellspacing="0">
                <tbody>
                <tr>
                    <td background="http://imgur.com/kBStm0X" bgcolor="#373e80" valign="top">
                        <!--[if gte mso 9]>
                        <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="mso-width-percent:1000;">
                            <v:fill type="tile" src="http://imgur.com/kBStm0X" color="#373e80" />
                            <v:textbox style="mso-fit-shape-to-text:true" inset="0,0,0,0">
                        <![endif]-->
                        <div>
                            <table align="center" width="590" border="0" cellpadding="0" cellspacing="0">
                                <tbody>
                                <tr>
                                    <td height="70" style="font-size: 30px; line-height: 30px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" style="text-align: center;">
                                        <a href="http://vps221243.ovh.net/gameshop/">
                                            <img src="http://vps221243.ovh.net/gameshop/assets/images/logo.png" width="240" border="0" alt="Logo GAMESHOP" />
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="30" style="font-size: 30px; line-height: 30px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" style="text-align: center; font-size: 25px; color: white; mso-line-height-rule: exactly; line-height: 30px; font-family: 'Product Sans',Helvetica, Arial, sans-serif">
                                        Réinitialisation de Votre Mot de Passe<br>2 / 2
                                    </td>
                                </tr>
                                <tr>
                                    <td height="30" style="font-size: 30px; line-height: 30px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table align="center" width="45" border="0" cellpadding="0" cellspacing="0" bgcolor="#1eff83">
                                            <tbody>
                                            <tr>
                                                <td height="4" style="font-size: 4px; line-height: 4px;"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--[if gte mso 9]>
                        </v:textbox>
                        </v:rect>
                        <![endif]-->
                    </td>
                </tr>
                </tbody>
            </table>
            <!-- / TABLE HEAD -->

            <!-- TABLE CORPS -->
            <table bgcolor="#2c3164" width="100%" border="0" cellpadding="0" cellspacing="0">
                <tbody>
                <tr>
                    <td height="30" style="font-size: 30px; line-height: 30px;">&nbsp;</td>
                </tr>
                <tr>
                    <td>
                        <table align="center" width="590" border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                            <tr>
                                <td align="left" style="text-align: left; font-size: 13px; color: #989bb9; font-family: 'Product Sans',Helvetica, Arial, sans-serif">
                                    <p>Bonjour,</p>
                                    <p>Suite à la validation de votre demande de réinitialisation de votre mot de passe, le système à définie le mot de passe suivant:</p><br>
                                    <ul>
                                        <li><strong>Mot de Passe:</strong> <?= $password; ?></li>
                                    </ul>
                                    <p>
                                        Afin de garantir une sécurité optimal:
                                    <ul>
                                        <li>Veuillez changer ce mot de passe par celui de votre choix.</li>
                                        <li>Si vous le souhaitez, une authentification à 2 facture (Google Authentificator) est disponible, pour plus d'information, consulter la page <i>Wiki > Mon compte > Guide Authentificateur Google</i></li>
                                    </ul>
                                    </p>
                                    <p>Si vous avez des question sur l'utilisation de nos services, n'hésitez pas à nous recontacter.</p>
                                    <p>Cordialement,</p><br>
                                    <p>LE SUPPORT TECHNIQUE<br><i>GWCSWD</i></p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td height="30" style="font-size: 30px; line-height: 30px;">&nbsp;</td>
                </tr>
                </tbody>
            </table>
            <!-- /TABLE CORPS -->

            <!-- TABLE FOOTER -->
            <table bgcolor="#131448" width="100%" border="0" cellpadding="0" cellspacing="0">
                <tbody>
                <tr>
                    <td background="http://imgur.com/kBStm0X" bgcolor="#373e80" valign="top">
                        <!--[if gte mso 9]>
                        <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="mso-width-percent:1000;">
                            <v:fill type="tile" src="http://imgur.com/kBStm0X" color="#373e80" />
                            <v:textbox style="mso-fit-shape-to-text:true" inset="0,0,0,0">
                        <![endif]-->
                        <div>
                            <table align="center" width="590" border="0" cellpadding="0" cellspacing="0">
                                <tbody>
                                <tr>
                                    <td height="30" style="font-size: 30px; line-height: 30px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="left" style="text-align: left; font-size: 15px; color: white; font-family: 'Product Sans',Helvetica, Arial, sans-serif">
                                        <img src="http://vps221243.ovh.net/gameshop/assets/images/logo.png" width="240" border="0" alt="Logo GAMESHOP" />
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" style="text-align: right; font-size: 15px; color: white; font-family: 'Product Sans',Helvetica, Arial, sans-serif">
                                        <a href="" style="color: white; padding-right: 5px;"><i class="fa fa-globe"></i></a>
                                        <a href="" style="color: white; padding-right: 5px;"><i class="fa fa-facebook"></i></a>
                                        <a href="" style="color: white; padding-right: 5px;"><i class="fa fa-twitter"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="30" style="font-size: 30px; line-height: 30px;">&nbsp;</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <!-- /TABLE FOOTER -->

            </body>
            </html>
            <?php
            $message = ob_get_contents();
            $mail = mail($to, $sujet, $message, $headers);
            if($mail === TRUE && $sql_up_user === TRUE)
            {
                header("Location: ../index.php?view=login&success=reset-password-2");
            }else{
                header("Location: ../index.php?view=login&error=reset-password-2");
            }

        }else{
            header("Location: ../index.php?view=login&sub=reset-password&error=ip-correspondance");
        }
    }else{
        header("Location: ../index.php?view=login&sub=reset-password&warning=timeout");
    }
}