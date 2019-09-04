<?php

namespace App\LoLDataGetter;

class LoLConstants
{
    public const API_KEY = 'RGAPI-c43244de-af79-40ff-8753-299c79483e20';

    public const REGION_EUW = 'euw1.api.riotgames.com/';

    public const PROTOCOL = 'https://';

    public const SUMMONER_API_V4_BY_NAME = 'lol/summoner/v4/summoners/by-name/';
    public const SPECTATOR_API_V4_BY_SUMMONER_ID = '/lol/spectator/v4/active-games/by-summoner/';

    public const API_KEY_PREFIX = '?api_key=';

    public const DDRAGON_URL_PREFIX = 'http://ddragon.leagueoflegends.com/cdn/';
    public const DDRAGON_VERSION = '8.24.1';
    public const DDRAGON_PROFILE_ICON_PATH = '/img/profileicon/';
    public const DDRAGON_PROFILE_ICON_EXT = '.png';
}
