<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200722152459 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE education (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(100) NOT NULL, institution VARCHAR(180) NOT NULL, country VARCHAR(40) NOT NULL, year DATE NOT NULL, sector VARCHAR(80) NOT NULL, description LONGTEXT NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(40) NOT NULL, description LONGTEXT NOT NULL, level SMALLINT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill_education (skill_id INT NOT NULL, education_id INT NOT NULL, INDEX IDX_88FB658F5585C142 (skill_id), INDEX IDX_88FB658F2CA1BD71 (education_id), PRIMARY KEY(skill_id, education_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE skill_education ADD CONSTRAINT FK_88FB658F5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_education ADD CONSTRAINT FK_88FB658F2CA1BD71 FOREIGN KEY (education_id) REFERENCES education (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE skill_education DROP FOREIGN KEY FK_88FB658F2CA1BD71');
        $this->addSql('ALTER TABLE skill_education DROP FOREIGN KEY FK_88FB658F5585C142');
        $this->addSql('DROP TABLE education');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE skill_education');
    }
}
