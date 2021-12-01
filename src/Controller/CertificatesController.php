<?php

namespace App\Controller;

use App\Repository\CertificatRepository;
use App\Repository\DiplomeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CertificatesController extends AbstractController
{
    /**
     * @Route("/certificates", name="certificates")
     */
    public function index(DiplomeRepository $diplomeRepo, CertificatRepository $certificatRepo): Response
    {
        $diplomes = $diplomeRepo->findBy([], ['dateObtention' => 'DESC']);
        $certificats = $certificatRepo->findBy([], ['dateObtention' => 'DESC']);

        return $this->render('certificates/index.html.twig', [
            'diplomes' => $diplomes,
            'certificats' => $certificats,
        ]);
    }
}
