<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 20/01/2016
 * Time: 21:10
 */

namespace App\api\xbox;


class xboxConfig
{
    protected $gamerTag = "";
    protected $xuid = "";
    protected $endpoint = "https://xboxapi.com/v2/";
    protected $apiKey = "51f9c61a6752f9fd533c59773ca669caddf1629a";
    protected $resort = "json";

    public function __construct($gamerTag)
    {
        $this->gamerTag = $gamerTag;

        if(empty($this->xuid))
        {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $this->endpoint."xuid/".$gamerTag);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                "X-Auth:".$this->apiKey,
                "Content-Type: application/json"
            ));
            $response = curl_exec($curl);
            $return = json_decode($response);
            return $this->xuid = $return;
        }
    }
}