<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240108093104 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `category` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `inventory` (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_B12D4A36A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `inventory_items` (id INT AUTO_INCREMENT NOT NULL, inventory_id INT DEFAULT NULL, items_id INT DEFAULT NULL, is_used TINYINT(1) NOT NULL, INDEX IDX_3D82424D9EEA759 (inventory_id), INDEX IDX_3D82424D6BB0AE84 (items_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `items` (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, rarity_id INT NOT NULL, name VARCHAR(30) NOT NULL, description VARCHAR(255) NOT NULL, score INT NOT NULL, filename VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_E11EE94D12469DE2 (category_id), INDEX IDX_E11EE94DF3747573 (rarity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE items_statistics (items_id INT NOT NULL, statistics_id INT NOT NULL, INDEX IDX_7CCBB5156BB0AE84 (items_id), INDEX IDX_7CCBB5159A2595B2 (statistics_id), PRIMARY KEY(items_id, statistics_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `rarity` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, drop_rate INT NOT NULL, description VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `statistics` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, amount INT NOT NULL, description VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, discord_id VARCHAR(32) NOT NULL, avatar VARCHAR(32) DEFAULT NULL, access_token VARCHAR(255) NOT NULL, is_banned TINYINT(1) DEFAULT 0 NOT NULL, has_played TINYINT(1) DEFAULT 0 NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `inventory` ADD CONSTRAINT FK_B12D4A36A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE `inventory_items` ADD CONSTRAINT FK_3D82424D9EEA759 FOREIGN KEY (inventory_id) REFERENCES `inventory` (id)');
        $this->addSql('ALTER TABLE `inventory_items` ADD CONSTRAINT FK_3D82424D6BB0AE84 FOREIGN KEY (items_id) REFERENCES `items` (id)');
        $this->addSql('ALTER TABLE `items` ADD CONSTRAINT FK_E11EE94D12469DE2 FOREIGN KEY (category_id) REFERENCES `category` (id)');
        $this->addSql('ALTER TABLE `items` ADD CONSTRAINT FK_E11EE94DF3747573 FOREIGN KEY (rarity_id) REFERENCES `rarity` (id)');
        $this->addSql('ALTER TABLE items_statistics ADD CONSTRAINT FK_7CCBB5156BB0AE84 FOREIGN KEY (items_id) REFERENCES `items` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE items_statistics ADD CONSTRAINT FK_7CCBB5159A2595B2 FOREIGN KEY (statistics_id) REFERENCES `statistics` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `inventory` DROP FOREIGN KEY FK_B12D4A36A76ED395');
        $this->addSql('ALTER TABLE `inventory_items` DROP FOREIGN KEY FK_3D82424D9EEA759');
        $this->addSql('ALTER TABLE `inventory_items` DROP FOREIGN KEY FK_3D82424D6BB0AE84');
        $this->addSql('ALTER TABLE `items` DROP FOREIGN KEY FK_E11EE94D12469DE2');
        $this->addSql('ALTER TABLE `items` DROP FOREIGN KEY FK_E11EE94DF3747573');
        $this->addSql('ALTER TABLE items_statistics DROP FOREIGN KEY FK_7CCBB5156BB0AE84');
        $this->addSql('ALTER TABLE items_statistics DROP FOREIGN KEY FK_7CCBB5159A2595B2');
        $this->addSql('DROP TABLE `category`');
        $this->addSql('DROP TABLE `inventory`');
        $this->addSql('DROP TABLE `inventory_items`');
        $this->addSql('DROP TABLE `items`');
        $this->addSql('DROP TABLE items_statistics');
        $this->addSql('DROP TABLE `rarity`');
        $this->addSql('DROP TABLE `statistics`');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
