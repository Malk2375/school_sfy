<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250109142812 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE professeur ADD matiere_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE professeur ADD CONSTRAINT FK_17A55299F46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id)');
        $this->addSql('CREATE INDEX IDX_17A55299F46CD258 ON professeur (matiere_id)');
        $this->addSql('ALTER TABLE stage ADD matiere_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C9369F46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id)');
        $this->addSql('CREATE INDEX IDX_C27C9369F46CD258 ON stage (matiere_id)');
        $this->addSql('ALTER TABLE stagiaire ADD stage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stagiaire ADD CONSTRAINT FK_4F62F7312298D193 FOREIGN KEY (stage_id) REFERENCES stage (id)');
        $this->addSql('CREATE INDEX IDX_4F62F7312298D193 ON stagiaire (stage_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE professeur DROP FOREIGN KEY FK_17A55299F46CD258');
        $this->addSql('DROP INDEX IDX_17A55299F46CD258 ON professeur');
        $this->addSql('ALTER TABLE professeur DROP matiere_id');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C9369F46CD258');
        $this->addSql('DROP INDEX IDX_C27C9369F46CD258 ON stage');
        $this->addSql('ALTER TABLE stage DROP matiere_id');
        $this->addSql('ALTER TABLE stagiaire DROP FOREIGN KEY FK_4F62F7312298D193');
        $this->addSql('DROP INDEX IDX_4F62F7312298D193 ON stagiaire');
        $this->addSql('ALTER TABLE stagiaire DROP stage_id');
    }
}
