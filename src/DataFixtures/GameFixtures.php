<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Game;
use App\Entity\Tournament;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class GameFixtures extends Fixture implements DependentFixtureInterface

{
    public function load(ObjectManager $manager)
    {
        $tournaments = $manager->getRepository(Tournament::class)->findAll();
        $users = $manager->getRepository(User::class)->findAll();
        // Générer quelques matchs de test
        for ($i = 0; $i < 10; $i++) {
            $match = new Game();
            $match->setTournament($tournaments[$i]); // Supposons que vous avez des tournois avec des références 'tournament_1', 'tournament_2', etc.
            $match->setPlayer1($users[$i]); // Supposons que vous avez des utilisateurs avec des références 'user_1', 'user_2', etc.
            $match->setPlayer2($users[$i + 1]);
            $match-> setMatchDate(new \DateTime()); // Vous pouvez définir la date du match comme vous le souhaitez
            $match->setScorePlayer1(rand(0, 5)); // Supposons que le score maximal est 5 pour chaque joueur
            $match->setScorePlayer2(rand(0, 5));
            $match->setStatus($this->getRandomStatus()); // Sélectionnez un statut aléatoire

            $manager->persist($match);
        }

        $manager->flush();
    }

    private function getRandomStatus()
    {
        $statuses = ['en attente', 'en cours', 'terminé'];
        return $statuses[array_rand($statuses)];
    }

    public function getDependencies()
    {
        return [
            TournamentFixtures::class,
            UserFixtures::class
        ];
    }
}

