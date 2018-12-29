<?php


namespace App\LoLDataGetter;


use App\Entity\RiotApiResponse;
use App\Entity\Summoner;

class LoLRequestFormer
{


    /**
     * @param string $name
     * @param $region
     * @return Summoner
     * @throws BadRequestException
     */
    public function summonerByName(string $name, $region) : Summoner {

        $url = "";
        $url = LoLConstants::PROTOCOL;

        switch ($region) {

            case LoLConstants::REGION_EUW :
                $url = $url . LoLConstants::REGION_EUW;
                break;

        }

        $url = $url . LoLConstants::SUMMONER_API_V4_BY_NAME . $name . LoLConstants::API_KEY_PREFIX . LoLConstants::API_KEY;

        $response = $this->urlGetRequestToArray($url);
        if ($response->isError()) {
           throw new BadRequestException("Summoner not found");
        }
        $summoner = new Summoner($response);
        $summoner->setIconUrl( LoLConstants::DDRAGON_URL_PREFIX . LoLConstants::DDRAGON_VERSION . LoLConstants::DDRAGON_PROFILE_ICON_PATH . $summoner->getProfileIconId() . LoLConstants::DDRAGON_PROFILE_ICON_EXT);
        return $summoner;
    }

    public function urlGetRequestToArray(string $url) : RiotApiResponse
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $curlResponse = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($curlResponse, true);

        if(array_key_exists('status',$response)) {

           return new RiotApiResponse($response,true);

        }
        return new RiotApiResponse($response,false);
    }
}