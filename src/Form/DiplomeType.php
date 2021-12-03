<?php

namespace App\Form;

use App\Entity\Diplome;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DiplomeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'label' => 'Titre du diplôme',
                'attr' => [
                    'placeholder' => 'Titre'
                ]
            ])
            ->add('etablissement', TextType::class, [
                'label' => 'Établissement du diplôme',
                'attr' => [
                    'placeholder' => 'Établissement'
                ]
            ])
            ->add('dateObtention', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date du diplôme',
                'attr' => [
                    'placeholder' => 'Date'
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
            'data_class' => Diplome::class,
        ]);
    }
}
