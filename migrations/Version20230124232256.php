<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230124232256 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE draw_loto (id INT AUTO_INCREMENT NOT NULL, year_draw_number INT NOT NULL, draw_day VARCHAR(255) NOT NULL, draw_date VARCHAR(255) NOT NULL, ball1 INT NOT NULL, ball2 INT NOT NULL, ball3 INT NOT NULL, ball4 INT NOT NULL, ball5 INT NOT NULL, lucky_number INT NOT NULL, ascending_winning_combination VARCHAR(255) NOT NULL, number_of_winner_in_rank1 INT NOT NULL, rank_report1 INT NOT NULL, number_of_winner_in_rank2 INT NOT NULL, rank_report2 INT NOT NULL, number_of_winner_in_rank3 INT NOT NULL, rank_report3 INT NOT NULL, number_of_winner_in_rank4 INT NOT NULL, rank_report4 INT NOT NULL, number_of_winner_in_rank5 INT NOT NULL, rank_report5 INT NOT NULL, number_of_winner_in_rank6 INT NOT NULL, rank_report6 INT NOT NULL, number_of_winner_in_rank7 INT NOT NULL, rank_report7 INT NOT NULL, number_of_winner_in_rank8 INT NOT NULL, rank_report8 INT NOT NULL, number_of_winner_in_rank9 INT NOT NULL, rank_report9 INT NOT NULL, ball1_second_draw INT NOT NULL, ball2_second_draw INT NOT NULL, ball3_second_draw INT NOT NULL, ball4_second_draw INT NOT NULL, ball5_second_draw INT NOT NULL, ascending_winning_combination_second_draw VARCHAR(255) NOT NULL, number_of_winner_in_rank1_second_draw INT NOT NULL, rank_report1_second_draw INT NOT NULL, number_of_winner_in_rank2_second_draw INT NOT NULL, rank_report2_second_draw INT NOT NULL, number_of_winner_in_rank3_second_draw INT NOT NULL, rank_report3_second_draw INT NOT NULL, number_of_winner_in_rank4_second_draw INT NOT NULL, rank_report4_second_draw INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE draw_loto');
    }
}
