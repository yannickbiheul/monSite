<?php

namespace App\Form;

use App\Entity\Certificat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CertificatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'label' => 'Titre du certificat',
                'attr' => [
                    'placeholder' => 'Titre'
                ]
            ])
            ->add('etablissement', TextType::class, [
                'label' => 'Établissement du certificat',
                'attr' => [
                    'placeholder' => 'Titre'
                ]
            ])
            ->add('dateObtention', DateType::class, [
                'label' => 'Date du certificat',
                'attr' => [
                    'placeholder' => 'Date'
                ]
            ])
            ->add('numero', TextType::class, [
                'label' => 'Numéro du certificat',
                'attr' => [
                    'placeholder' => 'Titre'
                ]
            ])
            ->add('url', TextType::class, [
                'label' => 'URL du certificat',
                'attr' => [
                    'placeholder' => 'Titre'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Enregistrer',
                'attr' => [
                    'class' => 'btn btn-info text-white'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Certificat::class,
        ]);
    }
}
