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
    protected $endpoint = 'https://xboxapi.com/v2/';
    protected $gamertag;
    protected $key = '51f9c61a6752f9fd533c59773ca669caddf1629a';
    protected $xuid;

    public function __construct($gamertag)
    {
        $this->gamertag = $gamertag;
        $this->xuid = $this->xuid_declare($gamertag);
    }

    private function xuid_declare($gamertag)
    {
        $curl = curl_init($this->endpoint.'xuid/'.$gamertag);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type:application/json',
            'X-AUTH:'.$this->key
        ));
        $result = json_decode(curl_exec($curl));
        return $result;

    }

    private function call($method, $key)
    {
        $curl = curl_init($this->endpoint.$method);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type:application/json',
            'X-AUTH:'.$key
        ));
        $result = curl_exec($curl);
        return json_decode($result, true);
    }

    public function profile($xuid)
    {
        return $this->call($xuid.'/profile', $this->key);
    }
    public function gamercard($xuid)
    {
        return $this->call($xuid.'/gamercard', $this->key);
    }
    public function presence($xuid)
    {
        $this->call($xuid.'/presence', $this->key);
    }
    public function activity($xuid)
    {
        $this->call($xuid.'/activity', $this->key);
    }
    public function recent_activity($xuid)
    {
        $this->call($xuid.'/activity/recent', $this->key);
    }
    public function friends($xuid)
    {
        $this->call($xuid.'/friends', $this->key);
    }


}