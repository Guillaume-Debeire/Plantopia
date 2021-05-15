<?php

namespace App\Form;

use App\Entity\User;
use DateTime;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pseudo', TextType::class, [
                'label' => 'Pseudo',
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->addEventListener(FormEvents::POST_SET_DATA, function(FormEvent $formEvent) {
                $form = $formEvent->getForm();
                $user = $formEvent->getData();
                
                if(is_null($user->getId()))
                { // on est en création le mot de passe est obligatoire
                    $form->add('password', RepeatedType::class, [
                        'type' => PasswordType::class,
                        'invalid_message' => 'Les mots de passe ne correspondent pas.',
                        // on ne veut pas le require ce champs car (pour l'instant) cela nous forcerait
                        // à resaisir le mot de passe lors de l'édition
                        'required' => true, 
                        // les labels pour chaque champs affiché
                        'first_options'  => ['label' => 'Mot de passe'],
                        'second_options' => ['label' => 'Répétez le mot de passe'],
                        'constraints' => [
                            new NotBlank()
                        ],        
                        // on spécifie au composant formulaire 
                        // de ne pas se charger d'enregistrer cette valeur dans l'objet
                        // 'mapped' => false, 
                    ]);
                }
                else 
                { // on est en édition, le mot de passe n'est pas obligatoire
                    $form->add('password', RepeatedType::class, [
                        'type' => PasswordType::class,
                        'invalid_message' => 'Les mots de passe ne correspondent pas.',
                        'mapped' => false, 
                        'required' => false, 
                        'first_options'  => ['label' => 'Mot de passe'],
                        'second_options' => ['label' => 'Répétez le mot de passe'],
                    ]);
                }
            })
            ->add('email', EmailType::class, [
                'label' => 'E-mail',
                'constraints' => [
                    new Email(),
                ]
            ])
            ->add('avatar', FileType::class, [
                'mapped' => false,
                'label' => 'Votre avatar',
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '2M'
                    ])
                ]
            ])
            ->add('roles', ChoiceType::class, [
                'label' => 'Rôles',
                'multiple' => true,
                'expanded' => true,
                'choices' => [
                    'Administrateur' => "ROLE_ADMIN",
                    'Utilisateur' => "ROLE_USER",
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
