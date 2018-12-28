<?php


namespace App\LoLDataGetter;


class LoLRequestFormer
{


    public function summonerByName(string $name, $region) : array {

        $url = "";
        $url = LoLConstants::PROTOCOL;

        switch ($region) {

            case LoLConstants::REGION_EUW :
                $url = $url . LoLConstants::REGION_EUW;
                break;

        }

        $url = $url . LoLConstants::SUMMONER_API_V4_BY_NAME . $name . LoLConstants::API_KEY_PREFIX . LoLConstants::API_KEY;

        return $this->urlGetRequestToArray($url);
    }

    public function urlGetRequestToArray(string $url) : array
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $curlResponse = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($curlResponse, true);

        return $response;
    }
}