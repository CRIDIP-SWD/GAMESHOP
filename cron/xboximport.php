<?php

use App\networker\xboxLive;

include dirname(__DIR__)."/app/classe.php";

include dirname(__DIR__)."/app/networker/xboxLive.php";

$sql_client = mysql_query("SELECT * FROM client")or die(mysql_error());
while($client = mysql_fetch_array($sql_client)){
    $error = array();
    $email = $client['email'];
    $nom_client = $client['nom_client'];
    $prenom_client = $client['prenom_client'];
    $pseudo_psn = $client['pseudo_psn'];
    $pass_psn = $client['pass_psn'];
    $pseudo_xbox = $client['pseudo_xbox'];
    $pseudo_steam = $client['pseudo_steam'];
    $point = $client['point'];

    $xbox = new xboxLive($pseudo_xbox);
    $xbox_profil = $xbox->profile();
    $xbox_gamercard = $xbox->gamercard();
    $xbox_presence = $xbox->presence();
    $xbox_activity = $xbox->activity();
    $xbox_r_activity = $xbox->recent_activity();
    $xbox_friend = $xbox->friends();

    $xuid = $xbox_profil['id'];



    $sql_check_profil = mysql_query("SELECT count(id) FROM xbox_profile WHERE id = '$xuid'")or die(mysql_error());
    $check_profil = mysql_result($sql_check_profil, 0);

    $sql_check_gamercard = mysql_query("SELECT count(gamertag) FROM xbox_gamercard WHERE gamertag = '$pseudo_xbox'")or die(mysql_error());
    $check_gamercard = mysql_result($sql_check_gamercard, 0);

    $sql_check_presence = mysql_query("SELECT count(xuid) FROM xbox_presence WHERE xuid = '$xuid'")or die(mysql_error());
    $check_presence = mysql_result($sql_check_presence, 0);

    $sql_check_presence_lastseen = mysql_query("SELECT count(xuid) FROM xbox_presence_lastseen WHERE xuid = '$xuid'")or die(mysql_error());
    $check_presence_lastseen = mysql_result($sql_check_presence_lastseen, 0);

    $sql_check_activity = mysql_query("SELECT count(xuid) FROM xbox_activity WHERE xuid = '$xuid'")or die(mysql_error());
    $check_activity = mysql_result($sql_check_activity, 0);
    
    //PROFILE
        $sql_del = mysql_query("DELETE FROM xbox_profile WHERE id = '$xuid'")or die(mysql_error());
        // Import Profile
        $id = $xbox_profil['id'];
        $hostId = $xbox_profil['hostId'];
        $Gamertag = $xbox_profil['Gamertag'];
        $GameDisplayName = $xbox_profil['GameDisplayName'];
        $AppDisplayName = $xbox_profil['AppDisplayName'];
        $Gamerscore = $xbox_profil['Gamerscore'];
        $GameDisplayPicRaw = $xbox_profil['GameDisplayPicRaw'];
        $AppDisplayPicRaw = $xbox_profil['AppDisplayPicRaw'];
        $AccountTier = $xbox_profil['AccountTier'];
        $XboxOneRep = $xbox_profil['XboxOneRep'];
        $PreferredColor = $xbox_profil['PreferredColor'];
        $TenureLevel = $xbox_profil['TenureLevel'];
        $isSponsoredUser = $xbox_profil['isSponsoredUser'];
        
        $sqlprofile = mysql_query("INSERT INTO xbox_profile(id, xuid, hostId, GameDisplayName, AppDisplayName, Gamerscore, GameDisplayPicRaw, AppDisplayPicRaw, AccountTier, XboxOneRep, PreferredColor, TenureLevel, isSponsoredUser)
                                  VALUES (NULL, '$id','$hostId', '$GameDisplayName', '$AppDisplayName', '$Gamerscore', '$GameDisplayPicRaw', '$AppDisplayPicRaw', '$AccountTier', '$XboxOneRep', '$PreferredColor', '$TenureLevel', '$isSponsoredUser')")or die(mysql_error());
        
        if($sqlprofile === FALSE)
        {
            $error .= array("PROFIL" => "ERREUR LORS DE L'IMPORT DU PROFIL");
        }else{
            $error .= array("PROFIL" => "OK");
        }
    
    //GAMERCARD
        
        $sql_del = mysql_query("DELETE FROM xbox_gamercard WHERE gamertag = '$pseudo_xbox'")or die(mysql_error());
        
        $gamertag = $xbox_gamercard['gamertag'];
        $name = $xbox_gamercard['name'];
        $location = htmlentities(addslashes($xbox_gamercard['location']));
        $bio = htmlentities(addslashes($xbox_gamercard['bio']));
        $gamerscore = $xbox_gamercard['gamerscore'];
        $tier = $xbox_gamercard['tier'];
        $motto = $xbox_gamercard['motto'];
        $avatarBodyImagePath = $xbox_gamercard['avatarBodyImagePath'];
        $gamerpicSmallImagePath = $xbox_gamercard['gamerpicSmallImagePath'];
        $gamerpicLargeImagePath = $xbox_gamercard['gamerpicLargeImagePath'];
        $gamerpicSmallSslImagePath = $xbox_gamercard['gamerpicSmallSslImagePath'];
        $gamerpicLargeSslImagePath = $xbox_gamercard['gamerpicLargeSslImagePath'];
        $avatarManifest = $xbox_gamercard['avatarManifest'];
        
        
        $sqlgamercard = mysql_query("INSERT INTO xbox_gamercard(id, gamertag, name, location, bio, gamerscore, tier, motto, avatarBodyImagePath, gamerpicSmallImagePath, gamerpicLargeImagePath, gamerpicSmallSslImagePath, gamerpicLargeSslImagePath, avatarManifest) 
                                    VALUES (NULL, '$gamertag', '$name', '$location', '$bio', '$gamerscore', '$tier', '$motto', '$avatarBodyImagePath', '$gamerpicSmallImagePath', '$gamerpicLargeImagePath', '$gamerpicSmallSslImagePath', '$gamerpicLargeSslImagePath', '$avatarManifest')")or die(mysql_error());

    if($sqlgamercard === FALSE)
    {
        $error .= array("GAMERCARD" => "ERREUR LORS DE L'IMPORT DE LA GAMERCARD");
    }else{
        $error .= array("GAMERCARD" => "OK");
    }

    //PRESENCE

        $sql_del = mysql_query("DELETE FROM xbox_presence WHERE xuid = '$xuid'")or die(mysql_error());

        $state = $xbox_presence['state'];

        $sqlpresence = mysql_query("INSERT INTO xbox_presence(id, xuid, state) VALUES (NULL, '$xuid', '$state')")or die(mysql_error());

    if($sqlpresence === FALSE)
    {
        $error .= array("PRESENCE" => "ERREUR LORS DE L'IMPORT DE LA PRESENCE");
    }else{
        $error .= array("PRESENCE" => "OK");
    }

    //PRESENCE LASTSEEN

        $sql_del = mysql_query("DELETE FROM xbox_presence_lastseen WHERE xuid = '$xuid'")or die(mysql_error());

        $deviceType = $xbox_presence['lastSeen']['deviceType'];
        $titleId = $xbox_presence['lastSeen']['titleId'];
        $titleName = $xbox_presence['lastSeen']['titleName'];
        $timestamp = $xbox_presence['lastSeen']['timestamp'];

        $sqllastseen = mysql_query("INSERT INTO xbox_presence_lastseen(id, xuid, deviceType, titleId, titleName, timestamp)
                                    VALUES (NULL, '$xuid', '$deviceType', '$titleId', '$titleName', '$timestamp')")or die(mysql_error());

    if($sqllastseen === FALSE)
    {
        $error .= array("DERNIER VU" => "ERREUR LORS DE L'IMPORT DU DERNIER VU");
    }else{
        $error .= array("DERNIER VU" => "OK");
    }

    //ACTIVITY

        $sql_del = mysql_query("DELETE FROM xbox_activity WHERE xuid = '$xuid'")or die(mysql_error());

    $startTime = $xbox_activity['startTime'];
    $endTime = $xbox_activity['endTime'];
    $sessionDurationInMinutes = $xbox_activity['sessionDurationInMinutes'];
    $contentImageUri = $xbox_activity['contentImageUri'];
    $bingId = $xbox_activity['bingId'];
    $contentTitle = $xbox_activity['contentTitle'];
    $vuiDisplayName = $xbox_activity['vuiDisplayName'];
    $platform = $xbox_activity['platform'];
    $description = $xbox_activity['description'];


    $sqlactivity = mysql_query("INSERT INTO xbox_activity(idactivity, xuid, startTime, endTime, sessionDurationInMinutes, contentImageUri, bingId, contentTitle, vuiDisplayName, platform, description)
                              VALUES (NULL, '$xuid', '$startTime', '$endTime', '$sessionDurationInMinutes', '$contentImageUri', '$bingId', '$contentTitle', '$vuiDisplayName', '$platform', '$description')")or die(mysql_error());


    if($sqlactivity === FALSE)
    {
        $error .= array("ACTIVITE" => "ERREUR LORS DE L'IMPORT DE L'ACTIVITE");
    }else{
        $error .= array("ACTIVITE" => "OK");
    }

    $to = "gamedistri@gmail.com";
    $sujet = "TACHE CRON - IMPORT XBOX LIVE";
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
        <title><?= $sujet; ?></title>
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
                                <a href="http://gestcom.cridip.com">
                                    <img src="http://vps221243.ovh.net/gameshop/assets/images/logo.png" width="240" border="0" alt="Logo GAMESHOP" />
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td height="30" style="font-size: 30px; line-height: 30px;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="center" style="text-align: center; font-size: 25px; color: white; mso-line-height-rule: exactly; line-height: 30px; font-family: 'Product Sans',Helvetica, Arial, sans-serif">
                                <?= $sujet; ?>
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
                           <table style="width: 100%;">
                               <tbody>
                                    <tr>
                                        <td style="width: 50%;">PROFIL</td>
                                        <td style="width: 50%;"><?= $error['PROFIL']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 50%;">GAMERCARD</td>
                                        <td style="width: 50%;"><?= $error['GAMERCARD']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 50%;">PRESENCE</td>
                                        <td style="width: 50%;"><?= $error['PRESENCE']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 50%;">ACTIVITE</td>
                                        <td style="width: 50%;"><?= $error['ACTIVITE']; ?></td>
                                    </tr>
                               </tbody>
                           </table>
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
                                <img src="http://gestcom.cridip.com/assets/img/logo2x_white.png" width="240" border="0" alt="Logo CRIDIP" />
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
    mail($to, $sujet, $message, $headers);
}

