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
    private $gamerTag = "";
    private $xuid = "";
    private $endpoint = "https://xboxapi.com/v2/";
    private $apiKey = "51f9c61a6752f9fd533c59773ca669caddf1629a";
    private $resort = "json";

    public function __construct($gamerTag)
    {
        $this->gamerTag = $gamerTag;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->endpoint."xuid/".$this->gamerTag);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, array(
            "X-Auth:".$this->apiKey,
            "Content-Type: application/json"
        ));
        $response = curl_exec($curl);
        $return = json_decode($response);
        return $this->xuid = $return;
    }

    public function call($method)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->endpoint.$this->xuid."/".$method);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, array(
            "X-Auth:".$this->apiKey,
            "Content-Type: application/json"
        ));
        $response = curl_exec($curl);
        if($response === false)
        {
            echo "Erreur Curl:".curl_error($curl);
        }else{
            curl_close($curl);
            $return = json_decode($response);
        }
        return $return;
    }

}