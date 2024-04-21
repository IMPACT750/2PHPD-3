<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Tournament;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class TournamentFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager): void
    {
        // En supposant que vous avez des utilisateurs dans la base de données
        $users = $manager->getRepository(User::class)->findAll();
    
        if (!empty($users)) {
            $userCount = count($users);
    
            for ($i = 0; $i < 10; $i++) {
                $user = $users[$i % $userCount];
    
                $tournament = new Tournament();
                $tournament->setOrganizer($user);
                $tournament->setTournamentName("Tournoi " . ($i + 1));
                $tournament->setStartDate(new \DateTime('+1 week')); // Exemple: Date de début dans une semaine
                $tournament->setEndDate(new \DateTime('+2 weeks')); // Exemple: Date de fin dans deux semaines
                $tournament->setLocation("Emplacement " . ($i + 1));
                $tournament->setDescription("Description du tournoi " . ($i + 1));
                $tournament->setMaxParticipants(rand(10, 100)); // Nombre aléatoire de participants maximum
                $tournament->setGame("Nom du jeu");
                $tournament->setStatus(""); // Vous pouvez définir le statut en fonction des dates dans votre application
                $manager->persist($tournament);
            }
    
            $manager->flush();
        } else {
            echo "Aucun utilisateur trouvé dans la base de données."; // Ou gérez le cas de manière appropriée
        }
    }
    
    public function getDependencies()
    {
        return [
            UserFixtures::class
        ];
    }
    
} 

