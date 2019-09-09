<?php

namespace App\Controller;

use App\LeagueOfLegends\TeamMiamManager;
use App\LoLDataGetter\Exception\BadRequestException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TeamMiamController extends AbstractController
{
    private $manager;

    /**
     * TeamMiamController constructor.
     *
     * @param TeamMiamManager $manager
     */
    public function __construct(TeamMiamManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @Route("/teammiam", name="ixion_teammiam_index")
     */
    public function index()
    {
        $teamMiam = null;

        try {
            $teamMiam = $this->manager->getTeamMiamInformations();
        } catch (BadRequestException $e) {
            return $this->render('error/Error500.twig');
        }

        return $this->render('lol/TeamMiam.twig', [
            'teamMiam' => $teamMiam,
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
