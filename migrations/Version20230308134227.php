<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230308134227 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE leerlingen ADD klas_id INT NOT NULL');
        $this->addSql('ALTER TABLE leerlingen ADD CONSTRAINT FK_12AC738B2F3345ED FOREIGN KEY (klas_id) REFERENCES klas (id)');
        $this->addSql('CREATE INDEX IDX_12AC738B2F3345ED ON leerlingen (klas_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE leerlingen DROP FOREIGN KEY FK_12AC738B2F3345ED');
        $this->addSql('DROP INDEX IDX_12AC738B2F3345ED ON leerlingen');
        $this->addSql('ALTER TABLE leerlingen DROP klas_id');
    }
}
