<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200905114631 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE signalements (signalement_id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, channel_name VARCHAR(150) NOT NULL, url_stream VARCHAR(255) NOT NULL, motif VARCHAR(100) NOT NULL, channel_id VARCHAR(255) NOT NULL, date_stream DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(signalement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (user_id INT AUTO_INCREMENT NOT NULL, facebook_user_id VARCHAR(255) DEFAULT NULL, facebook_access_token VARCHAR(255) DEFAULT NULL, email VARCHAR(255) NOT NULL, username VARCHAR(100) NOT NULL, avatar VARCHAR(255) NOT NULL, password VARCHAR(80) DEFAULT NULL, oauth_access_token VARCHAR(255) DEFAULT NULL, status VARCHAR(8) NOT NULL, role VARCHAR(11) NOT NULL, subscribe TINYINT(1) NOT NULL, channel_id VARCHAR(255) DEFAULT NULL, stripe_id VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE signalements');
        $this->addSql('DROP TABLE users');
    }
}
