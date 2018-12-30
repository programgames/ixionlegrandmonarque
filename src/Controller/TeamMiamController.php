<?php

namespace App\Controller;

use App\LoLDataGetter\BadRequestException;
use App\LoLDataGetter\SummonerInformationManager;
use App\LoLDataGetter\TeamMiamManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;
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
        $teammiam = null;

        try {
            $teammiam = $this->manager->getTeamMiamInformations();
        } catch (BadRequestException $e) {
            return $this->render('error/Error500.twig');
        }
        return $this->render('lol/TeamMiam.twig', [
            'teamMiam' => $teammiam,
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
