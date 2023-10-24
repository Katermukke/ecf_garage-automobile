<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231023123923 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE utilisateurs (id INT AUTO_INCREMENT NOT NULL, utilisateurs_roles_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, mots_de_passe VARCHAR(255) NOT NULL, roles VARCHAR(255) NOT NULL, INDEX IDX_497B315E23C802D6 (utilisateurs_roles_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE utilisateurs ADD CONSTRAINT FK_497B315E23C802D6 FOREIGN KEY (utilisateurs_roles_id) REFERENCES roles (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateurs DROP FOREIGN KEY FK_497B315E23C802D6');
        $this->addSql('DROP TABLE utilisateurs');
    }
}
