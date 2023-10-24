<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231024132441 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE voitures_occasions (id INT AUTO_INCREMENT NOT NULL, voitures_ocassions_marques_id INT DEFAULT NULL, photo LONGBLOB NOT NULL, prix INT NOT NULL, annee DATE NOT NULL, kilometrage INT NOT NULL, carburant VARCHAR(255) NOT NULL, boite_de_vitesse VARCHAR(255) NOT NULL, INDEX IDX_7BD5F28B8877BDB2 (voitures_ocassions_marques_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE voitures_occasions ADD CONSTRAINT FK_7BD5F28B8877BDB2 FOREIGN KEY (voitures_ocassions_marques_id) REFERENCES marques (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE voitures_occasions');
        $this->addSql('ALTER TABLE voitures_occasions DROP FOREIGN KEY FK_7BD5F28B8877BDB2');
    }
}
