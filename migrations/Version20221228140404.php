<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221228140404 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comments RENAME INDEX idx_5f9e962a69ccbe9a TO IDX_5F9E962AF675F31B');
        $this->addSql('ALTER TABLE comments RENAME INDEX idx_5f9e962ab46b9ee8 TO IDX_5F9E962AB281BE2E');
        $this->addSql('ALTER TABLE tricks ADD created_at VARCHAR(255) DEFAULT \'CURRENT_TIMESTAMP\' NOT NULL, ADD updated_at VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE tricks RENAME INDEX idx_e1d902c169ccbe9a TO IDX_E1D902C1F675F31B');
        $this->addSql('ALTER TABLE tricks RENAME INDEX idx_e1d902c19777d11e TO IDX_E1D902C112469DE2');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comments RENAME INDEX idx_5f9e962af675f31b TO IDX_5F9E962A69CCBE9A');
        $this->addSql('ALTER TABLE comments RENAME INDEX idx_5f9e962ab281be2e TO IDX_5F9E962AB46B9EE8');
        $this->addSql('ALTER TABLE tricks DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE tricks RENAME INDEX idx_e1d902c112469de2 TO IDX_E1D902C19777D11E');
        $this->addSql('ALTER TABLE tricks RENAME INDEX idx_e1d902c1f675f31b TO IDX_E1D902C169CCBE9A');
    }
}
