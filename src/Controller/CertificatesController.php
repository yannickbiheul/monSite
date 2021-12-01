<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CertificatesController extends AbstractController
{
    /**
     * @Route("/certificates", name="certificates")
     */
    public function index(): Response
    {
        return $this->render('certificates/index.html.twig', [
            'controller_name' => 'CertificatesController',
        ]);
    }
}
