<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250109143837 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE stage_matiere (stage_id INT NOT NULL, matiere_id INT NOT NULL, INDEX IDX_1AED17072298D193 (stage_id), INDEX IDX_1AED1707F46CD258 (matiere_id), PRIMARY KEY(stage_id, matiere_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stage_matiere ADD CONSTRAINT FK_1AED17072298D193 FOREIGN KEY (stage_id) REFERENCES stage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stage_matiere ADD CONSTRAINT FK_1AED1707F46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C9369F46CD258');
        $this->addSql('DROP INDEX IDX_C27C9369F46CD258 ON stage');
        $this->addSql('ALTER TABLE stage DROP matiere_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stage_matiere DROP FOREIGN KEY FK_1AED17072298D193');
        $this->addSql('ALTER TABLE stage_matiere DROP FOREIGN KEY FK_1AED1707F46CD258');
        $this->addSql('DROP TABLE stage_matiere');
        $this->addSql('ALTER TABLE stage ADD matiere_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C9369F46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id)');
        $this->addSql('CREATE INDEX IDX_C27C9369F46CD258 ON stage (matiere_id)');
    }
}
