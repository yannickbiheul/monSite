<?php

namespace App\Form;

use App\Entity\Candidature;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CandidatureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom établissement',
                'attr' => [
                    'placeholder' => 'Nom'
                ]
            ])
            ->add('adresse', TextType::class, [
                'label' => 'Adresse établissement',
                'attr' => [
                    'placeholder' => 'Adresse'
                ]
            ])
            ->add('typeCandidature', TextType::class, [
                'label' => 'Type de candidature',
                'attr' => [
                    'placeholder' => 'Sur place, Par mail, Sur le site, etc...'
                ]
            ])
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date de la candidature',
                'attr' => [
                    'placeholder' => 'Date'
                ]
            ])
            ->add('reponse', TextType::class, [
                'label' => 'Réponse',
                'required' => false,
                'attr' => [
                    'placeholder' => 'oui, non'
                ]
            ])
            ->add('details', TextType::class, [
                'label' => 'Détails',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Détails'
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
            'data_class' => Candidature::class,
        ]);
    }
}
