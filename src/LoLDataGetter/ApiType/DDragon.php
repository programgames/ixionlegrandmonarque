<?php

namespace App\LoLDataGetter\ApiType;

use App\Entity\Champion;
use App\LoLDataGetter\LoLConstants;
use App\LoLDataGetter\LoLRequestFormer;

class DDragon implements APIType
{
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
        // TODO: Implement getName() method.
    }

    public function getDescription(): string
    {
        // TODO: Implement getDescription() method.
    }

    public function getDocUrl(): string
    {
        // TODO: Implement getDocUrl() method.
    }

    public function getCurrentPatch()
    {
        $current_patch = $this->lolRequestFormer->urlGetRequestToArray(LoLConstants::DDRAGON_URL_PREFIX.'api/versions.json')->getData();
        $current_patch = $current_patch[0];

        return $current_patch;
    }

    /**
     * @return Champion[]
     */
    public function getChampions()
    {
        $url = LoLConstants::DDRAGON_URL_PREFIX.'cdn/'.$this->getCurrentPatch().LoLConstants::DDRAGON_DATA_FR.'/champion'.LoLConstants::DDRAGON_JSON;

        $champions = $this->lolRequestFormer->urlGetRequestToArray($url);
        $champions = $champions->getData()['data'];

        $championsList = [];

        foreach ($champions as $c) {
            $champion = new Champion($c);
            array_push($championsList, $champion);
        }

        return $championsList;
    }

    public function getChampion($name)
    {
        $url = LoLConstants::DDRAGON_URL_PREFIX.'cdn/'.$this->getCurrentPatch().LoLConstants::DDRAGON_DATA_FR.'/champion/'.$name.LoLConstants::DDRAGON_JSON;

        $response = $this->lolRequestFormer->urlGetRequestToArray($url);
        $champion = new Champion($response);

        return $champion;
    }
}
