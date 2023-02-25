<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230102231403 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE draw_euromillions (id INT AUTO_INCREMENT NOT NULL, year_draw_number INT NOT NULL, draw_day VARCHAR(255) NOT NULL, draw_date VARCHAR(255) NOT NULL, ball1 INT NOT NULL, ball2 INT NOT NULL, ball3 INT NOT NULL, ball4 INT NOT NULL, ball5 INT NOT NULL, star1 INT NOT NULL, star2 INT NOT NULL, ascending_winning_balls VARCHAR(255) NOT NULL, ascending_winning_stars VARCHAR(255) NOT NULL, number_of_winner_in_rank1_in_france INT NOT NULL, number_of_winner_in_rank1_in_europe INT NOT NULL, rank_report1 INT NOT NULL, number_of_winner_in_rank2_in_france INT NOT NULL, number_of_winner_in_rank2_in_europe INT NOT NULL, rank_report2 INT NOT NULL, number_of_winner_in_rank3_in_france INT NOT NULL, number_of_winner_in_rank3_in_europe INT NOT NULL, rank_report3 INT NOT NULL, number_of_winner_in_rank4_in_france INT NOT NULL, number_of_winner_in_rank4_in_europe INT NOT NULL, rank_report4 INT NOT NULL, number_of_winner_in_rank5_in_france INT NOT NULL, number_of_winner_in_rank5_in_europe INT NOT NULL, rank_report5 INT NOT NULL, number_of_winner_in_rank6_in_france INT NOT NULL, number_of_winner_in_rank6_in_europe INT NOT NULL, rank_report6 INT NOT NULL, number_of_winner_in_rank7_in_france INT NOT NULL, number_of_winner_in_rank7_in_europe INT NOT NULL, rank_report7 INT NOT NULL, number_of_winner_in_rank8_in_france INT NOT NULL, number_of_winner_in_rank8_in_europe INT NOT NULL, rank_report8 INT NOT NULL, number_of_winner_in_rank9_in_france INT NOT NULL, number_of_winner_in_rank9_in_europe INT NOT NULL, rank_report9 INT NOT NULL, number_of_winner_in_rank10_in_france INT NOT NULL, number_of_winner_in_rank10_in_europe INT NOT NULL, rank_report10 INT NOT NULL, number_of_winner_in_rank11_in_france INT NOT NULL, number_of_winner_in_rank11_in_europe INT NOT NULL, rank_report11 INT NOT NULL, number_of_winner_in_rank12_in_france INT NOT NULL, number_of_winner_in_rank12_in_europe INT NOT NULL, rank_report12 INT NOT NULL, number_of_winner_in_rank13_in_france INT NOT NULL, number_of_winner_in_rank13_in_europe INT NOT NULL, rank_report13 INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE draw_euromillions');
    }
}
