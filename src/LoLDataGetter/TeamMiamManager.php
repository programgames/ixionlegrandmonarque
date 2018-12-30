<?php

namespace App\LoLDataGetter;

use App\Entity\Summoner;

class TeamMiamManager
{
    /** @var LoLRequestFormer */
    private $requestFormer;

    /**
     * TeamMiamManager constructor.
     * @param LoLRequestFormer $requestFormer
     */
    public function __construct(LoLRequestFormer $requestFormer)
    {
        $this->requestFormer = $requestFormer;
    }


    /**
     * @return array
     * @throws BadRequestException
     */
    public function getTeamMiamInformations() : array
    {
        /** @var $teamMiam [][] */
        $teamMiam = array(
            'Tatas' => array (
              'summonerInfo' => $this->requestFormer->summonerByName('MiamMiamLanus',LoLConstants::REGION_EUW),
            ),
            'Julien' => array(
                'summonerInfo' => $this->requestFormer->summonerByName('marvin82',LoLConstants::REGION_EUW),
            ),
            'Melanie' => array(
                'summonerInfo' => $this->requestFormer->summonerByName('MiamMiamLaMeta',LoLConstants::REGION_EUW),
            ),
            'Gwen' => array(
                'summonerInfo' => $this->requestFormer->summonerByName('MiamMiamLaBite',LoLConstants::REGION_EUW),
            ),
            'Ixion' => array(
                'summonerInfo' => $this->requestFormer->summonerByName('MiamMiamLeSex',LoLConstants::REGION_EUW),
            ),
            'Rayman' => array(
                'summonerInfo' => $this->requestFormer->summonerByName('MiamMiamLeSperme',LoLConstants::REGION_EUW),
            )
        );


        try {
            $teamMiam['Tatas']['gameInfo'] = $this->requestFormer->gameBySummonerId($teamMiam['Tatas']['summonerInfo']->getSummonerId(), LoLConstants::REGION_EUW);
        } catch (GameNotFoundException $e) {
            $teamMiam['Tatas']['gameInfo'] = null;
        }
        try {
            $teamMiam['Gwen']['gameInfo'] = $this->requestFormer->gameBySummonerId($teamMiam['Gwen']['summonerInfo']->getSummonerId(), LoLConstants::REGION_EUW);
        } catch (GameNotFoundException $e) {
            $teamMiam['Gwen']['gameInfo'] = null;
        }
        try {
            $teamMiam['Julien']['gameInfo'] = $this->requestFormer->gameBySummonerId($teamMiam['Julien']['summonerInfo']->getSummonerId(), LoLConstants::REGION_EUW);
        } catch (GameNotFoundException $e) {
            $teamMiam['Julien']['gameInfo'] = null;
        }
        try {
            $teamMiam['Melanie']['gameInfo'] = $this->requestFormer->gameBySummonerId($teamMiam['Melanie']['summonerInfo']->getSummonerId(), LoLConstants::REGION_EUW);
        } catch (GameNotFoundException $e) {
            $teamMiam['Melanie']['gameInfo'] = null;
        }
        try {
            $teamMiam['Ixion']['gameInfo'] = $this->requestFormer->gameBySummonerId($teamMiam['Ixion']['summonerInfo']->getSummonerId(), LoLConstants::REGION_EUW);
        } catch (GameNotFoundException $e) {
            $teamMiam['Ixion']['gameInfo'] = null;
        }
        try {
            $teamMiam['Rayman']['gameInfo'] = $this->requestFormer->gameBySummonerId($teamMiam['Rayman']['summonerInfo']->getSummonerId(), LoLConstants::REGION_EUW);
        } catch (GameNotFoundException $e) {
            $teamMiam['Rayman']['gameInfo'] = null;
        }

        return $teamMiam;
    }

}
