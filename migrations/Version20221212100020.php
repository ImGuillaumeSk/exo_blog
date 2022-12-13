<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221212100020 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce_list_by_user ADD annonces_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE annonce_list_by_user ADD CONSTRAINT FK_81A4A15E4C2885D7 FOREIGN KEY (annonces_id) REFERENCES annonce (id)');
        $this->addSql('CREATE INDEX IDX_81A4A15E4C2885D7 ON annonce_list_by_user (annonces_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce_list_by_user DROP FOREIGN KEY FK_81A4A15E4C2885D7');
        $this->addSql('DROP INDEX IDX_81A4A15E4C2885D7 ON annonce_list_by_user');
        $this->addSql('ALTER TABLE annonce_list_by_user DROP annonces_id');
    }
}
