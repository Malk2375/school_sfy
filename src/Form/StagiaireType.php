<?php

namespace App\Form;

use App\Entity\Stage;
use App\Entity\Stagiaire;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StagiaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Le nom du stagiaire',
                    "class" => 'form-control mb-4',
                ],
            ])
            ->add('adresse', TextType::class, [
                'label' => 'Adresse',
                'attr' => [
                    'placeholder' => "L'adresse du stagiaire",
                    "class" => 'form-control mb-4',
                ],
            ])
            // ->add('code')
            ->add('ville', TextType::class, [
                'label' => 'Ville',
                'attr' => [
                    'placeholder' => "La ville du stagiaire",
                    "class" => 'form-control mb-4',
                ],
            ])
            ->add('dateInscription', DateType::class, [
                'widget' => 'single_text',
                'attr' => [
                    "class" => 'form-control mb-4',
                ],
            ])
            ->add('stage', EntityType::class, [
                'class' => Stage::class,
                'choice_label' => 'id',
                'attr' => [
                    "class" => 'form-control mb-4',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Stagiaire::class,
        ]);
    }
}
