<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 29/12/2015
 * Time: 17:26
 */

namespace App\networker;


class steam
{
    protected $steamKey = '444446B16CB7611E5E74F4752A35EB5C';
    protected $endpoint = 'http://api.steampowered.com/';
    protected $steamId;

    public function __construct($steamId)
    {
        return $this->steamId = $steamId;
    }

    private function call($method)
    {

    }

    public function playerInfo()
    {
        $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );
        $call = json_decode(file_get_contents($this->endpoint.'ISteamUser/GetPlayerSummaries/v0002/?key='.$this->steamKey.'&steamids='.$this->steamId, false, stream_context_create($arrContextOptions)));
        return $call;
    }
}