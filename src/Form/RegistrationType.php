<?php

namespace App\Form;

use App\Entity\Registration;
use App\Entity\Tournament;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('registrationDate', null, [
                'widget' => 'single_text'
            ])
            ->add('status')
            ->add('player', EntityType::class, [
                'class' => User::class,
'choice_label' => 'id',
            ])
            ->add('tournament', EntityType::class, [
                'class' => Tournament::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Registration::class,
        ]);
    }
}
