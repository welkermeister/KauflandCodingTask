<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240525084920 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__article AS SELECT id, entity_id, category_name, sku, name, description, shortdesc, price, link, image, brand, rating, caffeine_type, count, flavored, seasonal, instock, facebook, is_kcup FROM article');
        $this->addSql('DROP TABLE article');
        $this->addSql('CREATE TABLE article (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, entity_id INTEGER NOT NULL, category_name VARCHAR(255) NOT NULL, sku VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, shortdesc VARCHAR(2000) NOT NULL, price DOUBLE PRECISION NOT NULL, link VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, brand VARCHAR(255) NOT NULL, rating SMALLINT NOT NULL, caffeine_type VARCHAR(255) NOT NULL, count INTEGER NOT NULL, flavored VARCHAR(3) NOT NULL, seasonal VARCHAR(3) NOT NULL, instock VARCHAR(3) NOT NULL, facebook BOOLEAN NOT NULL, is_kcup BOOLEAN NOT NULL)');
        $this->addSql('INSERT INTO article (id, entity_id, category_name, sku, name, description, shortdesc, price, link, image, brand, rating, caffeine_type, count, flavored, seasonal, instock, facebook, is_kcup) SELECT id, entity_id, category_name, sku, name, description, shortdesc, price, link, image, brand, rating, caffeine_type, count, flavored, seasonal, instock, facebook, is_kcup FROM __temp__article');
        $this->addSql('DROP TABLE __temp__article');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__article AS SELECT id, entity_id, category_name, sku, name, description, shortdesc, price, link, image, brand, rating, caffeine_type, count, flavored, seasonal, instock, facebook, is_kcup FROM article');
        $this->addSql('DROP TABLE article');
        $this->addSql('CREATE TABLE article (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, entity_id INTEGER NOT NULL, category_name VARCHAR(255) NOT NULL, sku VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, shortdesc VARCHAR(2000) NOT NULL, price DOUBLE PRECISION NOT NULL, link VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, brand VARCHAR(255) NOT NULL, rating SMALLINT NOT NULL, caffeine_type VARCHAR(255) NOT NULL, count INTEGER NOT NULL, flavored BOOLEAN NOT NULL, seasonal BOOLEAN NOT NULL, instock BOOLEAN NOT NULL, facebook BOOLEAN NOT NULL, is_kcup BOOLEAN NOT NULL)');
        $this->addSql('INSERT INTO article (id, entity_id, category_name, sku, name, description, shortdesc, price, link, image, brand, rating, caffeine_type, count, flavored, seasonal, instock, facebook, is_kcup) SELECT id, entity_id, category_name, sku, name, description, shortdesc, price, link, image, brand, rating, caffeine_type, count, flavored, seasonal, instock, facebook, is_kcup FROM __temp__article');
        $this->addSql('DROP TABLE __temp__article');
    }
}
