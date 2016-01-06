<?php
require dirname(__DIR__)."/app/autoloader.php";
\App\autoloader::register();

//VENDOR COMPOSER
include dirname(__DIR__)."/vendor/autoload.php";

use App\app;
use App\commande\commande;
use App\constante;
use App\date_format;
use App\fonction;
use App\general\categorie;
use App\general\client;
use App\general\head;
use App\general\produit;
use App\networker\xboxLive;
use SteamApi\Player;
use SteamApi\User;

$app = new app();
$constante = new constante();
$date_format = new date_format();
$fonction = new fonction();
$head = new head();
$categorie_cls = new categorie();
$produit_cls = new produit();
$client_cls = new client();

$cmd_cls = new commande();




if(isset($_SESSION['logged'])){
    $info_client = $client_cls->info_client($_SESSION['email']);
/*
    if(!empty($info_client['pseudo_psn']))
    {

                $client_psn = new \Guzzle\Http\Client('', ['redirect.disable' => true]);
                $connect_psn = new \Gumer\PSN\Http\Connection('FR', 'FR');
                $connect_psn->setGuzzle($client_psn);
                $provider_psn = new \Gumer\PSN\Authentication\UserProvider($connect_psn);
                $auth_psn = \Gumer\PSN\Authentication\Manager::instance($provider_psn);

                $auth_psn->attempt($info_client['pseudo_psn'], $info_client['pass_psn']);
        //$auth_psn->attempt('syltheron@gmail.com', '1992maxime');

        //Info PSN
                $request_info = new \Gumer\PSN\Requests\GetMyInfoRequest();
                $response_info = $connect_psn->call($request_info);
                $info = json_decode($response_info->getBody(true), true);
                //

        //Profil
                $request_profil = new \Gumer\PSN\Requests\ProfileRequest();
                $request_profil->setUserId($info['onlineId']);
                $response_profil = $connect_psn->call($request_profil);
                $profil = json_decode($response_profil->getBody(true), true);
                //var_dump($profil);
        //FriendList
                $request_friend = new \Gumer\PSN\Requests\FriendsListRequest();
                $request_friend->setUserId($info['onlineId']);
                $response_friend = $connect_psn->call($request_friend);
                $friend = json_decode($response_friend->getBody(true), true);

    }
*/


    $xbox = new xboxLive($info_client['pseudo_xbox']);
    $xuid = $xbox->xuid_declare($info_client['pseudo_xbox']);
    $gameTag = $info_client['pseudo_xbox'];

    $sql_xbox_profil = mysql_query("SELECT * FROM xbox_profile WHERE xuid = '$xuid'")or die(mysql_error());
    $xbox_profil = mysql_fetch_array($sql_xbox_profil);

    $sql_gamercard = mysql_query("SELECT * FROM xbox_gamercard WHERE gamertag = '$gameTag'")or die(mysql_error());
    $gamercard = mysql_fetch_array($sql_gamercard);

    $sql_presence = mysql_query("SELECT * FROM xbox_presence WHERE xuid = '$xuid'")or die(mysql_error());
    $presence = mysql_fetch_array($sql_presence);
    $sql_lastseen = mysql_query("SELECT * FROM xbox_presence_lastseen WHERE xuid = '$xuid'")or die(mysql_error());
    $lastseen = mysql_fetch_array($sql_lastseen);

    if(!empty($info_client['pseudo_steam']))
    {

        $steam = new User('444446B16CB7611E5E74F4752A35EB5C', $info_client['pseudo_steam']);
        $steam_friendList = $steam->GetFriendList();
        $steam_playerSummary = $steam->GetPlayerSummaries();
        //var_dump($steam_friendList);
        //var_dump($steam_playerSummary);


        $steam_player = new Player('444446B16CB7611E5E74F4752A35EB5C', $info_client['pseudo_steam']);
        $steam_p_level = $steam_player->GetSteamLevel();
        $steam_p_level_detail = $steam_player->GetPlayerLevelDetails();

        //var_dump($steam_p_level);
        //var_dump($steam_p_level_detail);
        //die();
    }
}







