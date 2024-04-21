<?php

namespace App\Tests\Unit;

use App\Entity\Tournament;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class TournementTest extends KernelTestCase
{
    public function testEntityIsValid(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        $tournament = new Tournament();
        $tournament->setTournamentName('Tournoi #1')
            ->setDescription('Description #1')
            ->setStartDate(new DateTime('2023-06-01'))
            ->setEndDate(new DateTime('2026-06-10'))
            ->setMaxParticipants(100)
            ->setGame('Valorant');

        $errors = $container->get('validator')->validate($tournament);
        $this->assertCount(0, $errors);
    }
}
