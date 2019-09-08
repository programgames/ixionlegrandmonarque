<?php

namespace App\LeagueOfLegends;

use App\Entity\Summoner;
use App\LoLDataGetter\ApiType\SummonerV4;
use App\LoLDataGetter\Exception\BadRegionException;
use App\LoLDataGetter\Exception\BadRequestException;
use App\LoLDataGetter\Exception\GameNotFoundException;
use App\LoLDataGetter\LoLConstants;

class TeamMiamManager
{
    /** @var SummonerV4 */
    private $summonerV4;

    /**
     * TeamMiamManager constructor.
     *
     * @param SummonerV4 $summonerV4
     */
    public function __construct(SummonerV4 $summonerV4)
    {
        $this->summonerV4 = $summonerV4;
    }

    /**
     * @return array
     *
     * @throws BadRequestException
     * @throws BadRegionException
     */
    public function getTeamMiamInformations(): array
    {
        /** @var $teamMiam Summoner[][] */
        $teamMiam = [
            'Tatas' => [
              'summonerInfo' => $this->summonerV4->summonerByName('CHECHOUALOL', LoLConstants::SERVICE_PLATFORM_EUW),
            ],
            'Julien' => [
                'summonerInfo' => $this->summonerV4->summonerByName('USELESS EZREAL', LoLConstants::SERVICE_PLATFORM_EUW),
            ],
            'Melanie' => [
                'summonerInfo' => $this->summonerV4->summonerByName('elanormelanie', LoLConstants::SERVICE_PLATFORM_EUW),
            ],
            'Gwen' => [
                'summonerInfo' => $this->summonerV4->summonerByName('KDOUBLEROTOR', LoLConstants::SERVICE_PLATFORM_EUW),
            ],
            'Ixion' => [
                'summonerInfo' => $this->summonerV4->summonerByName('ÌXÌON', LoLConstants::SERVICE_PLATFORM_EUW),
            ],
            'Rayman' => [
                'summonerInfo' => $this->summonerV4->summonerByName('GrosseAubergine', LoLConstants::SERVICE_PLATFORM_EUW),
            ],
            'Nicolas' => [
                'summonerInfo' => $this->summonerV4->summonerByName('Babtou de cité', LoLConstants::SERVICE_PLATFORM_EUW),
            ]
        ];

        try {
            $teamMiam['Tatas']['gameInfo'] = $this->summonerV4->gameBySummonerId($teamMiam['Tatas']['summonerInfo']->getSummonerId(), LoLConstants::SERVICE_PLATFORM_EUW);
        } catch (GameNotFoundException $e) {
            $teamMiam['Tatas']['gameInfo'] = null;
        }
        try {
            $teamMiam['Gwen']['gameInfo'] = $this->summonerV4->gameBySummonerId($teamMiam['Gwen']['summonerInfo']->getSummonerId(), LoLConstants::SERVICE_PLATFORM_EUW);
        } catch (GameNotFoundException $e) {
            $teamMiam['Gwen']['gameInfo'] = null;
        }
        try {
            $teamMiam['Julien']['gameInfo'] = $this->summonerV4->gameBySummonerId($teamMiam['Julien']['summonerInfo']->getSummonerId(), LoLConstants::SERVICE_PLATFORM_EUW);
        } catch (GameNotFoundException $e) {
            $teamMiam['Julien']['gameInfo'] = null;
        }
        try {
            $teamMiam['Melanie']['gameInfo'] = $this->summonerV4->gameBySummonerId($teamMiam['Melanie']['summonerInfo']->getSummonerId(), LoLConstants::SERVICE_PLATFORM_EUW);
        } catch (GameNotFoundException $e) {
            $teamMiam['Melanie']['gameInfo'] = null;
        }
        try {
            $teamMiam['Ixion']['gameInfo'] = $this->summonerV4->gameBySummonerId($teamMiam['Ixion']['summonerInfo']->getSummonerId(), LoLConstants::SERVICE_PLATFORM_EUW);
        } catch (GameNotFoundException $e) {
            $teamMiam['Ixion']['gameInfo'] = null;
        }
        try {
            $teamMiam['Rayman']['gameInfo'] = $this->summonerV4->gameBySummonerId($teamMiam['Rayman']['summonerInfo']->getSummonerId(), LoLConstants::SERVICE_PLATFORM_EUW);
        } catch (GameNotFoundException $e) {
            $teamMiam['Rayman']['gameInfo'] = null;
        }
        try {
            $teamMiam['Nicolas']['gameInfo'] = $this->summonerV4->gameBySummonerId($teamMiam['Nicolas']['summonerInfo']->getSummonerId(), LoLConstants::SERVICE_PLATFORM_EUW);
        } catch (GameNotFoundException $e) {
            $teamMiam['Nicolas']['gameInfo'] = null;
        }

        return $teamMiam;
    }
}
