<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231024134457 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE marques (id INT AUTO_INCREMENT NOT NULL, marques_modeles_id INT NOT NULL, nom_marques VARCHAR(255) NOT NULL, INDEX IDX_67884F2D415925FC (marques_modeles_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE marques ADD CONSTRAINT FK_67884F2D415925FC FOREIGN KEY (marques_modeles_id) REFERENCES modeles (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE marques');
        $this->addSql('ALTER TABLE marques DROP FOREIGN KEY FK_67884F2D415925FC');
    }
}
