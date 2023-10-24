<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231023160027 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE formulaire_de_renseignement (id INT AUTO_INCREMENT NOT NULL, formulaire_utilisateurs_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, telephone VARCHAR(10) NOT NULL, email VARCHAR(255) NOT NULL, sujet VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, valide VARCHAR(255) NOT NULL, INDEX IDX_8AF6D566D980F1 (formulaire_utilisateurs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE formulaire_de_renseignement ADD CONSTRAINT FK_8AF6D566D980F1 FOREIGN KEY (formulaire_utilisateurs_id) REFERENCES utilisateurs (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formulaire_de_renseignement DROP FOREIGN KEY FK_8AF6D566D980F1');
        $this->addSql('DROP TABLE formulaire_de_renseignement');
    }
}
