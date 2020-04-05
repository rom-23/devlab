<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200404132242 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE project_tools (project_id INT NOT NULL, tools_id INT NOT NULL, INDEX IDX_F9AFD7E9166D1F9C (project_id), INDEX IDX_F9AFD7E9752C489C (tools_id), PRIMARY KEY(project_id, tools_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project_picture (project_id INT NOT NULL, picture_id INT NOT NULL, INDEX IDX_80C543EC166D1F9C (project_id), INDEX IDX_80C543ECEE45BDBF (picture_id), PRIMARY KEY(project_id, picture_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE project_tools ADD CONSTRAINT FK_F9AFD7E9166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_tools ADD CONSTRAINT FK_F9AFD7E9752C489C FOREIGN KEY (tools_id) REFERENCES tools (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_picture ADD CONSTRAINT FK_80C543EC166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_picture ADD CONSTRAINT FK_80C543ECEE45BDBF FOREIGN KEY (picture_id) REFERENCES picture (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE picture_project');
        $this->addSql('DROP TABLE tools_project');
   }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE picture_project (picture_id INT NOT NULL, project_id INT NOT NULL, INDEX IDX_3295243C166D1F9C (project_id), INDEX IDX_3295243CEE45BDBF (picture_id), PRIMARY KEY(picture_id, project_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tools_project (tools_id INT NOT NULL, project_id INT NOT NULL, INDEX IDX_D0FF3403166D1F9C (project_id), INDEX IDX_D0FF3403752C489C (tools_id), PRIMARY KEY(tools_id, project_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE picture_project ADD CONSTRAINT FK_3295243C166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE picture_project ADD CONSTRAINT FK_3295243CEE45BDBF FOREIGN KEY (picture_id) REFERENCES picture (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tools_project ADD CONSTRAINT FK_D0FF3403166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tools_project ADD CONSTRAINT FK_D0FF3403752C489C FOREIGN KEY (tools_id) REFERENCES tools (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE project_tools');
        $this->addSql('DROP TABLE project_picture');
 }
}
