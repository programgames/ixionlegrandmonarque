<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LoLController extends AbstractController
{
    /**
     * @Route("/lol", name="lol")
     */
    public function index()
    {
        $mapName = "";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://euw1.api.riotgames.com/lol/summoner/v4/summoners/by-name/MiamMiamLanus?api_key=RGAPI-9976a438-0a4d-4e58-b31f-527b0c4fd9eb');

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response1 = curl_exec($ch);
        curl_close($ch);

        $json = json_decode($response1, true);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://euw1.api.riotgames.com/lol/spectator/v4/active-games/by-summoner/ctvz1w1k5P77skErqL2KvwsQ8qQh3KlqT5rrp75n3EtlGmY?api_key=RGAPI-9976a438-0a4d-4e58-b31f-527b0c4fd9eb');

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response1 = curl_exec($ch);
        curl_close($ch);

        $json2 = json_decode($response1, true);

        if ($json2['mapId'] == 10)
        {
            $mapName = "Forêt torturée";
        }
        if ($json2['mapId'] == 11)
        {
            $mapName = "Faille de l'invocateur";
        }
        if ($json2['mapId'] == 112)
        {
            $mapName = "Aram #MélanieGameplay";
        }
        else {
         $mapName = "Map inconnue";
        }
        return $this->render('lol/index.html.twig', [
            'controller_name' => 'LoLController',
            'level' => $json['summonerLevel'],
            'id' => $json['id'],
            'gameMode' => $json2['gameMode'],
            'gameLength' => ($json2['gameLength'] / 60 ) + 3,
            'mapName' => $mapName,
        ]);
    }
}
