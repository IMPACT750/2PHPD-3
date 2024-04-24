<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\GameRepository;
use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: GameRepository::class)]
#[ApiResource()]
class Game
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'games')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Tournament $tournament = null;

    #[ORM\ManyToOne]
    private ?User $player1 = null;

    #[ORM\ManyToOne]
    private ?User $player2 = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Groups(['tournaments.show'])]
    private ?\DateTimeInterface $matchDate = null;

    #[ORM\Column(nullable: true)]
    private ?int $scorePlayer1 = null;

    #[ORM\Column(nullable: true)]
    private ?int $scorePlayer2 = null;

    #[ORM\Column(length: 255)]
    #[Groups(['tournaments.show'])]
    private ?string $status = "en attente";

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTournament(): ?Tournament
    {
        return $this->tournament;
    }

    public function setTournament(?Tournament $tournament): static
    {
        $this->tournament = $tournament;

        return $this;
    }

    public function getPlayer1(): ?User
    {
        return $this->player1;
    }

    public function setPlayer1(?User $player1): static
    {
        $this->player1 = $player1;

        return $this;
    }

    public function getPlayer2(): ?User
    {
        return $this->player2;
    }

    public function setPlayer2(?User $player2): static
    {
        $this->player2 = $player2;

        return $this;
    }

    public function getMatchDate(): ?\DateTimeInterface
    {
        return $this->matchDate;
    }

    public function setMatchDate(?\DateTimeInterface $matchDate): static
    {
        $this->matchDate = $matchDate;

        return $this;
    }

    public function getScorePlayer1(): ?int
    {
        return $this->scorePlayer1;
    }

    public function setScorePlayer1(?int $scorePlayer1): static
    {
        $this->scorePlayer1 = $scorePlayer1;

        return $this;
    }

    public function getScorePlayer2(): ?int
    {
        return $this->scorePlayer2;
    }

    public function setScorePlayer2(?int $scorePlayer2): static
    {
        $this->scorePlayer2 = $scorePlayer2;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $scorePlayer1 = $this->getScorePlayer1();
        $scorePlayer2 = $this->getScorePlayer2();
        if ($scorePlayer1 != null && $scorePlayer2 != null) {
            $temp = "Terminé";
        } elseif ($scorePlayer1 == null || $scorePlayer2 == null) {
            $temp = "En cours";
        } else {
            $temp = "En attente";
        }
        $this->status = $temp;

        return $this;
        $this->status = $status;

        return $this;
    }

    public function isGameValid(){
        $player1 = $this->getPlayer1();
        $player2 = $this->getPlayer2();
        $tournament = $this->getTournament();
        $entityManager = new EntityManagerInterface();

        if ($player1 === null || $player2 === null) {
            return false;
        }
        $registrationRepository = $entityManager->getRepository(Registration::class);
        $registration1 = $registrationRepository->findOneBy(['player' => $player1, 'tournament' => $tournament]);
        $registration2 = $registrationRepository->findOneBy(['player' => $player2, 'tournament' => $tournament]);

        if (!$registration1 || !$registration2 || $registration1->getStatus() !== 'confirmed' || $registration2->getStatus() !== 'confirmed') {
            return false;
        }
        return true;
    }
}
