<?php

namespace App\LoLDataGetter\ApiType;

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

    public function getChampions()
    {
        $url = LoLConstants::DDRAGON_URL_PREFIX.'cdn/'.$this->getCurrentPatch().LoLConstants::DDRAGON_END;

        $champions = $this->lolRequestFormer->urlGetRequestToArray($url);
        $champions = $champions->getData()['data'];

        return $champions;
    }
}
