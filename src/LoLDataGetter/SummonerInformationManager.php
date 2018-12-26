<?php

namespace App\LoLDataGetter;

class SummonerInformationManager {


    public function urlGetRequestToArray(string $url) : array {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response1 = curl_exec($ch);
        curl_close($ch);

        $json = json_decode($response1, true);
    }
}