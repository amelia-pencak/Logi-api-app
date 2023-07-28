<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230728074808 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tokeny DROP id_tokenu');
        $this->addSql('ALTER TABLE wiadomosci CHANGE id_tokenu id_tokenu_id INT NOT NULL');
        $this->addSql('ALTER TABLE wiadomosci ADD CONSTRAINT FK_B32BD70CF0D38B11 FOREIGN KEY (id_tokenu_id) REFERENCES tokeny (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B32BD70CF0D38B11 ON wiadomosci (id_tokenu_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tokeny ADD id_tokenu INT NOT NULL');
        $this->addSql('ALTER TABLE wiadomosci DROP FOREIGN KEY FK_B32BD70CF0D38B11');
        $this->addSql('DROP INDEX UNIQ_B32BD70CF0D38B11 ON wiadomosci');
        $this->addSql('ALTER TABLE wiadomosci CHANGE id_tokenu_id id_tokenu INT NOT NULL');
    }
}
