<?php

namespace App\Controller;

use App\Entity\Server;
use App\Form\ServerType;
use App\Repository\ServerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/server")
 */
class ServerController extends AbstractController
{
    /**
     * @Route("/", name="server_index", methods={"GET"})
     *
     * @param ServerRepository $serverRepository
     *
     * @return Response
     */
    public function index(ServerRepository $serverRepository): Response
    {
        return $this->render('server/index.html.twig', ['servers' => $serverRepository->findAll()]);
    }

    /**
     * @Route("/new", name="server_new", methods={"GET","POST"})
     *
     * @param Request $request
     *
     * @return Response
     */
    public function new(Request $request): Response
    {
        $server = new Server();
        $form = $this->createForm(ServerType::class, $server);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($server);
            $entityManager->flush();

            return $this->redirectToRoute('server_index');
        }

        return $this->render('server/new.html.twig', [
            'server' => $server,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="server_show", methods={"GET"})
     *
     * @param Server $server
     *
     * @return Response
     */
    public function show(Server $server): Response
    {
        return $this->render('server/show.html.twig', ['server' => $server]);
    }

    /**
     * @Route("/{id}/edit", name="server_edit", methods={"GET","POST"})
     *
     * @param Request $request
     * @param Server  $server
     *
     * @return Response
     */
    public function edit(Request $request, Server $server): Response
    {
        $form = $this->createForm(ServerType::class, $server);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('server_index', ['id' => $server->getId()]);
        }

        return $this->render('server/edit.html.twig', [
            'server' => $server,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="server_delete", methods={"DELETE"})
     *
     * @param Request $request
     * @param Server  $server
     *
     * @return Response
     */
    public function delete(Request $request, Server $server): Response
    {
        if ($this->isCsrfTokenValid('delete'.$server->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($server);
            $entityManager->flush();
        }

        return $this->redirectToRoute('server_index');
    }
}
