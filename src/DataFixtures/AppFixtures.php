<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Certificat;
use App\Entity\Diplome;
use App\Entity\Experience;
use App\Entity\Jeu;
use App\Entity\Projet;
use App\Entity\Social;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager): void
    {
        // ADMIN
        $admin = new Admin();
        $admin->setUsername('yannickbiheul@outlook.fr')
                ->setPassword('ludwigvon88');
        $encoded = $this->encoder->hashPassword($admin, $admin->getPassword());
        $admin->setPassword($encoded);
        $manager->persist($admin);

        // DIPLOMES
        $diplome = new Diplome();
        $diplome->setTitre("BTS Développement Web et Web Mobile")
                ->setEtablissement("AFPA Brest")
                ->setDateObtention(new \DateTime("2021-07-08"));
        $manager->persist($diplome);

        $diplome = new Diplome();
        $diplome->setTitre("BAC PRO Maintenance des Appareils et Équipements Ménagers et de Collectivités")
                ->setEtablissement("Le Likès Quimper")
                ->setDateObtention(new \DateTime("2001-07-09"));
        $manager->persist($diplome);

        $diplome = new Diplome();
        $diplome->setTitre("BEP Agent Technique de Vente")
                ->setEtablissement("AFPA Lorient")
                ->setDateObtention(new \DateTime("2002-12-13"));
        $manager->persist($diplome);

        // CERTIFICATS
        $certificat = new Certificat();
        $certificat->setTitre("Les bases de Symfony 4")
                    ->setEtablissement("Udemy")
                    ->setDateObtention(new \DateTime("2021-12-01"))
                    ->setNumero("UC-59e0a6d0-5f7e-4cfc-a712-f0b1d5239c52")
                    ->setUrl("ude.my/UC-59e0a6d0-5f7e-4cfc-a712-f0b1d5239c52");
        $manager->persist($certificat);

        $certificat = new Certificat();
        $certificat->setTitre("Débutez avec les API REST")
                    ->setEtablissement("OpenClassRooms")
                    ->setDateObtention(new \DateTime("2021-11-09"))
                    ->setNumero("1046444453")
                    ->setUrl("https://openclassrooms.com/fr/course-certificates/1046444453");
        $manager->persist($certificat);

        $certificat = new Certificat();
        $certificat->setTitre("Ce que vous devez savoir AVANT d'apprendre la PROGRAMMATION")
                    ->setEtablissement("Udemy")
                    ->setDateObtention(new \DateTime("2021-11-09"))
                    ->setNumero("UC-54c3c40a-0246-4554-b0a8-3c8ea2b4c199")
                    ->setUrl("ude.my/UC-54c3c40a-0246-4554-b0a8-3c8ea2b4c199");
        $manager->persist($certificat);

        // EXPERIENCES
        $experience = new Experience();
        $experience->setTitre('Développeur Full-Stack')
                    ->setEtablissement('La Belle Oreille')
                    ->setRoles('Développement Full-Stack avec Symfony 5.
                    Utilisation de EasyAdmin, Webpack Encore et Bootstrap.
                    Tests unitaires, intégration continue avec les actions GitHub.')
                    ->setDateDebut(new \DateTime("2021-04-26"))
                    ->setDateFin(new \DateTime("2021-07-02"))
                    ->setLien('assets/images/presentation_belle_oreille.pdf');
        $manager->persist($experience);

        $experience = new Experience();
        $experience->setTitre('Opérateur / Pilote de production')
                    ->setEtablissement('Livbag Pont-de-Buis')
                    ->setRoles('Montage de pièces sur ligne de production, travail en équipe, réalisation d’étiquetages, contrôles et suivi qualité et process, utilisation du logiciel « L2L » pour le suivi de production.')
                    ->setDateDebut(new \DateTime("2003-03-10"))
                    ->setDateFin(new \DateTime("2020-10-22"));
        $manager->persist($experience);

        $experience = new Experience();
        $experience->setTitre('Vendeur Conseil')
                    ->setEtablissement('Conforama Quimper')
                    ->setRoles('Accueil client et vente d’équipements électroménagers, suivi client et service après-vente, travail en équipe et participation à la vie du magasin (inventaires, réassorts, tenue et organisation du magasin).')
                    ->setDateDebut(new \DateTime("2002-12-17"))
                    ->setDateFin(new \DateTime("2002-12-28"));
        $manager->persist($experience);

        // PROJETS
        $projet = new Projet();
        $projet->setTitre('Deskad')
                ->setDescription('Un blog en PHP sans Frameworks')
                ->setImage('deskad.png')
                ->setUrl('https://deskad.fr/');
        $manager->persist($projet);

        // RESEAUX SOCIAUX
        $social = new Social();
        $social->setTitre('Facbook')
                ->setUrl('https://www.facebook.com/yannickbiheul')
                ->setLogo('<i class="fab fa-facebook-f"></i>');
        $manager->persist($social);

        // JEUX
        $jeu = new Jeu();
        $jeu->setTitre('Playstation')
            ->setLogo('<i class="fab fa-playstation"></i>')
            ->setPseudo('Le_Bok_29');
        $manager->persist($jeu);

        $manager->flush();
    }
}
