<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210210152224 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plant CHANGE watering watering LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:object)\', CHANGE cut cut LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', CHANGE fertilization fertilization LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plant CHANGE watering watering INT DEFAULT NULL, CHANGE cut cut INT DEFAULT NULL, CHANGE fertilization fertilization INT DEFAULT NULL');
    }
}
