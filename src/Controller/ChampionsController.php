<?php

namespace App\Controller;

use App\LoLDataGetter\ApiType\DDragon;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/champions")
 */
class ChampionsController extends AbstractController
{
    private $ddragon;

    /**
     * @param DDragon $ddragon
     */
    public function __construct(DDragon $ddragon)
    {
        $this->ddragon = $ddragon;
    }

    /**
     * @Route("/", name="ixion_champions_index")
     */
    public function index()
    {
        $champions = $this->ddragon->getChampions();

        return $this->render('lol/Champions.twig', [
            'champions' => $champions,
        ]);
    }
}
