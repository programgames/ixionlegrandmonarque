<?php

namespace App\LoLDataGetter;

class TeamMiamManager {


    public function getTeamMiamInformations() : array {

        $teamMiam = array (
          'tatas' => $this->urlGetRequestToArray('https://euw1.api.riotgames.com/lol/summoner/v4/summoners/by-name/MiamMiamLanus?api_key=RGAPI-9976a438-0a4d-4e58-b31f-527b0c4fd9eb'),
          'julien' =>  $this->urlGetRequestToArray('https://euw1.api.riotgames.com/lol/summoner/v4/summoners/by-name/marvin82?api_key=RGAPI-9976a438-0a4d-4e58-b31f-527b0c4fd9eb'),
          'mela' =>  $this->urlGetRequestToArray('https://euw1.api.riotgames.com/lol/summoner/v4/summoners/by-name/MiamMiamLaMeta?api_key=RGAPI-9976a438-0a4d-4e58-b31f-527b0c4fd9eb'),
          'gwen' =>  $this->urlGetRequestToArray('https://euw1.api.riotgames.com/lol/summoner/v4/summoners/by-name/MiamMiamLaBite?api_key=RGAPI-9976a438-0a4d-4e58-b31f-527b0c4fd9eb'),
          'ixion' =>  $this->urlGetRequestToArray('https://euw1.api.riotgames.com/lol/summoner/v4/summoners/by-name/MiamMiamLeSex?api_key=RGAPI-9976a438-0a4d-4e58-b31f-527b0c4fd9eb'),

        );
        return $teamMiam;

    }
    public function urlGetRequestToArray(string $url) : array {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $curlResponse = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($curlResponse, true);

        return $response;
    }
}