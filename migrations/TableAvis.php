<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231023075000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, commentaire VARCHAR(2000) NOT NULL, date DATE NOT NULL, note INT NOT NULL, valide TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avis_utilisateurs (avis_id INT NOT NULL, utilisateurs_id INT NOT NULL, INDEX IDX_F4D666A197E709F (avis_id), INDEX IDX_F4D666A1E969C5 (utilisateurs_id), PRIMARY KEY(avis_id, utilisateurs_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE avis_utilisateurs ADD CONSTRAINT FK_F4D666A197E709F FOREIGN KEY (avis_id) REFERENCES avis (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE avis_utilisateurs ADD CONSTRAINT FK_F4D666A1E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis_utilisateurs DROP FOREIGN KEY FK_F4D666A197E709F');
        $this->addSql('ALTER TABLE avis_utilisateurs DROP FOREIGN KEY FK_F4D666A1E969C5');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE avis_utilisateurs');
    }
}
