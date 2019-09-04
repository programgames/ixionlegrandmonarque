<?php

namespace App\LoLDataGetter;

use App\Entity\CurrentGameInfo;
use App\Entity\RiotApiResponse;
use App\Entity\Summoner;

class LoLRequestFormer
{
    /**
     * @param string $name
     * @param $region
     *
     * @return Summoner
     *
     * @throws BadRequestException
     */
    public function summonerByName(string $name, $region): Summoner
    {
        $url = LoLConstants::PROTOCOL;

        switch ($region) {
            case LoLConstants::REGION_EUW:
                $url = $url.LoLConstants::REGION_EUW;
                break;
        }

        $url = $url.LoLConstants::SUMMONER_API_V4_BY_NAME.$name.LoLConstants::API_KEY_PREFIX.LoLConstants::API_KEY;

        $response = $this->urlGetRequestToArray($url);
        if (404 == $response->getHttpCode()) {
            throw new BadRequestException('Summoner not found');
        }
        $summoner = new Summoner($response);
        $summoner->setIconUrl(
            LoLConstants::DDRAGON_URL_PREFIX.LoLConstants::DDRAGON_VERSION.LoLConstants::DDRAGON_PROFILE_ICON_PATH.$summoner->getProfileIconId(
            ).LoLConstants::DDRAGON_PROFILE_ICON_EXT
        );

        return $summoner;
    }

    private function urlGetRequestToArray(string $url): RiotApiResponse
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, 1);

        $curlResponse = curl_exec($ch);
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $body = substr($curlResponse, $header_size);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $bodyAsArray = json_decode($body, true);

        if (200 != $httpCode) {
            return new RiotApiResponse($bodyAsArray, $httpCode);
        }

        return new RiotApiResponse($bodyAsArray, $httpCode);
    }

    /**
     * @param string $summonerId
     * @param string $region
     *
     * @return CurrentGameInfo
     *
     * @throws BadRequestException
     * @throws GameNotFoundException
     */
    public function gameBySummonerId(string $summonerId, string $region): CurrentGameInfo
    {
        $url = LoLConstants::PROTOCOL;

        switch ($region) {
            case LoLConstants::REGION_EUW:
                $url = $url.LoLConstants::REGION_EUW;
                break;
        }
        $url = $url.LoLConstants::SPECTATOR_API_V4_BY_SUMMONER_ID.$summonerId.LoLConstants::API_KEY_PREFIX.LoLConstants::API_KEY;

        $response = $this->urlGetRequestToArray($url);
        if (404 == $response->getHttpCode()) {
            throw new GameNotFoundException('GameNotFound not found');
        } elseif (200 != $response->getHttpCode()) {
            throw new BadRequestException('Bad request');
        }
        $currentGameInfo = new CurrentGameInfo($response);

        return $currentGameInfo;
    }
}
