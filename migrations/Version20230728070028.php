<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230728070028 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tokeny DROP FOREIGN KEY FK_4A8FF890F0D38B11');
        $this->addSql('CREATE TABLE wiadomosci (id INT AUTO_INCREMENT NOT NULL, data_wyslania DATE NOT NULL, id_tokenu INT NOT NULL, status TINYINT(1) NOT NULL, logi VARCHAR(2000) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE wiadomosc');
        $this->addSql('DROP INDEX UNIQ_4A8FF890F0D38B11 ON tokeny');
        $this->addSql('ALTER TABLE tokeny CHANGE id_tokenu_id id_tokenu INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE wiadomosc (id INT AUTO_INCREMENT NOT NULL, data_wyslania DATETIME NOT NULL, logi VARCHAR(2000) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE wiadomosci');
        $this->addSql('ALTER TABLE tokeny CHANGE id_tokenu id_tokenu_id INT NOT NULL');
        $this->addSql('ALTER TABLE tokeny ADD CONSTRAINT FK_4A8FF890F0D38B11 FOREIGN KEY (id_tokenu_id) REFERENCES wiadomosc (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4A8FF890F0D38B11 ON tokeny (id_tokenu_id)');
    }
}
