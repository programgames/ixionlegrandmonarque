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
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://euw1.api.riotgames.com/lol/summoner/v4/summoners/by-name/MiamMiamLeSex?api_key=RGAPI-9976a438-0a4d-4e58-b31f-527b0c4fd9eb');

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);

        $json = json_decode($response, true);

        return $this->render('lol/index.html.twig', [
            'controller_name' => 'LoLController',
            'ixion' => $json['summonerLevel'],
        ]);
    }
}
