<?php

namespace App\DataFixtures;

use App\Entity\Certificat;
use App\Entity\Diplome;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
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

        $manager->flush();
    }
}
