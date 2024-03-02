<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240302113938 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cuisiniste (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, contact_nom VARCHAR(255) NOT NULL, contact_email VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, telephone VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cuisiniste_user (cuisiniste_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_50CC748B9D03EE3 (cuisiniste_id), INDEX IDX_50CC748BA76ED395 (user_id), PRIMARY KEY(cuisiniste_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cuisiniste_user ADD CONSTRAINT FK_50CC748B9D03EE3 FOREIGN KEY (cuisiniste_id) REFERENCES cuisiniste (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cuisiniste_user ADD CONSTRAINT FK_50CC748BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cuisiniste_user DROP FOREIGN KEY FK_50CC748B9D03EE3');
        $this->addSql('ALTER TABLE cuisiniste_user DROP FOREIGN KEY FK_50CC748BA76ED395');
        $this->addSql('DROP TABLE cuisiniste');
        $this->addSql('DROP TABLE cuisiniste_user');
    }
}
