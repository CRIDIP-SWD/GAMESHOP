<?php
namespace App\api\xbox;
/**
 * Created by PhpStorm.
 * User: SWD
 * Date: 20/01/2016
 * Time: 16:11
 */
class xbox extends xboxConfig
{

    /**
     * @param $method // Les Méthodes à employer sont ceux de l'API en règle général.
     * @return mixed // Retourne le résultat de la méthode ou non suivant la règle du si=
     */
    public function call($method)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->endpoint.$this->xuid."/".$method);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
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