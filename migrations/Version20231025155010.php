<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231025155010 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annonces (id INT AUTO_INCREMENT NOT NULL, annonces_voitures_occasions_id INT NOT NULL, utilisateurs_id INT NOT NULL, titre VARCHAR(255) NOT NULL, date_de_publication VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_CB988C6FFDED3A26 (annonces_voitures_occasions_id), INDEX IDX_CB988C6F1E969C5 (utilisateurs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, utilisateurs_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, commentaire VARCHAR(2000) NOT NULL, date DATE NOT NULL, note INT NOT NULL, valide TINYINT(1) NOT NULL, INDEX IDX_8F91ABF01E969C5 (utilisateurs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formulaire_de_renseignement (id INT AUTO_INCREMENT NOT NULL, formulaire_utilisateurs_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, telephone VARCHAR(10) NOT NULL, email VARCHAR(255) NOT NULL, sujet VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, valide VARCHAR(255) NOT NULL, INDEX IDX_8AF6D566D980F1 (formulaire_utilisateurs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE horaires (id INT AUTO_INCREMENT NOT NULL, jour_id INT DEFAULT NULL, heures_ouvertures TIME DEFAULT NULL, heures_fermetures TIME DEFAULT NULL, INDEX IDX_39B7118F220C6AD0 (jour_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, voitures_occasions_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_E01FBE6A5B12944E (voitures_occasions_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jours (id INT AUTO_INCREMENT NOT NULL, utilisateurs_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_F0DAEEED1E969C5 (utilisateurs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marques (id INT AUTO_INCREMENT NOT NULL, marques_modeles_id INT NOT NULL, nom_marques VARCHAR(255) NOT NULL, INDEX IDX_67884F2D415925FC (marques_modeles_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modeles (id INT AUTO_INCREMENT NOT NULL, nom_modeles VARCHAR(255) NOT NULL, cylindree VARCHAR(255) NOT NULL, chevaux VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roles (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE services (id INT AUTO_INCREMENT NOT NULL, services_utilisateurs_id INT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_7332E16960CCF393 (services_utilisateurs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateurs (id INT AUTO_INCREMENT NOT NULL, utilisateurs_roles_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, mots_de_passe VARCHAR(255) NOT NULL, roles VARCHAR(255) NOT NULL, INDEX IDX_497B315E23C802D6 (utilisateurs_roles_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voitures_occasions (id INT AUTO_INCREMENT NOT NULL, voitures_ocassions_marques_id INT DEFAULT NULL, photo LONGBLOB NOT NULL, prix INT NOT NULL, annee DATE NOT NULL, kilometrage INT NOT NULL, carburant VARCHAR(255) NOT NULL, boite_de_vitesse VARCHAR(255) NOT NULL, INDEX IDX_7BD5F28B8877BDB2 (voitures_ocassions_marques_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE annonces ADD CONSTRAINT FK_CB988C6FFDED3A26 FOREIGN KEY (annonces_voitures_occasions_id) REFERENCES voitures_occasions (id)');
        $this->addSql('ALTER TABLE annonces ADD CONSTRAINT FK_CB988C6F1E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs (id)');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF01E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs (id)');
        $this->addSql('ALTER TABLE formulaire_de_renseignement ADD CONSTRAINT FK_8AF6D566D980F1 FOREIGN KEY (formulaire_utilisateurs_id) REFERENCES utilisateurs (id)');
        $this->addSql('ALTER TABLE horaires ADD CONSTRAINT FK_39B7118F220C6AD0 FOREIGN KEY (jour_id) REFERENCES jours (id)');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A5B12944E FOREIGN KEY (voitures_occasions_id) REFERENCES voitures_occasions (id)');
        $this->addSql('ALTER TABLE jours ADD CONSTRAINT FK_F0DAEEED1E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs (id)');
        $this->addSql('ALTER TABLE marques ADD CONSTRAINT FK_67884F2D415925FC FOREIGN KEY (marques_modeles_id) REFERENCES modeles (id)');
        $this->addSql('ALTER TABLE services ADD CONSTRAINT FK_7332E16960CCF393 FOREIGN KEY (services_utilisateurs_id) REFERENCES utilisateurs (id)');
        $this->addSql('ALTER TABLE utilisateurs ADD CONSTRAINT FK_497B315E23C802D6 FOREIGN KEY (utilisateurs_roles_id) REFERENCES roles (id)');
        $this->addSql('ALTER TABLE voitures_occasions ADD CONSTRAINT FK_7BD5F28B8877BDB2 FOREIGN KEY (voitures_ocassions_marques_id) REFERENCES marques (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonces DROP FOREIGN KEY FK_CB988C6FFDED3A26');
        $this->addSql('ALTER TABLE annonces DROP FOREIGN KEY FK_CB988C6F1E969C5');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF01E969C5');
        $this->addSql('ALTER TABLE formulaire_de_renseignement DROP FOREIGN KEY FK_8AF6D566D980F1');
        $this->addSql('ALTER TABLE horaires DROP FOREIGN KEY FK_39B7118F220C6AD0');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6A5B12944E');
        $this->addSql('ALTER TABLE jours DROP FOREIGN KEY FK_F0DAEEED1E969C5');
        $this->addSql('ALTER TABLE marques DROP FOREIGN KEY FK_67884F2D415925FC');
        $this->addSql('ALTER TABLE services DROP FOREIGN KEY FK_7332E16960CCF393');
        $this->addSql('ALTER TABLE utilisateurs DROP FOREIGN KEY FK_497B315E23C802D6');
        $this->addSql('ALTER TABLE voitures_occasions DROP FOREIGN KEY FK_7BD5F28B8877BDB2');
        $this->addSql('DROP TABLE annonces');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE formulaire_de_renseignement');
        $this->addSql('DROP TABLE horaires');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE jours');
        $this->addSql('DROP TABLE marques');
        $this->addSql('DROP TABLE modeles');
        $this->addSql('DROP TABLE roles');
        $this->addSql('DROP TABLE services');
        $this->addSql('DROP TABLE utilisateurs');
        $this->addSql('DROP TABLE voitures_occasions');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
