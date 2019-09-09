<?php

namespace App\LoLDataGetter\ApiType;

use App\Entity\CurrentGameInfo;
use App\Entity\Summoner;
use App\LoLDataGetter\Exception\BadRegionException;
use App\LoLDataGetter\Exception\BadRequestException;
use App\LoLDataGetter\Exception\GameNotFoundException;
use App\LoLDataGetter\LoLConstants;
use App\LoLDataGetter\LoLRequestFormer;

class SummonerV4 implements APIType
{
    public const SUMMONER_V4_BY_NAME = '/lol/summoner/v4/summoners/by-name/';

    /** @var LoLRequestFormer */
    private $lolRequestFormer;

    /**
     * SummonerV4 constructor.
     *
     * @param LoLRequestFormer $lolRequestFormer
     */
    public function __construct(LoLRequestFormer $lolRequestFormer)
    {
        $this->lolRequestFormer = $lolRequestFormer;
    }

    public function getName(): string
    {
        return 'SUMMONER-V4';
    }

    public function getDescription(): string
    {
        return 'Get information about a summoner';
    }

    public function getDocUrl(): string
    {
        return 'https://developer.riotgames.com/apis#summoner-v4';
    }

    /**
     * @param string $name
     * @param $region
     *
     * @return Summoner
     *
     * @throws BadRequestException
     * @throws BadRegionException
     */
    public function summonerByName(string $name, $region): Summoner
    {
        if (!$this->lolRequestFormer->checkRegion($region)) {
            throw new BadRegionException('Bad region provided');
        }
        $url = $region;

        $name = $this->formateSummonerName($name);

        $url = $url.$this::SUMMONER_V4_BY_NAME.$name;

        $response = $this->lolRequestFormer->urlGetRequestToArray($url);
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
            case LoLConstants::SERVICE_PLATFORM_EUW:
                $url = $url.LoLConstants::SERVICE_PLATFORM_EUW;
                break;
        }
        $url = $url.LoLConstants::SPECTATOR_API_V4_BY_SUMMONER_ID.$summonerId.LoLConstants::API_KEY_PREFIX.LoLConstants::API_KEY;

        $response = $this->lolRequestFormer->urlGetRequestToArray($url);
        if (404 == $response->getHttpCode()) {
            throw new GameNotFoundException('GameNotFound not found');
        } elseif (200 != $response->getHttpCode()) {
            throw new BadRequestException('Bad request');
        }
        $currentGameInfo = new CurrentGameInfo($response);

        return $currentGameInfo;
    }

    public function formateSummonerName(string $name)
    {
        $formatedName = str_replace(['/', '\\', ' ', '$', '–', '_', '.', '!', '*', '‘', '(', ')'], '', $name);

        return $formatedName;
    }
}
