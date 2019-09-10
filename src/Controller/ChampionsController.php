<?php

namespace App\Controller;

use App\Entity\Champion;
use App\LoLDataGetter\ApiType\DDragon;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
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

        /**
         * @var $champions Champion[]
         */
        foreach ($champions as $c) {
            $loading = substr_replace($c->getImage(), '', -4);
            $loading  = str_replace(array( '\'', ' '), '', $loading) . '_0.jpg' ;
            $c->setImage($loading);
        }

        return $this->render('lol/champions/index.twig', [
            'champions' => $champions,
        ]);
    }

    /**
     * @Route("/{name}", name="ixion_champions_view", methods={"GET"})
     * @param $name
     * @return Response
     */
    public function view($name)
    {
        $champion = $this->ddragon->getChampion($name);

        return $this->render('lol/champions/view.twig', [
            'champion' => $champion,
        ]);
    }
}
