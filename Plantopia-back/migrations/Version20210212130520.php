<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210212130520 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE calendar_schedule DROP FOREIGN KEY FK_5F5A31939D86650F');
        $this->addSql('DROP INDEX UNIQ_5F5A31939D86650F ON calendar_schedule');
        $this->addSql('ALTER TABLE calendar_schedule CHANGE user_id_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE calendar_schedule ADD CONSTRAINT FK_5F5A3193A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5F5A3193A76ED395 ON calendar_schedule (user_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64988987678');
        $this->addSql('DROP INDEX IDX_8D93D64988987678 ON user');
        $this->addSql('ALTER TABLE user CHANGE role_id_id role_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649D60322AC ON user (role_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE calendar_schedule DROP FOREIGN KEY FK_5F5A3193A76ED395');
        $this->addSql('DROP INDEX UNIQ_5F5A3193A76ED395 ON calendar_schedule');
        $this->addSql('ALTER TABLE calendar_schedule CHANGE user_id user_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE calendar_schedule ADD CONSTRAINT FK_5F5A31939D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5F5A31939D86650F ON calendar_schedule (user_id_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D60322AC');
        $this->addSql('DROP INDEX IDX_8D93D649D60322AC ON user');
        $this->addSql('ALTER TABLE user CHANGE role_id role_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64988987678 FOREIGN KEY (role_id_id) REFERENCES role (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64988987678 ON user (role_id_id)');
    }
}
