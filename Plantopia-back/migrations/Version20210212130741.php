<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210212130741 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plant DROP FOREIGN KEY FK_AB030D725A6C0D6B');
        $this->addSql('ALTER TABLE plant DROP FOREIGN KEY FK_AB030D72714819A0');
        $this->addSql('DROP INDEX IDX_AB030D725A6C0D6B ON plant');
        $this->addSql('DROP INDEX IDX_AB030D72714819A0 ON plant');
        $this->addSql('ALTER TABLE plant ADD type_id INT DEFAULT NULL, ADD skill_id INT DEFAULT NULL, DROP type_id_id, DROP skill_id_id');
        $this->addSql('ALTER TABLE plant ADD CONSTRAINT FK_AB030D72C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE plant ADD CONSTRAINT FK_AB030D725585C142 FOREIGN KEY (skill_id) REFERENCES skill (id)');
        $this->addSql('CREATE INDEX IDX_AB030D72C54C8C93 ON plant (type_id)');
        $this->addSql('CREATE INDEX IDX_AB030D725585C142 ON plant (skill_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plant DROP FOREIGN KEY FK_AB030D72C54C8C93');
        $this->addSql('ALTER TABLE plant DROP FOREIGN KEY FK_AB030D725585C142');
        $this->addSql('DROP INDEX IDX_AB030D72C54C8C93 ON plant');
        $this->addSql('DROP INDEX IDX_AB030D725585C142 ON plant');
        $this->addSql('ALTER TABLE plant ADD type_id_id INT DEFAULT NULL, ADD skill_id_id INT DEFAULT NULL, DROP type_id, DROP skill_id');
        $this->addSql('ALTER TABLE plant ADD CONSTRAINT FK_AB030D725A6C0D6B FOREIGN KEY (skill_id_id) REFERENCES skill (id)');
        $this->addSql('ALTER TABLE plant ADD CONSTRAINT FK_AB030D72714819A0 FOREIGN KEY (type_id_id) REFERENCES type (id)');
        $this->addSql('CREATE INDEX IDX_AB030D725A6C0D6B ON plant (skill_id_id)');
        $this->addSql('CREATE INDEX IDX_AB030D72714819A0 ON plant (type_id_id)');
    }
}
