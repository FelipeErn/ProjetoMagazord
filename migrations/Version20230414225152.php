<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230414225152 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE contato_id_contato_seq CASCADE');
        $this->addSql('CREATE SEQUENCE contato_idcontato_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('DROP INDEX "primary"');
        $this->addSql('ALTER TABLE contato RENAME COLUMN id_contato TO idcontato');
        $this->addSql('ALTER TABLE contato ADD PRIMARY KEY (idcontato)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE contato_idcontato_seq CASCADE');
        $this->addSql('CREATE SEQUENCE contato_id_contato_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('DROP INDEX contato_pkey');
        $this->addSql('ALTER TABLE contato RENAME COLUMN idcontato TO id_contato');
        $this->addSql('ALTER TABLE contato ADD PRIMARY KEY (id_contato)');
    }
}
