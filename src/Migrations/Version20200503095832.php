<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200503095832 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EE9D1F836B');
        $this->addSql('DROP INDEX IDX_2FB3D0EE9D1F836B ON project');
        $this->addSql('ALTER TABLE project DROP attachments_id');
        $this->addSql('ALTER TABLE attachment ADD project_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE attachment ADD CONSTRAINT FK_795FD9BB166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('CREATE INDEX IDX_795FD9BB166D1F9C ON attachment (project_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE attachment DROP FOREIGN KEY FK_795FD9BB166D1F9C');
        $this->addSql('DROP INDEX IDX_795FD9BB166D1F9C ON attachment');
        $this->addSql('ALTER TABLE attachment DROP project_id');
        $this->addSql('ALTER TABLE project ADD attachments_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE9D1F836B FOREIGN KEY (attachments_id) REFERENCES attachment (id)');
        $this->addSql('CREATE INDEX IDX_2FB3D0EE9D1F836B ON project (attachments_id)');
    }
}
