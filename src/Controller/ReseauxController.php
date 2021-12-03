<?php

namespace App\Controller;

use App\Repository\JeuRepository;
use App\Repository\SocialRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReseauxController extends AbstractController
{
    /**
     * @Route("/reseaux", name="reseaux")
     */
    public function index(SocialRepository $socialRepo, JeuRepository $jeuRepo): Response
    {
        $socials = $socialRepo->findBy([], ['titre' => 'ASC']);
        $jeux = $jeuRepo->findBy([], ['titre' => 'ASC']);

        return $this->render('reseaux/index.html.twig', [
            'socials' => $socials,
            'jeux' => $jeux,
        ]);
    }
}
