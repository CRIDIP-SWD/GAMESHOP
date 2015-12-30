<?php

use App\networker\xboxLive;

include "../app/classe.php";

include "../app/networker/xboxLive.php";

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
        
        $sqlprofile = mysql_query("INSERT INTO xbox_profile(id, hostId, GameDisplayName, AppDisplayName, Gamerscore, GameDisplayPicRaw, AppDisplayPicRaw, AccountTier, XboxOneRep, PreferredColor, TenureLevel, isSponsoredUser) 
                                  VALUES ('$id', '$hostId', '$GameDisplayName', '$AppDisplayName', '$Gamerscore', '$GameDisplayPicRaw', '$AppDisplayPicRaw', '$AccountTier', '$XboxOneRep', '$PreferredColor', '$TenureLevel', '$isSponsoredUser')")or die(mysql_error());
        
        if($sqlprofile === FALSE)
        {
            $error = array("PROFIL" => "ERREUR LORS DE L'IMPORT DU PROFIL");
        }else{
            $error = array("PROFIL" => "OK");
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
        $error = array("GAMERCARD" => "ERREUR LORS DE L'IMPORT DE LA GAMERCARD");
    }else{
        $error = array("GAMERCARD" => "OK");
    }

    //PRESENCE

        $sql_del = mysql_query("DELETE FROM xbox_presence WHERE xuid = '$xuid'")or die(mysql_error());

        $state = $xbox_presence['state'];

        $sqlpresence = mysql_query("INSERT INTO xbox_presence(xuid, state) VALUES ('$xuid', '$state')")or die(mysql_error());

    if($sqlpresence === FALSE)
    {
        $error = array("PRESENCE" => "ERREUR LORS DE L'IMPORT DE LA PRESENCE");
    }else{
        $error = array("PRESENCE" => "OK");
    }

    //PRESENCE LASTSEEN

        $sql_del = mysql_query("DELETE FROM xbox_presence_lastseen WHERE xuid = '$xuid'")or die(mysql_error());

        $deviceType = $xbox_presence['lastSeen']['deviceType'];
        $titleId = $xbox_presence['lastSeen']['titleId'];
        $titleName = $xbox_presence['lastSeen']['titleName'];
        $timestamp = $xbox_presence['lastSeen']['timestamp'];

        $sqllastseen = mysql_query("INSERT INTO xbox_presence_lastseen(xuid, deviceType, titleId, titleName, timestamp)
                                    VALUES ('$xuid', '$deviceType', '$titleId', '$titleName', '$timestamp')")or die(mysql_error());

    if($sqllastseen === FALSE)
    {
        $error = array("DERNIER VU" => "ERREUR LORS DE L'IMPORT DU DERNIER VU");
    }else{
        $error = array("DERNIER VU" => "OK");
    }

    //ACTIVITY

        $sql_del = mysql_query("DELETE FROM xbox_activity WHERE xuid = '$xuid'")or die(mysql_error());

    $startTime = $xbox_activity[0]['startTime'];
    $endTime = $xbox_activity[0]['endTime'];
    $sessionDurationInMinutes = $xbox_activity[0]['sessionDurationInMinutes'];
    $contentImageUri = $xbox_activity[0]['contentImageUri'];
    $bingId = $xbox_activity[0]['bingId'];
    $contentTitle = $xbox_activity[0]['contentTitle'];
    $vuiDisplayName = $xbox_activity[0]['vuiDisplayName'];
    $platform = $xbox_activity[0]['platform'];
    $description = $xbox_activity[0]['description'];


    $sqlactivity = mysql_query("INSERT INTO xbox_activity(idactivity, xuid, startTime, endTime, sessionDurationInMinutes, contentImageUri, bingId, contentTitle, vuiDisplayName, platform, description)
                              VALUES (NULL, '$xuid', '$startTime', '$endTime', '$sessionDurationInMinutes', '$contentImageUri', '$bingId', '$contentTitle', '$vuiDisplayName', '$platform', '$description')")or die(mysql_error());


    if($sqlactivity === FALSE)
    {
        $error = array("ACTIVITE" => "ERREUR LORS DE L'IMPORT DE L'ACTIVITE");
    }else{
        $error = array("ACTIVITE" => "OK");
    }

    var_dump($error);
}

