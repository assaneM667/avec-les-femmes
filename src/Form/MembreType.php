<?php

namespace App\Form;

use App\Entity\Membre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class MembreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom complet',
                'required' => true,
                'row_attr' => ['class' => 'form-field'],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Ex. Awa Ndiaye',
                    'autocomplete' => 'name',
                ],
            ])
            ->add('tel', TelType::class, [
                'label' => 'Téléphone',
                'required' => true,
                'row_attr' => ['class' => 'form-field'],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Ex. 77 000 00 00',
                    'autocomplete' => 'tel',
                ],
            ])
            ->add('adresse', TextareaType::class, [
                'label' => 'Adresse',
                'required' => true,
                'row_attr' => ['class' => 'form-field'],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Ville, quartier ou adresse',
                    'autocomplete' => 'street-address',
                    'rows' => 3,
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Membre::class,
        ]);
    }
}
