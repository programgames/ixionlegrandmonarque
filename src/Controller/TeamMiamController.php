<?php

namespace App\Controller;

use App\LoLDataGetter\SummonerInformationManager;
use App\LoLDataGetter\TeamMiamManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TeamMiamController extends AbstractController
{
    private $manager;

    /**
     * TeamMiamController constructor.
     * @param TeamMiamManager $manager
     */
    public function __construct(TeamMiamManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @Route("/teammiam", name="Team Miam")
     */
    public function index()
    {

        return $this->render('lol/TeamMiam.twig',[
            'teammiam' => $this->manager->getTeamMiamInformations(),
        ]);
    }

    /**
     * @return TeamMiamManager
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * @param TeamMiamManager $manager
     */
    public function setManager(TeamMiamManager $manager)
    {
        $this->manager = $manager;
    }


}
