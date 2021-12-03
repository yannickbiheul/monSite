<?php

namespace App\Controller;

use App\Repository\ExperienceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExperiencesController extends AbstractController
{
    /**
     * @Route("/experiences", name="experiences")
     */
    public function index(ExperienceRepository $experienceRepo): Response
    {
        $experiences = $experienceRepo->findBy([], ['dateFin' => 'DESC']);

        return $this->render('experiences/index.html.twig', [
            'experiences' => $experiences,
        ]);
    }
}
