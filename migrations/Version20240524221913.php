<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240524221913 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, entity_id INTEGER NOT NULL, category_name VARCHAR(255) NOT NULL, sku VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, shortdesc VARCHAR(2000) NOT NULL, price DOUBLE PRECISION NOT NULL, link VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, brand VARCHAR(255) NOT NULL, rating SMALLINT NOT NULL, caffeine_type VARCHAR(255) NOT NULL, count INTEGER NOT NULL, flavored BOOLEAN NOT NULL, seasonal BOOLEAN NOT NULL, instock BOOLEAN NOT NULL, facebook BOOLEAN NOT NULL, is_kcup BOOLEAN NOT NULL)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE article');
    }
}
