<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231215182330 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE amulet (id INT AUTO_INCREMENT NOT NULL, statistic_id INT NOT NULL, rarity_id INT NOT NULL, name VARCHAR(30) NOT NULL, description VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_4106868D53B6268F (statistic_id), INDEX IDX_4106868DF3747573 (rarity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE belt (id INT AUTO_INCREMENT NOT NULL, statistic_id INT NOT NULL, rarity_id INT NOT NULL, name VARCHAR(30) NOT NULL, description VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_605778D153B6268F (statistic_id), INDEX IDX_605778D1F3747573 (rarity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE boot (id INT AUTO_INCREMENT NOT NULL, statistic_id INT NOT NULL, rarity_id INT NOT NULL, name VARCHAR(30) NOT NULL, description VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_46EDAEC453B6268F (statistic_id), INDEX IDX_46EDAEC4F3747573 (rarity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chest (id INT AUTO_INCREMENT NOT NULL, statistic_id INT NOT NULL, rarity_id INT NOT NULL, name VARCHAR(30) NOT NULL, description VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_FB44B3B753B6268F (statistic_id), INDEX IDX_FB44B3B7F3747573 (rarity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE glove (id INT AUTO_INCREMENT NOT NULL, statistic_id INT NOT NULL, rarity_id INT NOT NULL, name VARCHAR(30) NOT NULL, description VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_9BF6D34153B6268F (statistic_id), INDEX IDX_9BF6D341F3747573 (rarity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE helmet (id INT AUTO_INCREMENT NOT NULL, statistic_id INT NOT NULL, rarity_id INT NOT NULL, name VARCHAR(30) NOT NULL, description VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7AAAEEA653B6268F (statistic_id), INDEX IDX_7AAAEEA6F3747573 (rarity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rarity (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, drop_rate INT NOT NULL, description VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ring (id INT AUTO_INCREMENT NOT NULL, statistic_id INT NOT NULL, rarity_id INT NOT NULL, name VARCHAR(30) NOT NULL, description VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_8FDCF57653B6268F (statistic_id), INDEX IDX_8FDCF576F3747573 (rarity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shield (id INT AUTO_INCREMENT NOT NULL, statistic_id INT NOT NULL, rarity_id INT NOT NULL, name VARCHAR(30) NOT NULL, description VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_1E93D2E853B6268F (statistic_id), INDEX IDX_1E93D2E8F3747573 (rarity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statistics (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, amount INT NOT NULL, description VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trouser (id INT AUTO_INCREMENT NOT NULL, statistic_id INT NOT NULL, rarity_id INT NOT NULL, name VARCHAR(30) NOT NULL, description VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_74146E4553B6268F (statistic_id), INDEX IDX_74146E45F3747573 (rarity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, discord_id VARCHAR(32) NOT NULL, avatar VARCHAR(32) DEFAULT NULL, access_token VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE weapon (id INT AUTO_INCREMENT NOT NULL, statistic_id INT NOT NULL, rarity_id INT NOT NULL, name VARCHAR(30) NOT NULL, description VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_6933A7E653B6268F (statistic_id), INDEX IDX_6933A7E6F3747573 (rarity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE amulet ADD CONSTRAINT FK_4106868D53B6268F FOREIGN KEY (statistic_id) REFERENCES statistics (id)');
        $this->addSql('ALTER TABLE amulet ADD CONSTRAINT FK_4106868DF3747573 FOREIGN KEY (rarity_id) REFERENCES rarity (id)');
        $this->addSql('ALTER TABLE belt ADD CONSTRAINT FK_605778D153B6268F FOREIGN KEY (statistic_id) REFERENCES statistics (id)');
        $this->addSql('ALTER TABLE belt ADD CONSTRAINT FK_605778D1F3747573 FOREIGN KEY (rarity_id) REFERENCES rarity (id)');
        $this->addSql('ALTER TABLE boot ADD CONSTRAINT FK_46EDAEC453B6268F FOREIGN KEY (statistic_id) REFERENCES statistics (id)');
        $this->addSql('ALTER TABLE boot ADD CONSTRAINT FK_46EDAEC4F3747573 FOREIGN KEY (rarity_id) REFERENCES rarity (id)');
        $this->addSql('ALTER TABLE chest ADD CONSTRAINT FK_FB44B3B753B6268F FOREIGN KEY (statistic_id) REFERENCES statistics (id)');
        $this->addSql('ALTER TABLE chest ADD CONSTRAINT FK_FB44B3B7F3747573 FOREIGN KEY (rarity_id) REFERENCES rarity (id)');
        $this->addSql('ALTER TABLE glove ADD CONSTRAINT FK_9BF6D34153B6268F FOREIGN KEY (statistic_id) REFERENCES statistics (id)');
        $this->addSql('ALTER TABLE glove ADD CONSTRAINT FK_9BF6D341F3747573 FOREIGN KEY (rarity_id) REFERENCES rarity (id)');
        $this->addSql('ALTER TABLE helmet ADD CONSTRAINT FK_7AAAEEA653B6268F FOREIGN KEY (statistic_id) REFERENCES statistics (id)');
        $this->addSql('ALTER TABLE helmet ADD CONSTRAINT FK_7AAAEEA6F3747573 FOREIGN KEY (rarity_id) REFERENCES rarity (id)');
        $this->addSql('ALTER TABLE ring ADD CONSTRAINT FK_8FDCF57653B6268F FOREIGN KEY (statistic_id) REFERENCES statistics (id)');
        $this->addSql('ALTER TABLE ring ADD CONSTRAINT FK_8FDCF576F3747573 FOREIGN KEY (rarity_id) REFERENCES rarity (id)');
        $this->addSql('ALTER TABLE shield ADD CONSTRAINT FK_1E93D2E853B6268F FOREIGN KEY (statistic_id) REFERENCES statistics (id)');
        $this->addSql('ALTER TABLE shield ADD CONSTRAINT FK_1E93D2E8F3747573 FOREIGN KEY (rarity_id) REFERENCES rarity (id)');
        $this->addSql('ALTER TABLE trouser ADD CONSTRAINT FK_74146E4553B6268F FOREIGN KEY (statistic_id) REFERENCES statistics (id)');
        $this->addSql('ALTER TABLE trouser ADD CONSTRAINT FK_74146E45F3747573 FOREIGN KEY (rarity_id) REFERENCES rarity (id)');
        $this->addSql('ALTER TABLE weapon ADD CONSTRAINT FK_6933A7E653B6268F FOREIGN KEY (statistic_id) REFERENCES statistics (id)');
        $this->addSql('ALTER TABLE weapon ADD CONSTRAINT FK_6933A7E6F3747573 FOREIGN KEY (rarity_id) REFERENCES rarity (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE amulet DROP FOREIGN KEY FK_4106868D53B6268F');
        $this->addSql('ALTER TABLE amulet DROP FOREIGN KEY FK_4106868DF3747573');
        $this->addSql('ALTER TABLE belt DROP FOREIGN KEY FK_605778D153B6268F');
        $this->addSql('ALTER TABLE belt DROP FOREIGN KEY FK_605778D1F3747573');
        $this->addSql('ALTER TABLE boot DROP FOREIGN KEY FK_46EDAEC453B6268F');
        $this->addSql('ALTER TABLE boot DROP FOREIGN KEY FK_46EDAEC4F3747573');
        $this->addSql('ALTER TABLE chest DROP FOREIGN KEY FK_FB44B3B753B6268F');
        $this->addSql('ALTER TABLE chest DROP FOREIGN KEY FK_FB44B3B7F3747573');
        $this->addSql('ALTER TABLE glove DROP FOREIGN KEY FK_9BF6D34153B6268F');
        $this->addSql('ALTER TABLE glove DROP FOREIGN KEY FK_9BF6D341F3747573');
        $this->addSql('ALTER TABLE helmet DROP FOREIGN KEY FK_7AAAEEA653B6268F');
        $this->addSql('ALTER TABLE helmet DROP FOREIGN KEY FK_7AAAEEA6F3747573');
        $this->addSql('ALTER TABLE ring DROP FOREIGN KEY FK_8FDCF57653B6268F');
        $this->addSql('ALTER TABLE ring DROP FOREIGN KEY FK_8FDCF576F3747573');
        $this->addSql('ALTER TABLE shield DROP FOREIGN KEY FK_1E93D2E853B6268F');
        $this->addSql('ALTER TABLE shield DROP FOREIGN KEY FK_1E93D2E8F3747573');
        $this->addSql('ALTER TABLE trouser DROP FOREIGN KEY FK_74146E4553B6268F');
        $this->addSql('ALTER TABLE trouser DROP FOREIGN KEY FK_74146E45F3747573');
        $this->addSql('ALTER TABLE weapon DROP FOREIGN KEY FK_6933A7E653B6268F');
        $this->addSql('ALTER TABLE weapon DROP FOREIGN KEY FK_6933A7E6F3747573');
        $this->addSql('DROP TABLE amulet');
        $this->addSql('DROP TABLE belt');
        $this->addSql('DROP TABLE boot');
        $this->addSql('DROP TABLE chest');
        $this->addSql('DROP TABLE glove');
        $this->addSql('DROP TABLE helmet');
        $this->addSql('DROP TABLE rarity');
        $this->addSql('DROP TABLE ring');
        $this->addSql('DROP TABLE shield');
        $this->addSql('DROP TABLE statistics');
        $this->addSql('DROP TABLE trouser');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE weapon');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
