<?php
if(isset($_POST['action']) && $_POST['action'] == 'create-account')
{
    require "../app/classe.php";
    $params = array(
        "email"         => $_POST['email'],
        "password"      => sha1($_POST['email']."_".$_POST['password']),
        "nom_client"    => $_POST['nom_client'],
        "prenom_client" => $_POST['prenom_client']
    );

    $create = $DB->execute("INSERT INTO client(idclient, email, password, nom_client, prenom_client, pseudo_psn, pass_psn, pseudo_xbox, pseudo_nintendo, pseudo_steam, point) VALUES
                            (NULL, :email, :password, :nom_client, :prenom_client, '', '', '', '', '', 0)", $params);

    if($create == 1)
    {
        $to = $_POST['email'];
        $sujet = "GAMESHOP - Votre Inscription à notre Boutique !";
        $headers = 'Mime-Version: 1.0'."\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
        $headers .= "\r\n";
        ob_start();
        ?>
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns:v="urn:schemas-microsoft-com:vml">
        <head>

            <!-- Define Charset -->
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

            <!-- Responsive Meta Tag -->
            <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />

            <link href='http://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>
            <link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>

            <title>Notification 7 - Responsive Email Template</title><!-- Responsive Styles and Valid Styles -->

            <style type="text/css">

                body{
                    width: 100%;
                    background-color: #ffffff;
                    margin:0;
                    padding:0;
                    -webkit-font-smoothing: antialiased;
                    mso-margin-top-alt:0px; mso-margin-bottom-alt:0px; mso-padding-alt: 0px 0px 0px 0px;
                }

                p,h1,h2,h3,h4{
                    margin-top:0;
                    margin-bottom:0;
                    padding-top:0;
                    padding-bottom:0;
                }

                span.preheader{display: none; font-size: 1px;}

                html{
                    width: 100%;
                }

                table{
                    font-size: 14px;
                    border: 0;
                }

                /* ----------- responsivity ----------- */
                @media only screen and (max-width: 640px){
                    /*------ top header ------ */
                    body[yahoo] .show{display: block !important;}
                    body[yahoo] .hide{display: none !important;}

                    /*----- main image -------*/
                    body[yahoo] .main-image img{width: 440px !important; height: auto !important;}

                    /* ====== divider ====== */
                    body[yahoo] .divider img{width: 440px !important;}

                    /*--------- banner ----------*/
                    body[yahoo] .banner img{width: 440px !important; height: auto !important;}
                    /*-------- container --------*/
                    body[yahoo] .container590{width: 440px !important;}
                    body[yahoo] .container580{width: 400px !important;}
                    body[yahoo] .container1{width: 420px !important;}
                    body[yahoo] .container2{width: 400px !important;}
                    body[yahoo] .container3{width: 380px !important;}

                    /*-------- secions ----------*/
                    body[yahoo] .section-item{width: 440px !important;}
                    body[yahoo] .section-img img{width: 440px !important; height: auto !important;}
                }

                @media only screen and (max-width: 479px){
                    /*------ top header ------ */
                    body[yahoo] .main-header{font-size: 24px !important;}
                    body[yahoo] .resize-text{font-size: 14px !important;}

                    /*----- main image -------*/
                    body[yahoo] .main-image img{width: 280px !important; height: auto !important;}

                    /* ====== divider ====== */
                    body[yahoo] .divider img{width: 280px !important;}
                    body[yahoo] .align-center{text-align: center !important;}


                    /*-------- container --------*/
                    body[yahoo] .container590{width: 280px !important;}
                    body[yahoo] .container580{width: 250px !important;}
                    body[yahoo] .container1{width: 260px !important;}
                    body[yahoo] .container2{width: 240px !important;}
                    body[yahoo] .container3{width: 220px !important;}

                    /*------- CTA -------------*/
                    body[yahoo] .cta-button{width: 200px !important;}
                    body[yahoo] .cta-text{font-size: 14px !important;}
                }

            </style>
        </head>

        <body yahoo="fix" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">



        <table style="background-image: url(http://themastermail.com/alerta/notif7/img/main-bg.png); background-size: 100% 100%; background-position: top center;" class="main-bg" background="http://themastermail.com/alerta/notif7/img/main-bg.png" bgcolor="2b2e34" border="0" cellpadding="0" cellspacing="0" width="100%">

            <tbody><tr><td style="font-size: 90px; line-height: 90px;" height="90">&nbsp;</td></tr>

            <tr>
                <td>
                    <table class="container590 bodybg_color" style="background-image: url(http://themastermail.com/alerta/notif7/img/bg.png); background-size: 100% 100%; background-position: top center; background-repeat: no-repeat;" align="center" background="http://themastermail.com/alerta/notif7/img/bg.png" border="0" cellpadding="0" cellspacing="0" width="537">

                        <tbody><tr><td style="font-size: 40px; line-height: 40px;" height="40">&nbsp;</td></tr>

                        <tr>
                            <td>
                                <table align="center" border="0" cellpadding="0" cellspacing="0">
                                    <tbody><tr>
                                        <!-- ======= logo ======= -->
                                        <td align="center">
                                            <a href="" style="display: block; border-style: none !important; border: 0 !important;" class="editable_img"><img class="" style="display: block; width: 35px;" src="http://vps221243.ovh.net/gameshop/assets/images/logo.png" alt="logo" border="0" width="35"></a>
                                        </td>
                                    </tr>
                                    </tbody></table>
                            </td>
                        </tr>

                        <tr><td style="font-size: 60px; line-height: 60px;" height="60">&nbsp;</td></tr>

                        <tr>
                            <td style="color: #181c27; font-size: 30px; font-family: 'Questrial', sans-serif; mso-line-height-rule: exactly; line-height: 30px;" class="title_color main-header" align="center">

                                <!-- ======= section header ======= -->

                                <div class="editable_text" style="line-height: 30px;">
								<span class="text_container">Bienvenue sur
Gameshop</span>
                                </div>
                            </td>
                        </tr>

                        <tr><td style="font-size: 55px; line-height: 55px;" height="55">&nbsp;</td></tr>

                        <tr>
                            <td>
                                <table class="container580" align="center" border="0" cellpadding="0" cellspacing="0" width="440">
                                    <tbody><tr>
                                        <td style="color: #8d94a3; font-size: 16px; font-family: 'Questrial', sans-serif; mso-line-height-rule: exactly; line-height: 24px;" class="resize-text text_color" align="center">
                                            <div class="editable_text" style="line-height: 24px">

                                                <!-- ======= section text ======= -->
                                                <span class="text_container">Profitez d'avantages exclusifs sur les précommandes de jeux vidéo à des prix défiants toutes concurrences.</span>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody></table>
                            </td>
                        </tr>

                        <tr><td style="font-size: 35px; line-height: 35px;" height="35">&nbsp;</td></tr>

                        <tr>
                            <td align="center">

                                <table style="border-radius: 50px; box-shadow: 0 2px 0 2px #ca5168;" class="cta-button button_color" align="center" bgcolor="ea667f" border="0" cellpadding="0" cellspacing="0" width="300">

                                    <tbody><tr><td style="font-size: 17px; line-height: 17px;" height="17">&nbsp;</td></tr>

                                    <tr>

                                        <td style="color: #ffffff; font-size: 18px; font-family: 'Questrial', sans-serif;" class="cta-text" align="center">
                                            <!-- ======= main section button ======= -->

                                            <div class="editable_text" style="line-height: 24px;">
                                                <span class="text_container"><a href="https://vps221243.ovh.net/gameshop/" style="color: #ffffff; text-decoration: none;">Retour sur le site</a></span>
                                            </div>
                                        </td>

                                    </tr>

                                    <tr><td style="font-size: 17px; line-height: 17px;" height="17">&nbsp;</td></tr>

                                    </tbody></table>
                            </td>
                        </tr>

                        <tr><td style="font-size: 55px; line-height: 55px;" height="55">&nbsp;</td></tr>

                        <tr>
                            <td>
                                <table class="container580" align="center" border="0" cellpadding="0" cellspacing="0" width="440">
                                    <tbody><tr>
                                        <td style="color: #8d94a3; font-size: 14px; font-family: 'Questrial', sans-serif; line-height: 22px;" class="text_color" align="center">
                                            <!-- ======= section subtitle ====== -->

                                            <div class="editable_text" style="line-height: 22px;">
				        					<span class="text_container">

													<a href="" style="color: #8d94a3; text-decoration: none;" class="text_color">About us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="" style="color: #8d94a3; text-decoration: none;" class="text_color">Unsubscribe</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="" style="color: #8d94a3; text-decoration: none;" class="text_color">Contact</a>

				        					</span>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody></table>
                            </td>
                        </tr>

                        <tr><td style="font-size: 60px; line-height: 60px;" height="60">&nbsp;</td></tr>

                        </tbody></table>
                </td>
            </tr>

            <tr><td style="font-size: 40px; line-height: 40px;" height="40">&nbsp;</td></tr>

            <tr>
                <td>
                    <table class="container590 bodybg_color" align="center" border="0" cellpadding="0" cellspacing="0" width="500">
                        <tbody><tr>
                            <td>
                                <table style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="container590" align="left" border="0" cellpadding="0" cellspacing="0">

                                    <tbody><tr>
                                        <td style="color: #ffffff; font-size: 14px; font-family: 'Questrial', sans-serif; line-height: 22px;" class="text2_color" align="center">
                                            <div class="editable_text" style=" line-height: 22px;">
			        						<span class="text_container">

			            						© 2016 GAMESHOP UX DESIGNER. All Rights Reserved.

			        						</span>
                                            </div>
                                        </td>
                                    </tr>

                                    </tbody></table>

                                <table style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="container590" align="left" border="0" cellpadding="0" cellspacing="0" width="5">
                                    <tbody><tr><td style="font-size: 20px; line-height: 20px;" height="20" width="5">&nbsp;</td></tr>
                                    </tbody></table>

                                <table style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="container590" align="right" border="0" cellpadding="0" cellspacing="0">
                                    <tbody><tr>
                                        <td align="center">
                                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="75">
                                                <tbody><tr><td style="font-size: 5px; line-height: 5px;" height="5">&nbsp;</td></tr>
                                                <tr>
                                                    <td align="center">
                                                        <table align="center" border="0" cellpadding="0" cellspacing="0">
                                                            <tbody><tr>
                                                                <td>
                                                                    <a style="display: block; width: 12px; height: 12px; border-style: none !important; border: 0 !important;" href="#" class="editable_img"><img style="display: block; width: 12px; height: 12px;" src="http://themastermail.com/alerta/notif7/img/instagram.png" alt="instagram" border="0" height="12" width="12"></a>
                                                                </td>
                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                <td>
                                                                    <a style="display: block; width: 8px; height: 13px; border-style: none !important; border: 0 !important;" href="#" class="editable_img"><img style="display: block; width: 8px; height: 13px;" src="http://themastermail.com/alerta/notif7/img/facebook.png" alt="facebook" border="0" height="13" width="8"></a>
                                                                </td>
                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                <td>
                                                                    <a style="display: block; width: 13px; height: 13px; border-style: none !important; border: 0 !important;" href="#" class="editable_img"><img style="display: block; width: 13px; height: 13px;" src="http://themastermail.com/alerta/notif7/img/google.png" alt="google" border="0" height="13" width="13"></a>
                                                                </td>
                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                <td>
                                                                    <a style="display: block; width: 13px; height: 10px; border-style: none !important; border: 0 !important;" href="#" class="editable_img"><img style="display: block; width: 13px; height: 10px;" src="http://themastermail.com/alerta/notif7/img/twitter.png" alt="twitter" border="0" height="10" width="13"></a>
                                                                </td>
                                                            </tr>
                                                            </tbody></table>
                                                    </td>
                                                </tr>
                                                </tbody></table>
                                        </td>
                                    </tr>

                                    </tbody></table>
                            </td>
                        </tr>
                        </tbody></table>
                </td>
            </tr>

            <tr><td style="font-size: 50px; line-height: 50px;" height="50">&nbsp;</td></tr>
            <tr><td style="font-size: 50px; line-height: 50px;" height="50">&nbsp;</td></tr>

            </tbody></table>


        </body>
        </html>
        <?php
        $message = ob_get_clean();
        $mail = mail($to, $sujet, $message, $headers);
        if($mail == true)
        {
            header("Location: ../index.php?view=login&sub=create-account-success");
        }else{
            echo "ERREUR !";
        }
    }
}
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