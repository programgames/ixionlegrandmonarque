<?php

namespace App\Controller;

use App\Form\AdvancedHistoricType;
use HeadlessChromium\BrowserFactory;
use HeadlessChromium\Exception\CommunicationException;
use HeadlessChromium\Exception\CommunicationException\CannotReadResponse;
use HeadlessChromium\Exception\CommunicationException\InvalidResponse;
use HeadlessChromium\Exception\CommunicationException\ResponseHasError;
use HeadlessChromium\Exception\EvaluationFailed;
use HeadlessChromium\Exception\JavascriptException;
use HeadlessChromium\Exception\NavigationExpired;
use HeadlessChromium\Exception\NoResponseAvailable;
use HeadlessChromium\Exception\OperationTimedOut;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdvancedHistoricController extends AbstractController
{
    private $times = [];
    private $realTime;

    /**
     * @Route("/advanced/historic", name="advanced_historic")
     *
     * @param Request $request
     *
     * @return RedirectResponse|Response
     *
     * @throws CommunicationException
     * @throws CannotReadResponse
     * @throws InvalidResponse
     * @throws ResponseHasError
     * @throws EvaluationFailed
     * @throws JavascriptException
     * @throws NavigationExpired
     * @throws OperationTimedOut
     */
    public function index(Request $request)
    {
        $form = $this->createForm(AdvancedHistoricType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->redirectToRoute('home_page');
        }

        return $this->render('advanced_historic/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/advanced/historic/ajax", name="advanced_historic_ajax")
     *
     * @param Request $request
     *
     * @return JsonResponse
     *
     * @throws CannotReadResponse
     * @throws CommunicationException
     * @throws EvaluationFailed
     * @throws InvalidResponse
     * @throws JavascriptException
     * @throws NavigationExpired
     * @throws OperationTimedOut
     * @throws ResponseHasError
     * @throws NoResponseAvailable
     */
    public function ajaxCalculation(Request $request)
    {
        $notFinished = true;
        $chrome_path = '"C:\\Program Files (x86)\\Google\\Chrome\\Application\\chrome.exe"';
        $browserFactory = new BrowserFactory($chrome_path);
        $browser = $browserFactory->createBrowser(
            [
                'headless' => true,
                'connectionDelay' => 0.8,
                'enableImages' => false,
            ]
        );

        $page = $browser->createPage();
        $page->navigate(
            $request->get('url')
        )->waitForNavigation();

        $page->addScriptTag(
            [
                'content' => file_get_contents('https://code.jquery.com/jquery-3.4.1.js'),
            ]
        )->waitForResponse();

        $summoner = $page->evaluate("$('.player-header-name').html()")->getReturnValue();
        $numberOfGames = $page->evaluate("$('#match-history-list-9-list').length")->getReturnValue();

        while ($notFinished) {
            $page->evaluate('window.scrollBy(0,20000);')->waitForResponse();
            sleep(2);
            $newNumberOfGames = $page->evaluate("$('li').filter(function () { return this.className.match('^game-summary.*');}).length")->getReturnValue();
            if ($numberOfGames != $newNumberOfGames) {
                $numberOfGames = $newNumberOfGames;
            } else {
                $notFinished = false;
            }
        }

        for ($i = 0; $i <= $newNumberOfGames; ++$i) {
            $script = "$('.date-duration-duration').eq(".$i.').text()';
            array_push($this->times, $page->evaluate($script)->getReturnValue());
        }

        foreach ($this->times as $value) {
            if (!empty($value)) {
                $this->realTime += ((int) substr($value, 0, 2)) * 60;
                $this->realTime += (int) substr($value, 2, 2);
            }
        }
        $this->realTime = $this->realTime / 3600;
        $browser->close();

        return new JsonResponse([
            'summoner' => $summoner,
            'time' => $this->realTime,
        ]);
    }
}
