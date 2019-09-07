<?php

namespace App\LeagueOfLegends;

use App\Entity\Summoner;
use App\LoLDataGetter\ApiType\SummonerV4;
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
     */
    public function getTeamMiamInformations(): array
    {
        /** @var $teamMiam Summoner[][] */
        $teamMiam = [
            'Tatas' => [
              'summonerInfo' => $this->summonerV4->summonerByName('CHECHOUALOL', LoLConstants::SERVICE_PLATFORM_EUW),
            ],
//            'Julien' => [
//                'summonerInfo' => $this->requestFormer->summonerByName('marvin82', LoLConstants::REGION_EUW),
//            ],
//            'Melanie' => [
//                'summonerInfo' => $this->requestFormer->summonerByName('MiamMiamLaMeta', LoLConstants::REGION_EUW),
//            ],
//            'Gwen' => [
//                'summonerInfo' => $this->requestFormer->summonerByName('MiamMiamLaBite', LoLConstants::REGION_EUW),
//            ],
//            'Ixion' => [
//                'summonerInfo' => $this->requestFormer->summonerByName('MiamMiamLeSex', LoLConstants::REGION_EUW),
//            ],
//            'Rayman' => [
//                'summonerInfo' => $this->requestFormer->summonerByName('MiamMiamLeSperme', LoLConstants::REGION_EUW),
//            ],
        ];

        try {
            $teamMiam['Tatas']['gameInfo'] = $this->summonerV4->gameBySummonerId($teamMiam['Tatas']['summonerInfo']->getSummonerId(), LoLConstants::SERVICE_PLATFORM_EUW);
        } catch (GameNotFoundException $e) {
            $teamMiam['Tatas']['gameInfo'] = null;
        }
//        try {
//            $teamMiam['Gwen']['gameInfo'] = $this->requestFormer->gameBySummonerId($teamMiam['Gwen']['summonerInfo']->getSummonerId(), LoLConstants::REGION_EUW);
//        } catch (GameNotFoundException $e) {
//            $teamMiam['Gwen']['gameInfo'] = null;
//        }
//        try {
//            $teamMiam['Julien']['gameInfo'] = $this->requestFormer->gameBySummonerId($teamMiam['Julien']['summonerInfo']->getSummonerId(), LoLConstants::REGION_EUW);
//        } catch (GameNotFoundException $e) {
//            $teamMiam['Julien']['gameInfo'] = null;
//        }
//        try {
//            $teamMiam['Melanie']['gameInfo'] = $this->requestFormer->gameBySummonerId($teamMiam['Melanie']['summonerInfo']->getSummonerId(), LoLConstants::REGION_EUW);
//        } catch (GameNotFoundException $e) {
//            $teamMiam['Melanie']['gameInfo'] = null;
//        }
//        try {
//            $teamMiam['Ixion']['gameInfo'] = $this->requestFormer->gameBySummonerId($teamMiam['Ixion']['summonerInfo']->getSummonerId(), LoLConstants::REGION_EUW);
//        } catch (GameNotFoundException $e) {
//            $teamMiam['Ixion']['gameInfo'] = null;
//        }
//        try {
//            $teamMiam['Rayman']['gameInfo'] = $this->requestFormer->gameBySummonerId($teamMiam['Rayman']['summonerInfo']->getSummonerId(), LoLConstants::REGION_EUW);
//        } catch (GameNotFoundException $e) {
//            $teamMiam['Rayman']['gameInfo'] = null;
//        }

        return $teamMiam;
    }
}
