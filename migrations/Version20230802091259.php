<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230802091259 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE token (id INT AUTO_INCREMENT NOT NULL, token VARCHAR(1000) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wiadomosc (id INT AUTO_INCREMENT NOT NULL, id_tokenu_id INT NOT NULL, data_wyslania DATETIME NOT NULL, status TINYINT(1) NOT NULL, logi VARCHAR(2000) DEFAULT NULL, INDEX IDX_42C752B7F0D38B11 (id_tokenu_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE wiadomosc ADD CONSTRAINT FK_42C752B7F0D38B11 FOREIGN KEY (id_tokenu_id) REFERENCES token (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE wiadomosc DROP FOREIGN KEY FK_42C752B7F0D38B11');
        $this->addSql('DROP TABLE token');
        $this->addSql('DROP TABLE wiadomosc');
    }
}
