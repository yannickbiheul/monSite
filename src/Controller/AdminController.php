<?php

namespace App\Controller;

use App\Entity\Certificat;
use App\Entity\Diplome;
use App\Entity\Experience;
use App\Entity\Projet;
use App\Form\CertificatType;
use App\Form\DiplomeType;
use App\Form\ExperienceType;
use App\Form\ProjetType;
use App\Repository\CertificatRepository;
use App\Repository\DiplomeRepository;
use App\Repository\ExperienceRepository;
use App\Repository\ProjetRepository;
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

                                                                /* DIPLOMES */

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

                                                                /* CERTIFICATS */

    /**
     * @Route("/admin/certificats", name="admin_certificats")
     */
    public function certificats(CertificatRepository $certificatRepo)
    {
        $certificats = $certificatRepo->findBy([], ['dateObtention' => 'DESC']);
         return $this->render('admin/certificats.html.twig', [
             'certificats' => $certificats,
         ]);
    }

    /**
     * @Route("/admin/certificats/new", name="admin_certificats_new")
     */
    public function newCertificat(Request $request, EntityManagerInterface $manager)
    {
        $certificat = new Certificat();
        $form = $this->createForm(CertificatType::class, $certificat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($certificat);
            $manager->flush();
            return $this->redirectToRoute('admin_certificats');
        }

        return $this->render('admin/newCertificat.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/certificats/{id}/delete", name="admin_certificats_delete")
     */
    public function deleteCertificats(Certificat $certificat, EntityManagerInterface $manager)
    {
        $manager->remove($certificat);
        $manager->flush();

        return $this->redirectToRoute('admin_certificats');
    }

    /**
     * @Route("/admin/certificats/{id}/edit", name="admin_certificats_edit")
     */
    public function editCertificat(Certificat $certificat, Request $request, EntityManagerInterface $manager)
    {
        $form = $this->createForm(CertificatType::class, $certificat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($certificat);
            $manager->flush();
            return $this->redirectToRoute('admin_certificats');
        }

        return $this->render('admin/editCertificat.html.twig', [
            'form' => $form->createView(),
        ]);
    }

                                                                // EXPERIENCES

    /**
     * @Route("/admin/experiences", name="admin_experiences")
     */
    public function experiences(ExperienceRepository $experienceRepo)
    {
        $experiences = $experienceRepo->findBy([], ['dateFin' => 'DESC']);

        return $this->render('admin/experiences.html.twig', [
            'experiences' => $experiences,
        ]);
    }

    /**
     * @Route("/admin/experiences/new", name="admin_experiences_new")
     */
    public function newExperience(Request $request, EntityManagerInterface $manager)
    {
        $experience = new Experience();
        $form = $this->createForm(ExperienceType::class, $experience);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($experience);
            $manager->flush();
            return $this->redirectToRoute('admin_experiences');
        }

        return $this->render('admin/newExperience.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/experiences/{id}/delete", name="admin_experiences_delete")
     */
    public function deleteExperience(Experience $experience, EntityManagerInterface $manager)
    {
        $manager->remove($experience);
        $manager->flush();

        return $this->redirectToRoute('admin_experiences');
    }

    /**
     * @Route("/admin/experiences/{id}/edit", name="admin_experiences_edit")
     */
    public function editExperience(Experience $experience, Request $request, EntityManagerInterface $manager)
    {
        $form = $this->createForm(ExperienceType::class, $experience);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($experience);
            $manager->flush();
            return $this->redirectToRoute('admin_experiences');
        }

        return $this->render('admin/editExperience.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    // PROJETS

    /**
     * @Route("/admin/projets", name="admin_projets")
     */
    public function projets(ProjetRepository $projetRepo)
    {
        $projets = $projetRepo->findBy([], ['id' => 'DESC']);

        return $this->render('admin/projets.html.twig', [
            'projets' => $projets,
        ]);
    }

    /**
     * @Route("/admin/projets/new", name="admin_projets_new")
     */
    public function newProjet(Request $request, EntityManagerInterface $manager)
    {
        $projet = new Projet();
        $form = $this->createForm(ProjetType::class, $projet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($projet);
            $manager->flush();
            return $this->redirectToRoute('admin_projets');
        }

        return $this->render('admin/newProjet.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/projets/{id}/delete", name="admin_projets_delete")
     */
    public function deleteProjet(Projet $projet, EntityManagerInterface $manager)
    {
        $manager->remove($projet);
        $manager->flush();

        return $this->redirectToRoute('admin_projets');
    }

    /**
     * @Route("/admin/projets/{id}/edit", name="admin_projets_edit")
     */
    public function editProjet(Projet $projet, Request $request, EntityManagerInterface $manager)
    {
        $form = $this->createForm(ProjetType::class, $projet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($projet);
            $manager->flush();
            return $this->redirectToRoute('admin_projets');
        }

        return $this->render('admin/editProjet.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
