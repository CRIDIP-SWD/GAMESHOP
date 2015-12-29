<?php
require dirname(__DIR__)."/app/autoloader.php";
\App\autoloader::register();

use App\app;
use App\constante;
use App\date_format;
use App\fonction;
use App\general\categorie;
use App\general\client;
use App\general\head;
use App\general\produit;
use App\networker\xboxLive;

$app = new app();
$constante = new constante();
$date_format = new date_format();
$fonction = new fonction();
$head = new head();
$categorie_cls = new categorie();
$produit_cls = new produit();
$client_cls = new client();




if(isset($_SESSION['logged'])){
    $info_client = $client_cls->info_client($_SESSION['email']);
}


//VENDOR COMPOSER
include dirname(__DIR__)."/vendor/autoload.php";

/*
 * PSN NETWORK API INIT
 */
$client_psn = new \Guzzle\Http\Client('', ['redirect.disable' => true]);
$connect_psn = new \Gumer\PSN\Http\Connection('FR', 'FR');
$connect_psn->setGuzzle($client_psn);
$provider_psn = new \Gumer\PSN\Authentication\UserProvider($connect_psn);
$auth_psn = \Gumer\PSN\Authentication\Manager::instance($provider_psn);

$auth_psn->attempt('syltheron@gmail.com', '1992maxime');

//Info PSN
$request_info = new \Gumer\PSN\Requests\GetMyInfoRequest();
$response_info = $connect_psn->call($request_info);
$info = json_decode($response_info->getBody(true), true);
var_dump($info);

//Profil
$request_profil = new \Gumer\PSN\Requests\ProfileRequest();
$request_profil->setUserId($info['onlineId']);
$response_profil = $connect_psn->call($request_profil);
$profil = json_decode($response_profil->getBody(true), true);
var_dump($profil);

//FriendList
$request_friend = new \Gumer\PSN\Requests\FriendsListRequest();
$request_friend->setUserId($info['onlineId']);
$response_friend = $connect_psn->call($request_friend);
$friend = json_decode($response_friend->getBody(true), true);
var_dump($friend);

//Trophy PSN
$requestTrophy = new \Gumer\PSN\Requests\TrophyDataRequest();
$requestTrophy->setUserId($info['onlineId']);
$responseTrophy = $connect_psn->call($requestTrophy);
$trophy = json_decode($responseTrophy->getBody(true), true);
var_dump($trophy);

/*
 * XBOX LIVE CONNECTOR INIT
 */

$xbox = new xboxLive('syltheron');
$xbox_profile = $xbox->call('profile');
var_dump($xbox_profile);

die();
