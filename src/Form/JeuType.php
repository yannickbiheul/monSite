<?php

namespace App\Form;

use App\Entity\Jeu;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class JeuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'label' => 'Titre du réseau jeu',
                'attr' => [
                    'placeholder' => 'Titre'
                ]
            ])
            ->add('logo', TextType::class, [
                'label' => 'Logo du réseau jeu',
                'attr' => [
                    'placeholder' => 'Logo'
                ]
            ])
            ->add('pseudo', TextType::class, [
                'label' => 'Pseudo du réseau jeu',
                'attr' => [
                    'placeholder' => 'Pseudo'
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
            'data_class' => Jeu::class,
        ]);
    }
}
