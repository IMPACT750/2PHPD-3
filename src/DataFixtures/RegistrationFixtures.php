<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Tournament;
use App\Entity\Registration;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class RegistrationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $users = $manager->getRepository(User::class)->findAll();
        $tournaments = $manager->getRepository(Tournament::class)->findAll();

        foreach ($users as $user) {
            // Sélectionner un tournoi aléatoire pour chaque utilisateur
            $randomTournament = $tournaments[array_rand($tournaments)];

            $registration = new Registration();
            $registration->setPlayer($user);
            $registration->setTournament($randomTournament);
            $registration->setRegistrationDate(new \DateTime());
            $manager->persist($registration);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
            TournamentFixtures::class
        ];
    }
}
