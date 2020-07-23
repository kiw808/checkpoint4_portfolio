<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200722154147 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE techno_education (techno_id INT NOT NULL, education_id INT NOT NULL, INDEX IDX_454AA63351F3C1BC (techno_id), INDEX IDX_454AA6332CA1BD71 (education_id), PRIMARY KEY(techno_id, education_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE techno_education ADD CONSTRAINT FK_454AA63351F3C1BC FOREIGN KEY (techno_id) REFERENCES techno (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE techno_education ADD CONSTRAINT FK_454AA6332CA1BD71 FOREIGN KEY (education_id) REFERENCES education (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE techno_education');
    }
}
