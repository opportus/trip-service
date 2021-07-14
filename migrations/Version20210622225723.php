<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210622225723 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bus_trip_step (id VARCHAR(36) NOT NULL, trip_id VARCHAR(36) NOT NULL, seat VARCHAR(5) NOT NULL, type VARCHAR(25) NOT NULL, transport_number VARCHAR(256) NOT NULL, departure VARCHAR(256) NOT NULL, arrival VARCHAR(256) NOT NULL, departure_datetime DATETIME NOT NULL, arrival_datetime DATETIME NOT NULL, creation_datetime DATETIME NOT NULL, INDEX IDX_7C654FBDA5BC2E0E (trip_id), INDEX IDX_7C654FBD8CDE5729 (type), INDEX IDX_7C654FBD45E9C671 (departure), INDEX IDX_7C654FBD5BE55CB4 (arrival), INDEX IDX_7C654FBD2F8F6297 (departure_datetime), INDEX IDX_7C654FBD9DE38536 (arrival_datetime), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plane_trip_step (id VARCHAR(36) NOT NULL, trip_id VARCHAR(36) NOT NULL, seat VARCHAR(5) NOT NULL, gate VARCHAR(5) NOT NULL, baggage_drop VARCHAR(5) NOT NULL, type VARCHAR(25) NOT NULL, transport_number VARCHAR(256) NOT NULL, departure VARCHAR(256) NOT NULL, arrival VARCHAR(256) NOT NULL, departure_datetime DATETIME NOT NULL, arrival_datetime DATETIME NOT NULL, creation_datetime DATETIME NOT NULL, INDEX IDX_82B5E5C4A5BC2E0E (trip_id), INDEX IDX_82B5E5C48CDE5729 (type), INDEX IDX_82B5E5C445E9C671 (departure), INDEX IDX_82B5E5C45BE55CB4 (arrival), INDEX IDX_82B5E5C42F8F6297 (departure_datetime), INDEX IDX_82B5E5C49DE38536 (arrival_datetime), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE train_trip_step (id VARCHAR(36) NOT NULL, trip_id VARCHAR(36) NOT NULL, seat VARCHAR(5) NOT NULL, type VARCHAR(25) NOT NULL, transport_number VARCHAR(256) NOT NULL, departure VARCHAR(256) NOT NULL, arrival VARCHAR(256) NOT NULL, departure_datetime DATETIME NOT NULL, arrival_datetime DATETIME NOT NULL, creation_datetime DATETIME NOT NULL, INDEX IDX_F2598780A5BC2E0E (trip_id), INDEX IDX_F25987808CDE5729 (type), INDEX IDX_F259878045E9C671 (departure), INDEX IDX_F25987805BE55CB4 (arrival), INDEX IDX_F25987802F8F6297 (departure_datetime), INDEX IDX_F25987809DE38536 (arrival_datetime), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trip (id VARCHAR(36) NOT NULL, creation_datetime DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bus_trip_step ADD CONSTRAINT FK_7C654FBDA5BC2E0E FOREIGN KEY (trip_id) REFERENCES trip (id)');
        $this->addSql('ALTER TABLE plane_trip_step ADD CONSTRAINT FK_82B5E5C4A5BC2E0E FOREIGN KEY (trip_id) REFERENCES trip (id)');
        $this->addSql('ALTER TABLE train_trip_step ADD CONSTRAINT FK_F2598780A5BC2E0E FOREIGN KEY (trip_id) REFERENCES trip (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bus_trip_step DROP FOREIGN KEY FK_7C654FBDA5BC2E0E');
        $this->addSql('ALTER TABLE plane_trip_step DROP FOREIGN KEY FK_82B5E5C4A5BC2E0E');
        $this->addSql('ALTER TABLE train_trip_step DROP FOREIGN KEY FK_F2598780A5BC2E0E');
        $this->addSql('DROP TABLE bus_trip_step');
        $this->addSql('DROP TABLE plane_trip_step');
        $this->addSql('DROP TABLE train_trip_step');
        $this->addSql('DROP TABLE trip');
    }
}
