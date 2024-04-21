<?php

namespace App\Form;

use App\Entity\Game;
use App\Entity\Tournament;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('matchDate', null, [
                'widget' => 'single_text'
            ])
            ->add('scorePlayer1')
            ->add('scorePlayer2')
            ->add('status')
            ->add('tournament', EntityType::class, [
                'class' => Tournament::class,
'choice_label' => 'id',
            ])
            ->add('player1', EntityType::class, [
                'class' => User::class,
'choice_label' => 'id',
            ])
            ->add('player2', EntityType::class, [
                'class' => User::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Game::class,
        ]);
    }
}
