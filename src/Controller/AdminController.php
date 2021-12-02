<?php

namespace App\Controller;

use App\Entity\Diplome;
use App\Form\DiplomeType;
use App\Repository\DiplomeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin/login", name="admin_login")
     */
    public function login(AuthenticationUtils $auth): Response
    {
        $error = $auth->getLastAuthenticationError();

        return $this->render('admin/login.html.twig', [
            'error' => $error !== null
        ]);
    }

    /**
     * @Route("/admin/logout", name="admin_logout")
     */
    public function logout()
    {

    }

    /**
     * @Route("/admin/diplomes", name="admin_diplomes")
     */
    public function diplomes(DiplomeRepository $diplomeRepo)
    {
        $diplomes = $diplomeRepo->findBy([], ['dateObtention' => 'DESC']);
        return $this->render('admin/diplomes.html.twig', [
            'diplomes' => $diplomes,
        ]);
    }

    /**
     * @Route("/admin/diplomes/new", name="admin_diplomes_new")
     */
    public function newDiplome(Request $request, EntityManagerInterface $manager)
    {
        $diplome = new Diplome();
        $form = $this->createForm(DiplomeType::class, $diplome);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($diplome);
            $manager->flush();
            return $this->redirectToRoute('admin_diplomes');
        }

        return $this->render('admin/newDiplome.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/diplomes/{id}/delete", name="admin_diplomes_delete")
     */
    public function deleteDiplome(Diplome $diplome, EntityManagerInterface $manager)
    {
        $manager->remove($diplome);
        $manager->flush();

        return $this->redirectToRoute('admin_diplomes');
    }

    /**
     * @Route("/admin/diplomes/{id}/edit", name="admin_diplomes_edit")
     */
    public function editDiplome(Diplome $diplome, Request $request, EntityManagerInterface $manager)
    {
        $form = $this->createForm(DiplomeType::class, $diplome);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($diplome);
            $manager->flush();
            return $this->redirectToRoute('admin_diplomes');
        }

        return $this->render('admin/editDiplome.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
