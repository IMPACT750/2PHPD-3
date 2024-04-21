<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240418120424 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE matchs (id INT AUTO_INCREMENT NOT NULL, tournament_id INT NOT NULL, player1_id INT DEFAULT NULL, player2_id INT DEFAULT NULL, match_winner_id INT DEFAULT NULL, match_date DATETIME DEFAULT NULL, score_p1 INT DEFAULT NULL, score_p2 INT DEFAULT NULL, match_status VARCHAR(255) NOT NULL, INDEX IDX_6B1E604133D1A3E7 (tournament_id), INDEX IDX_6B1E6041C0990423 (player1_id), INDEX IDX_6B1E6041D22CABCD (player2_id), INDEX IDX_6B1E6041444D9813 (match_winner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE registrations_tournois (id INT AUTO_INCREMENT NOT NULL, player_id INT NOT NULL, tournament_id INT NOT NULL, registration_date DATETIME NOT NULL, INDEX IDX_9587F7CC99E6F5DF (player_id), INDEX IDX_9587F7CC33D1A3E7 (tournament_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tournaments (id INT AUTO_INCREMENT NOT NULL, organizer_id INT NOT NULL, tournament_winner_id INT DEFAULT NULL, tournamentName VARCHAR(255) NOT NULL, startDate DATETIME NOT NULL, endDate DATETIME NOT NULL, location VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, maxParticipants INT NOT NULL, game VARCHAR(255) NOT NULL, creation_date DATETIME NOT NULL, tournament_status VARCHAR(255) NOT NULL, INDEX IDX_E4BCFAC3876C4DDA (organizer_id), INDEX IDX_E4BCFAC38D7C7CA9 (tournament_winner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, nickname VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, registration_date DATETIME NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_NICKNAME (nickname), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE matchs ADD CONSTRAINT FK_6B1E604133D1A3E7 FOREIGN KEY (tournament_id) REFERENCES tournaments (id)');
        $this->addSql('ALTER TABLE matchs ADD CONSTRAINT FK_6B1E6041C0990423 FOREIGN KEY (player1_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE matchs ADD CONSTRAINT FK_6B1E6041D22CABCD FOREIGN KEY (player2_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE matchs ADD CONSTRAINT FK_6B1E6041444D9813 FOREIGN KEY (match_winner_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE registrations_tournois ADD CONSTRAINT FK_9587F7CC99E6F5DF FOREIGN KEY (player_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE registrations_tournois ADD CONSTRAINT FK_9587F7CC33D1A3E7 FOREIGN KEY (tournament_id) REFERENCES tournaments (id)');
        $this->addSql('ALTER TABLE tournaments ADD CONSTRAINT FK_E4BCFAC3876C4DDA FOREIGN KEY (organizer_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE tournaments ADD CONSTRAINT FK_E4BCFAC38D7C7CA9 FOREIGN KEY (tournament_winner_id) REFERENCES users (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matchs DROP FOREIGN KEY FK_6B1E604133D1A3E7');
        $this->addSql('ALTER TABLE matchs DROP FOREIGN KEY FK_6B1E6041C0990423');
        $this->addSql('ALTER TABLE matchs DROP FOREIGN KEY FK_6B1E6041D22CABCD');
        $this->addSql('ALTER TABLE matchs DROP FOREIGN KEY FK_6B1E6041444D9813');
        $this->addSql('ALTER TABLE registrations_tournois DROP FOREIGN KEY FK_9587F7CC99E6F5DF');
        $this->addSql('ALTER TABLE registrations_tournois DROP FOREIGN KEY FK_9587F7CC33D1A3E7');
        $this->addSql('ALTER TABLE tournaments DROP FOREIGN KEY FK_E4BCFAC3876C4DDA');
        $this->addSql('ALTER TABLE tournaments DROP FOREIGN KEY FK_E4BCFAC38D7C7CA9');
        $this->addSql('DROP TABLE matchs');
        $this->addSql('DROP TABLE registrations_tournois');
        $this->addSql('DROP TABLE tournaments');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
