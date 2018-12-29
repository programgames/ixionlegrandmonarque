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


    /**
     * @return array
     * @throws BadRequestException
     */
    public function getTeamMiamInformations() : array
    {
        $teamMiam = array();


        $teamMiam = array(
          'Tatas' => $this->requestFormer->summonerByName('MiamMiamLanus',LoLConstants::REGION_EUW),
          'Julien' => $this->requestFormer->summonerByName('marvin82',LoLConstants::REGION_EUW),
          'Melanie' => $this->requestFormer->summonerByName('MiamMiamLaMeta',LoLConstants::REGION_EUW),
          'Gwen' => $this->requestFormer->summonerByName('MiamMiamLaBite',LoLConstants::REGION_EUW),
          'Ixion' => $this->requestFormer->summonerByName('MiamMiamLeSex',LoLConstants::REGION_EUW),
          'Rayman' => $this->requestFormer->summonerByName('MiamMiamLeSperme',LoLConstants::REGION_EUW),

        );
        return $teamMiam;
    }

}
