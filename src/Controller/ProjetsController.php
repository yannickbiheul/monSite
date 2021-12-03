<?php

namespace App\Controller;

use App\Repository\ProjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjetsController extends AbstractController
{
    /**
     * @Route("/projets", name="projets")
     */
    public function index(ProjetRepository $projetRepo): Response
    {
        $projets = $projetRepo->findBy([], ['id' => 'DESC']);

        return $this->render('projets/index.html.twig', [
            'projets' => $projets,
        ]);
    }
}
