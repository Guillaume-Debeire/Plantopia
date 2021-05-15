<?php

namespace App\Form;

use App\Entity\Plant;
use DateInterval;
use Doctrine\DBAL\Types\TimeType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateIntervalType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType as TypeTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;

class PlantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
            'label' => 'Nom de la plante',
            'constraints' => [
                new NotBlank()
                ]
            ])
            ->add('picture', FileType::class, [
                'mapped' => false,
                'label' => 'Photo de la plante',
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '2M'
                    ])
                ]
            ])
            // ->add('created_at')
            ->add('specification', TextareaType::class, [
                'label' => 'Spécifications de la plante',
                'required' => false
            ])
            ->add('age', BirthdayType::class, [
                'label' => 'Age de la plante',
                'widget' => 'choice',
                'format' => 'ddMMyyyy',
                'placeholder' => '',
                'required' => false,
            ])
            ->add('initialization_date', DateType::class, [
                'label' => 'Date d\'initialisation calendrier',
                'widget' => 'choice',
                'format' => 'ddMMyyyy',
                'placeholder' => '',
                'required' => false,
            ])
            ->add('type', null, [
                'label' => 'Type de plante',
                'expanded' => false,
            ])
            ->add('skill', null, [
                'label' => 'Niveau de compétence',
                'expanded' => false,
            ])
            ->add('watering', DateIntervalType::class, [
                'label' => 'Rythme d\'arrosage',
                'days' => array_combine(range(1, 60), range(1, 60)),
                'with_days' => true,
                'with_years' => false,
                'with_months' => false,
                'required' => false,
            ])
            ->add('light', TextType::class, [
                'label' => 'Exposition à la lumière',
                'required' => false,
                ])
            ->add('cut', ChoiceType::class, [
                'label' => 'Période de taille',
                'expanded' => true,
                'multiple' => true,
                'required' => false,
                'choices' => [
                    'Janvier' => "Janvier",
                    'Février' => "Février",
                    'Mars' => "Mars",
                    'Avril' => "Avril",
                    'Mai' => "Mai",
                    'Juin' => "Juin",
                    'Juillet' => "Juillet",
                    'Août' => "Août",
                    'Septembre' => "Septembre",
                    'Octobre' => "Octobre",
                    'Novembre' => "Novembre",
                    'Décembre' => "Décembre",
                ],
                'required' => false
                ])
            ->add('fertilization', ChoiceType::class, [
                'label' => 'Mois de fertilisation',
                'expanded' => true,
                'multiple' => true,
                'required' => false,
                'choices' => [
                    'Janvier' => "Janvier",
                    'Février' => "Février",
                    'Mars' => "Mars",
                    'Avril' => "Avril",
                    'Mai' => "Mai",
                    'Juin' => "Juin",
                    'Juillet' => "Juillet",
                    'Août' => "Août",
                    'Septembre' => "Septembre",
                    'Octobre' => "Octobre",
                    'Novembre' => "Novembre",
                    'Décembre' => "Décembre",
                ],
                'required' => false
                ])
            ->add('repotting', ChoiceType::class, [
                'label' => 'Mois de rempotage',
                'expanded' => true,
                'multiple' => true,
                'required' => false,
                'choices' => [
                    'Janvier' => "Janvier",
                    'Février' => "Février",
                    'Mars' => "Mars",
                    'Avril' => "Avril",
                    'Mai' => "Mai",
                    'Juin' => "Juin",
                    'Juillet' => "Juillet",
                    'Août' => "Août",
                    'Septembre' => "Septembre",
                    'Octobre' => "Octobre",
                    'Novembre' => "Novembre",
                    'Décembre' => "Décembre",
                ],
                'required' => false
                ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Plant::class,
        ]);
    }
}
