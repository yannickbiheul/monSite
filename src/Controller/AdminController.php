<?php

namespace App\Controller;

use App\Entity\Jeu;
use App\Form\JeuType;
use App\Entity\Projet;
use App\Entity\Social;
use App\Entity\Diplome;
use App\Form\ProjetType;
use App\Form\SocialType;
use App\Form\DiplomeType;
use App\Entity\Certificat;
use App\Entity\Experience;
use App\Entity\Candidature;
use App\Form\CertificatType;
use App\Form\ExperienceType;
use App\Form\CandidatureType;
use App\Repository\JeuRepository;
use App\Repository\ProjetRepository;
use App\Repository\SocialRepository;
use App\Repository\DiplomeRepository;
use Doctrine\Persistence\ObjectManager;
use App\Repository\CertificatRepository;
use App\Repository\ExperienceRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\CandidatureRepository;
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

    // SOCIALS

    /**
     * @Route("/admin/socials", name="admin_socials")
     */
    public function socials(SocialRepository $socialRepo)
    {
        $socials = $socialRepo->findBy([], ['titre' => 'ASC']);

        return $this->render('admin/socials.html.twig', [
            'socials' => $socials,
        ]);
    }

    /**
     * @Route("/admin/socials/new", name="admin_socials_new")
     */
    public function newSocial(Request $request, EntityManagerInterface $manager)
    {
        $social = new Social();
        $form = $this->createForm(SocialType::class, $social);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($social);
            $manager->flush();
            return $this->redirectToRoute('admin_socials');
        }
    
        return $this->render('admin/newSocial.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/socials/{id}/delete", name="admin_socials_delete")
     */
    public function deleteSocial(Social $social, EntityManagerInterface $manager)
    {
        $manager->remove($social);
        $manager->flush();

        return $this->redirectToRoute('admin_socials');
    }

    /**
     * @Route("/admin/socials/{id}/edit", name="admin_socials_edit")
     */
    public function editSocial(Social $social, Request $request, EntityManagerInterface $manager)
    {
        $form = $this->createForm(SocialType::class, $social);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($social);
            $manager->flush();
            return $this->redirectToRoute('admin_socials');
        }
    
        return $this->render('admin/editSocial.html.twig', [
            'form' => $form->createView(),
        ]);
    }

                                                                // JEUX

    /**
     * @Route("/admin/jeux", name="admin_jeux")
     */
    public function jeux(JeuRepository $jeuRepo)
    {
        $jeux = $jeuRepo->findBy([], ['titre' => 'ASC']);

        return $this->render('admin/jeux.html.twig', [
            'jeux' => $jeux,
        ]);
    }

    /**
     * @Route("/admin/jeux/new", name="admin_jeux_new")
     */
    public function newJeu(Request $request, EntityManagerInterface $manager)
    {
        $jeu = new Jeu();
        $form = $this->createForm(JeuType::class, $jeu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($jeu);
            $manager->flush();
            return $this->redirectToRoute('admin_jeux');
        }
    
        return $this->render('admin/newJeu.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/jeux/{id}/delete", name="admin_jeux_delete")
     */
    public function deleteJeu(Jeu $jeu, EntityManagerInterface $manager)
    {
        $manager->remove($jeu);
        $manager->flush();

        return $this->redirectToRoute('admin_jeux');
    }

    /**
     * @Route("/admin/jeux/{id}/edit", name="admin_jeux_edit")
     */
    public function editJeu(Jeu $jeu, Request $request, EntityManagerInterface $manager)
    {
        $form = $this->createForm(JeuType::class, $jeu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($jeu);
            $manager->flush();
            return $this->redirectToRoute('admin_jeux');
        }
    
        return $this->render('admin/editJeu.html.twig', [
            'form' => $form->createView(),
        ]);
    }

                                                                // CANDIDATURES

    /**
     * @Route("/admin/candidatures", name="admin_candidatures")
     */
    public function candidatures(CandidatureRepository $candidatureRepo)
    {
        $candidatures = $candidatureRepo->findBy([], ['date' => 'DESC']);

        return $this->render('admin/candidatures.html.twig', [
            'candidatures' => $candidatures,
        ]);
    }

    /**
     * @Route("/admin/candidatures/new", name="admin_candidatures_new")
     */
    public function newCandidature(Request $request, EntityManagerInterface $manager)
    {
        $candidature = new Candidature();
        $form = $this->createForm(CandidatureType::class, $candidature);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($candidature);
            $manager->flush();
            return $this->redirectToRoute('admin_candidatures');
        }

        return $this->render('admin/newCandidature.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/candidatures/{id}/delete", name="admin_candidatures_delete")
     */
    public function deleteCandidature(Candidature $candidature, EntityManagerInterface $manager)
    {
        $manager->remove($candidature);
        $manager->flush();

        return $this->redirectToRoute('admin_candidatures');
    }

    /**
     * @Route("/admin/candidatures/{id}/edit", name="admin_candidatures_edit")
     */
    public function editCandidature(Candidature $candidature, Request $request, EntityManagerInterface $manager)
    {
        $form = $this->createForm(CandidatureType::class, $candidature);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($candidature);
            $manager->flush();
            return $this->redirectToRoute('admin_candidatures');
        }

        return $this->render('admin/editCandidature.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
