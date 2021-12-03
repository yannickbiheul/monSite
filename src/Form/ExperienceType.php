<?php

namespace App\Form;

use App\Entity\Experience;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ExperienceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'label' => 'Titre expérience',
                'attr' => [
                    'placeholder' => 'Titre'
                ]
            ])
            ->add('etablissement', TextType::class, [
                'label' => 'Nom établissement',
                'attr' => [
                    'placeholder' => 'Nom'
                ]
            ])
            ->add('roles', TextType::class, [
                'label' => 'Rôles',
                'attr' => [
                    'placeholder' => 'Rôles'
                ]
            ])
            ->add('dateDebut', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date de début',
                'attr' => [
                    'placeholder' => 'Date'
                ]
            ])
            ->add('dateFin', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date de fin',
                'attr' => [
                    'placeholder' => 'Date'
                ]
            ])
            ->add('lien', TextType::class, [
                'label' => 'Lien',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Lien'
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
            'data_class' => Experience::class,
        ]);
    }
}
