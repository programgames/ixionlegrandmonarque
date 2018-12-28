<?php

namespace App\LoLDataGetter;

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


    public function getTeamMiamInformations() : array
    {
        $teamMiam = array(
          'tatas' => $this->requestFormer->summonerByName('MiamMiamLanus',LoLConstants::REGION_EUW),
          'julien' => $this->requestFormer->summonerByName('marvin82',LoLConstants::REGION_EUW),
          'mela' => $this->requestFormer->summonerByName('MiamMiamLaMeta',LoLConstants::REGION_EUW),
          'gwen' => $this->requestFormer->summonerByName('MiamMiamLaBite',LoLConstants::REGION_EUW),
          'ixion' => $this->requestFormer->summonerByName('MiamMiamLeSex',LoLConstants::REGION_EUW),

        );
        return $teamMiam;
    }

}
