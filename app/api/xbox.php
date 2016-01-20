<?php
namespace App\api;
/**
 * Created by PhpStorm.
 * User: SWD
 * Date: 20/01/2016
 * Time: 16:11
 */
class xbox
{
    private $gamertag = "";
    private $region = "";
    private $method = "";

    public function __construct($gamerTag, $region)
    {
        $this->gamertag = $gamerTag;
        $this->region = $region;
    }


    public function xboxStatut()
    {
        $curl = curl_init("https://account.xbox.com/fr-FR/XboxLiveUser/GetOnlineStatus?gamertag=".$this->gamertag);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        $retour = json_decode($response);
        curl_close($curl);
        return $retour;
    }
}