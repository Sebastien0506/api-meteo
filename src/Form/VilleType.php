<?php

namespace App\Form;

use App\Entity\Ville;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class VilleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'name',
                'attr' => [
                    'class' => "form-control",
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => "Veuillez saisir le nom de la ville."
                    ]),
                ]
            ])
            ->add('temperature', NumberType::class, [
                'label' => 'temperature',
                'attr' => [
                    'class' => "form-controle"
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => "Veuillez saisir une température"
                    ]),
                ],
            ])
            ->add('temps', TextType::class, [
                'label' => 'temps',
                'attr' => [
                    'class' => 'form-controle',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => "Veuillez saisir un temps"
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ville::class,
        ]);
    }
}
