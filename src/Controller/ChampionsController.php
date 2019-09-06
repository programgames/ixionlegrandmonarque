<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\LoLDataGetter\LoLRequestFormer;

/**
 * @Route("/champions")
 */
class ChampionsController extends AbstractController
{
    private $champions;

    /**
     * @param LoLRequestFormer $champions
     */
    public function __construct(LoLRequestFormer $champions)
    {
        $this->champions = $champions;
    }

    /**
     * @Route("/", name="ixion_champions_index")
     */
    public function index()
    {
        $champions = $this->champions->getChampions();
        return $this->render('lol/Champions.twig', [
            'champions' => $champions,
        ]);
    }
}