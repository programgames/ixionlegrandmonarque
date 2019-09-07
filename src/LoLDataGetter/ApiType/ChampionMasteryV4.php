<?php

namespace App\LoLDataGetter\ApiType;

class ChampionMasteryV4 implements APIType
{
    public function getName(): string
    {
        return 'CHAMPION-MASTERY-V4';
    }

    public function getDescription(): string
    {
        return 'Get information about champion masteries by summoner';
    }

    public function getDocUrl(): string
    {
        return 'https://developer.riotgames.com/apis#champion-mastery-v4';
    }



}
