<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210210100541 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE calendar_schedule (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_5F5A31939D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plant (id INT AUTO_INCREMENT NOT NULL, calendar_schedule_id INT DEFAULT NULL, type_id_id INT DEFAULT NULL, skill_id_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, specification LONGTEXT DEFAULT NULL, age DATE DEFAULT NULL, initialization_date DATE DEFAULT NULL, watering INT DEFAULT NULL, light VARCHAR(255) DEFAULT NULL, cut INT DEFAULT NULL, fertilization INT DEFAULT NULL, repotting VARCHAR(255) DEFAULT NULL, picture VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_AB030D72D4F77C9E (calendar_schedule_id), INDEX IDX_AB030D72714819A0 (type_id_id), INDEX IDX_AB030D725A6C0D6B (skill_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, role_string VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, role_id_id INT NOT NULL, pseudo VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, avatar VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_8D93D64988987678 (role_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE calendar_schedule ADD CONSTRAINT FK_5F5A31939D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE plant ADD CONSTRAINT FK_AB030D72D4F77C9E FOREIGN KEY (calendar_schedule_id) REFERENCES calendar_schedule (id)');
        $this->addSql('ALTER TABLE plant ADD CONSTRAINT FK_AB030D72714819A0 FOREIGN KEY (type_id_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE plant ADD CONSTRAINT FK_AB030D725A6C0D6B FOREIGN KEY (skill_id_id) REFERENCES skill (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64988987678 FOREIGN KEY (role_id_id) REFERENCES role (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plant DROP FOREIGN KEY FK_AB030D72D4F77C9E');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64988987678');
        $this->addSql('ALTER TABLE plant DROP FOREIGN KEY FK_AB030D725A6C0D6B');
        $this->addSql('ALTER TABLE plant DROP FOREIGN KEY FK_AB030D72714819A0');
        $this->addSql('ALTER TABLE calendar_schedule DROP FOREIGN KEY FK_5F5A31939D86650F');
        $this->addSql('DROP TABLE calendar_schedule');
        $this->addSql('DROP TABLE plant');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE user');
    }
}
