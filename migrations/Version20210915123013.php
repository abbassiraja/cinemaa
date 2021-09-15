<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210915123013 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, id_admin_id INT DEFAULT NULL, nom_categorie VARCHAR(255) NOT NULL, INDEX IDX_497DD63434F06E85 (id_admin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cinema (id INT AUTO_INCREMENT NOT NULL, nom_cinema VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, num_tel INT NOT NULL, email VARCHAR(255) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, id_admin_id INT NOT NULL, id_user_id INT NOT NULL, id_film_id INT NOT NULL, text VARCHAR(255) NOT NULL, nom_utilisateur VARCHAR(255) NOT NULL, INDEX IDX_67F068BC34F06E85 (id_admin_id), INDEX IDX_67F068BC79F37AE5 (id_user_id), INDEX IDX_67F068BC88E2F8F3 (id_film_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evaluation (id INT AUTO_INCREMENT NOT NULL, id_cinema_id INT DEFAULT NULL, id_user_id INT DEFAULT NULL, note INT NOT NULL, INDEX IDX_1323A57534FE3891 (id_cinema_id), INDEX IDX_1323A57579F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film (id INT AUTO_INCREMENT NOT NULL, id_categorie_id INT DEFAULT NULL, id_admin_id INT DEFAULT NULL, nom_film VARCHAR(255) NOT NULL, time DATETIME NOT NULL, dure TIME NOT NULL, prix_film INT NOT NULL, audience VARCHAR(255) NOT NULL, INDEX IDX_8244BE229F34925F (id_categorie_id), INDEX IDX_8244BE2234F06E85 (id_admin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publicite (id INT AUTO_INCREMENT NOT NULL, id_cinema_id INT DEFAULT NULL, id_admin_id INT NOT NULL, image VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, prix INT NOT NULL, INDEX IDX_1D394E3934FE3891 (id_cinema_id), INDEX IDX_1D394E3934F06E85 (id_admin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, id_film_id INT NOT NULL, id_cinema_id INT NOT NULL, id_user_id INT NOT NULL, nbr_tickets INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, date_reservation DATETIME NOT NULL, INDEX IDX_42C8495588E2F8F3 (id_film_id), UNIQUE INDEX UNIQ_42C8495534FE3891 (id_cinema_id), INDEX IDX_42C8495579F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salle_de_projection (id INT AUTO_INCREMENT NOT NULL, id_cinema_id INT DEFAULT NULL, id_film_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, nbr_places INT NOT NULL, status TINYINT(1) NOT NULL, INDEX IDX_87C2573034FE3891 (id_cinema_id), UNIQUE INDEX UNIQ_87C2573088E2F8F3 (id_film_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_de_naissance DATE NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD63434F06E85 FOREIGN KEY (id_admin_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC34F06E85 FOREIGN KEY (id_admin_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC88E2F8F3 FOREIGN KEY (id_film_id) REFERENCES film (id)');
        $this->addSql('ALTER TABLE evaluation ADD CONSTRAINT FK_1323A57534FE3891 FOREIGN KEY (id_cinema_id) REFERENCES cinema (id)');
        $this->addSql('ALTER TABLE evaluation ADD CONSTRAINT FK_1323A57579F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT FK_8244BE229F34925F FOREIGN KEY (id_categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT FK_8244BE2234F06E85 FOREIGN KEY (id_admin_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE publicite ADD CONSTRAINT FK_1D394E3934FE3891 FOREIGN KEY (id_cinema_id) REFERENCES cinema (id)');
        $this->addSql('ALTER TABLE publicite ADD CONSTRAINT FK_1D394E3934F06E85 FOREIGN KEY (id_admin_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495588E2F8F3 FOREIGN KEY (id_film_id) REFERENCES film (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495534FE3891 FOREIGN KEY (id_cinema_id) REFERENCES cinema (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495579F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE salle_de_projection ADD CONSTRAINT FK_87C2573034FE3891 FOREIGN KEY (id_cinema_id) REFERENCES cinema (id)');
        $this->addSql('ALTER TABLE salle_de_projection ADD CONSTRAINT FK_87C2573088E2F8F3 FOREIGN KEY (id_film_id) REFERENCES film (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD63434F06E85');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC34F06E85');
        $this->addSql('ALTER TABLE film DROP FOREIGN KEY FK_8244BE2234F06E85');
        $this->addSql('ALTER TABLE publicite DROP FOREIGN KEY FK_1D394E3934F06E85');
        $this->addSql('ALTER TABLE film DROP FOREIGN KEY FK_8244BE229F34925F');
        $this->addSql('ALTER TABLE evaluation DROP FOREIGN KEY FK_1323A57534FE3891');
        $this->addSql('ALTER TABLE publicite DROP FOREIGN KEY FK_1D394E3934FE3891');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495534FE3891');
        $this->addSql('ALTER TABLE salle_de_projection DROP FOREIGN KEY FK_87C2573034FE3891');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC88E2F8F3');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495588E2F8F3');
        $this->addSql('ALTER TABLE salle_de_projection DROP FOREIGN KEY FK_87C2573088E2F8F3');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC79F37AE5');
        $this->addSql('ALTER TABLE evaluation DROP FOREIGN KEY FK_1323A57579F37AE5');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495579F37AE5');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE cinema');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE evaluation');
        $this->addSql('DROP TABLE film');
        $this->addSql('DROP TABLE publicite');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE salle_de_projection');
        $this->addSql('DROP TABLE user');
    }
}
