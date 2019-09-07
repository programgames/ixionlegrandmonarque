<?php

namespace App\Controller;

use HeadlessChromium\BrowserFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdvancedHistoricController extends AbstractController
{
    /**
     * @Route("/advanced/historic", name="advanced_historic")
     */
    public function index()
    {
        $chrome_path = '"C:\\Program Files (x86)\\Google\\Chrome\\Application\\chrome.exe"';

        $browserFactory = new BrowserFactory($chrome_path);

        // starts headless chrome
        $browser = $browserFactory->createBrowser([
            'headless' => true,         // disable headless mode
            'connectionDelay' => 0.8,           // add 0.8 second of delay between each instruction sent to chrome,
            'enableImages' => false,
        ]);

        // creates a new page and navigate to an url
        $page = $browser->createPage();
        $page->navigate('https://matchhistory.euw.leagueoflegends.com/fr/#match-history/EUW1/236817416')->waitForNavigation();

        $jqueryResponse = $page->addScriptTag([
            'content' => file_get_contents('https://code.jquery.com/jquery-3.4.1.js'),
        ])->waitForResponse();

        $summoner = $page->evaluate("$('.player-header-name').html()")->getReturnValue();

        while (1) {
            $test = $page->evaluate('setTimeout(function() {window.scrollBy(0,20000)}, 3000);')->waitForResponse();
        }
        $browser->close();

        return $this->render('advanced_historic/index.html.twig', [
            'controller_name' => 'AdvancedHistoricController',
            'summoner' => $summoner,
        ]);
    }
}
