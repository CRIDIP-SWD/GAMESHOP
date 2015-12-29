<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 29/12/2015
 * Time: 16:58
 */

namespace App\networker;


class xboxLive
{
    protected $gamertag;
    protected $endpoint = 'http://www.xboxleaders.com/api/';
    protected $method;


    private function getGamertag($gamertag)
    {
        return $this->gamertag;
    }

    private function getMethod($method)
    {
        return $this->method;
    }

    public function __construct($gamertag)
    {
        $this->gamertag = $gamertag;
    }

    public function call($method)
    {
        $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );
        $call = json_decode(file_get_contents($this->endpoint.$method.'.json?gamertag='.$this->gamertag, false, stream_context_create($arrContextOptions)));
        return $call;
    }


}