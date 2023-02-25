<?php

namespace App\Entity;

use App\Repository\DrawLotoRepository;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: DrawLotoRepository::class)]
class DrawLoto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $yearDrawNumber;

    #[ORM\Column]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 5, max: 8)]
    private ?string $drawDay;

    #[ORM\Column]
    #[Assert\NotNull()]
    private $drawDate;

    #[ORM\Column]
    #[Assert\NotNull()]
    #[Assert\GreaterThanOrEqual(1)]
    #[Assert\LessThanOrEqual(49)]
    private ?int $ball1;

    #[ORM\Column]
    #[Assert\NotNull()]
    #[Assert\GreaterThanOrEqual(1)]
    #[Assert\LessThanOrEqual(49)]
    private ?int $ball2;

    #[ORM\Column]
    #[Assert\NotNull()]
    #[Assert\GreaterThanOrEqual(1)]
    #[Assert\LessThanOrEqual(49)]
    private ?int $ball3;

    #[ORM\Column]
    #[Assert\NotNull()]
    #[Assert\GreaterThanOrEqual(1)]
    #[Assert\LessThanOrEqual(49)]
    private ?int $ball4;

    #[ORM\Column]
    #[Assert\NotNull()]
    #[Assert\GreaterThanOrEqual(1)]
    #[Assert\LessThanOrEqual(49)]
    private ?int $ball5;

    #[ORM\Column]
    #[Assert\NotNull()]
    #[Assert\GreaterThanOrEqual(1)]
    #[Assert\LessThanOrEqual(10)]
    private ?int $luckyNumber;

    #[ORM\Column]
    #[Assert\NotBlank]
    private ?string $ascendingWinningCombination;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank1;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $rankReport1;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank2;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $rankReport2;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank3;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $rankReport3;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank4;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $rankReport4;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank5;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $rankReport5;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank6;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $rankReport6;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank7;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $rankReport7;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank8;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $rankReport8;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank9;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $rankReport9;

    #[ORM\Column]
    #[Assert\NotNull()]
    #[Assert\GreaterThanOrEqual(1)]
    #[Assert\LessThanOrEqual(49)]
    private ?int $ball1SecondDraw;

    #[ORM\Column]
    #[Assert\NotNull()]
    #[Assert\GreaterThanOrEqual(1)]
    #[Assert\LessThanOrEqual(49)]
    private ?int $ball2SecondDraw;

    #[ORM\Column]
    #[Assert\NotNull()]
    #[Assert\GreaterThanOrEqual(1)]
    #[Assert\LessThanOrEqual(49)]
    private ?int $ball3SecondDraw;

    #[ORM\Column]
    #[Assert\NotNull()]
    #[Assert\GreaterThanOrEqual(1)]
    #[Assert\LessThanOrEqual(49)]
    private ?int $ball4SecondDraw;

    #[ORM\Column]
    #[Assert\NotNull()]
    #[Assert\GreaterThanOrEqual(1)]
    #[Assert\LessThanOrEqual(49)]
    private ?int $ball5SecondDraw;

    #[ORM\Column]
    #[Assert\NotBlank]
    private ?string $ascendingWinningCombinationSecondDraw;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank1SecondDraw;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $rankReport1SecondDraw;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank2SecondDraw;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $rankReport2SecondDraw;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank3SecondDraw;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $rankReport3SecondDraw;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank4SecondDraw;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $rankReport4SecondDraw;

    public function getBallsArray(): array
    {
        $ballsArray = [$this->ball1, $this->ball2, $this->ball3, $this->ball4, $this->ball5];
        return $ballsArray;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYearDrawNumber(): ?int
    {
        return $this->yearDrawNumber;
    }

    public function setYearDrawNumber(int $yearDrawNumber): self
    {
        $this->yearDrawNumber = $yearDrawNumber;

        return $this;
    }

    public function getDrawDay(): ?string
    {
        return $this->drawDay;
    }

    public function setDrawDay(string $drawDay): self
    {
        $this->drawDay = $drawDay;

        return $this;
    }

    public function getDrawDate(): ?string
    {
        return $this->drawDate;
    }

    public function setDrawDate(string $drawDate): self
    {
        $this->drawDate = $drawDate;

        return $this;
    }

    public function getBall1(): ?int
    {
        return $this->ball1;
    }

    public function setBall1(int $ball1): self
    {
        $this->ball1 = $ball1;

        return $this;
    }

    public function getBall2(): ?int
    {
        return $this->ball2;
    }

    public function setBall2(int $ball2): self
    {
        $this->ball2 = $ball2;

        return $this;
    }

    public function getBall3(): ?int
    {
        return $this->ball3;
    }

    public function setBall3(int $ball3): self
    {
        $this->ball3 = $ball3;

        return $this;
    }

    public function getBall4(): ?int
    {
        return $this->ball4;
    }

    public function setBall4(int $ball4): self
    {
        $this->ball4 = $ball4;

        return $this;
    }

    public function getBall5(): ?int
    {
        return $this->ball5;
    }

    public function setBall5(int $ball5): self
    {
        $this->ball5 = $ball5;

        return $this;
    }

    public function getLuckyNumber(): ?int
    {
        return $this->luckyNumber;
    }

    public function setLuckyNumber(int $luckyNumber): self
    {
        $this->luckyNumber = $luckyNumber;

        return $this;
    }

    public function getAscendingWinningBallsCombination(): ?string
    {
        /* retrait du "numéro chance" qui est placé à la fin de la "string" */

        return substr($this->ascendingWinningCombination, 0, strpos($this->ascendingWinningCombination, '+'));
    }

    public function getAscendingWinningCombination(): ?string
    {
        return $this->ascendingWinningCombination;
    }

    public function setAscendingWinningCombination(string $ascendingWinningCombination): self
    {
        $this->ascendingWinningCombination = $ascendingWinningCombination;

        return $this;
    }

    public function getNumberOfWinnerInRank1(): ?int
    {
        return $this->numberOfWinnerInRank1;
    }

    public function setNumberOfWinnerInRank1(int $numberOfWinnerInRank1): self
    {
        $this->numberOfWinnerInRank1 = $numberOfWinnerInRank1;

        return $this;
    }

    public function getRankReport1(): ?int
    {
        return $this->rankReport1;
    }

    public function setRankReport1(int $rankReport1): self
    {
        $this->rankReport1 = $rankReport1;

        return $this;
    }

    public function getNumberOfWinnerInRank2(): ?int
    {
        return $this->numberOfWinnerInRank2;
    }

    public function setNumberOfWinnerInRank2(int $numberOfWinnerInRank2): self
    {
        $this->numberOfWinnerInRank2 = $numberOfWinnerInRank2;

        return $this;
    }

    public function getRankReport2(): ?int
    {
        return $this->rankReport2;
    }

    public function setRankReport2(int $rankReport2): self
    {
        $this->rankReport2 = $rankReport2;

        return $this;
    }

    public function getNumberOfWinnerInRank3(): ?int
    {
        return $this->numberOfWinnerInRank3;
    }

    public function setNumberOfWinnerInRank3(int $numberOfWinnerInRank3): self
    {
        $this->numberOfWinnerInRank3 = $numberOfWinnerInRank3;

        return $this;
    }

    public function getRankReport3(): ?int
    {
        return $this->rankReport3;
    }

    public function setRankReport3(int $rankReport3): self
    {
        $this->rankReport3 = $rankReport3;

        return $this;
    }

    public function getNumberOfWinnerInRank4(): ?int
    {
        return $this->numberOfWinnerInRank4;
    }

    public function setNumberOfWinnerInRank4(int $numberOfWinnerInRank4): self
    {
        $this->numberOfWinnerInRank4 = $numberOfWinnerInRank4;

        return $this;
    }

    public function getRankReport4(): ?int
    {
        return $this->rankReport4;
    }

    public function setRankReport4(int $rankReport4): self
    {
        $this->rankReport4 = $rankReport4;

        return $this;
    }

    public function getNumberOfWinnerInRank5(): ?int
    {
        return $this->numberOfWinnerInRank5;
    }

    public function setNumberOfWinnerInRank5(int $numberOfWinnerInRank5): self
    {
        $this->numberOfWinnerInRank5 = $numberOfWinnerInRank5;

        return $this;
    }

    public function getRankReport5(): ?int
    {
        return $this->rankReport5;
    }

    public function setRankReport5(int $rankReport5): self
    {
        $this->rankReport5 = $rankReport5;

        return $this;
    }

    public function getNumberOfWinnerInRank6(): ?int
    {
        return $this->numberOfWinnerInRank6;
    }

    public function setNumberOfWinnerInRank6(int $numberOfWinnerInRank6): self
    {
        $this->numberOfWinnerInRank6 = $numberOfWinnerInRank6;

        return $this;
    }

    public function getRankReport6(): ?int
    {
        return $this->rankReport6;
    }

    public function setRankReport6(int $rankReport6): self
    {
        $this->rankReport6 = $rankReport6;

        return $this;
    }

    public function getNumberOfWinnerInRank7(): ?int
    {
        return $this->numberOfWinnerInRank7;
    }

    public function setNumberOfWinnerInRank7(int $numberOfWinnerInRank7): self
    {
        $this->numberOfWinnerInRank7 = $numberOfWinnerInRank7;

        return $this;
    }

    public function getRankReport7(): ?int
    {
        return $this->rankReport7;
    }

    public function setRankReport7(int $rankReport7): self
    {
        $this->rankReport7 = $rankReport7;

        return $this;
    }

    public function getNumberOfWinnerInRank8(): ?int
    {
        return $this->numberOfWinnerInRank8;
    }

    public function setNumberOfWinnerInRank8(int $numberOfWinnerInRank8): self
    {
        $this->numberOfWinnerInRank8 = $numberOfWinnerInRank8;

        return $this;
    }

    public function getRankReport8(): ?int
    {
        return $this->rankReport8;
    }

    public function setRankReport8(int $rankReport8): self
    {
        $this->rankReport8 = $rankReport8;

        return $this;
    }

    public function getNumberOfWinnerInRank9(): ?int
    {
        return $this->numberOfWinnerInRank9;
    }

    public function setNumberOfWinnerInRank9(int $numberOfWinnerInRank9): self
    {
        $this->numberOfWinnerInRank9 = $numberOfWinnerInRank9;

        return $this;
    }

    public function getRankReport9(): ?int
    {
        return $this->rankReport9;
    }

    public function setRankReport9(int $rankReport9): self
    {
        $this->rankReport9 = $rankReport9;

        return $this;
    }

    public function getBall1SecondDraw(): ?int
    {
        return $this->ball1SecondDraw;
    }

    public function setBall1SecondDraw(int $ball1SecondDraw): self
    {
        $this->ball1SecondDraw = $ball1SecondDraw;

        return $this;
    }

    public function getBall2SecondDraw(): ?int
    {
        return $this->ball2SecondDraw;
    }

    public function setBall2SecondDraw(int $ball2SecondDraw): self
    {
        $this->ball2SecondDraw = $ball2SecondDraw;

        return $this;
    }

    public function getBall3SecondDraw(): ?int
    {
        return $this->ball3SecondDraw;
    }

    public function setBall3SecondDraw(int $ball3SecondDraw): self
    {
        $this->ball3SecondDraw = $ball3SecondDraw;

        return $this;
    }

    public function getBall4SecondDraw(): ?int
    {
        return $this->ball4SecondDraw;
    }

    public function setBall4SecondDraw(int $ball4SecondDraw): self
    {
        $this->ball4SecondDraw = $ball4SecondDraw;

        return $this;
    }

    public function getBall5SecondDraw(): ?int
    {
        return $this->ball5SecondDraw;
    }

    public function setBall5SecondDraw(int $ball5SecondDraw): self
    {
        $this->ball5SecondDraw = $ball5SecondDraw;

        return $this;
    }

    public function getAscendingWinningCombinationSecondDraw(): ?string
    {
        return $this->ascendingWinningCombinationSecondDraw;
    }

    public function setAscendingWinningCombinationSecondDraw(string $ascendingWinningCombinationSecondDraw): self
    {
        $this->ascendingWinningCombinationSecondDraw = $ascendingWinningCombinationSecondDraw;

        return $this;
    }

    public function getNumberOfWinnerInRank1SecondDraw(): ?int
    {
        return $this->numberOfWinnerInRank1SecondDraw;
    }

    public function setNumberOfWinnerInRank1SecondDraw(int $numberOfWinnerInRank1SecondDraw): self
    {
        $this->numberOfWinnerInRank1SecondDraw = $numberOfWinnerInRank1SecondDraw;

        return $this;
    }

    public function getRankReport1SecondDraw(): ?int
    {
        return $this->rankReport1SecondDraw;
    }

    public function setRankReport1SecondDraw(int $rankReport1SecondDraw): self
    {
        $this->rankReport1SecondDraw = $rankReport1SecondDraw;

        return $this;
    }

    public function getNumberOfWinnerInRank2SecondDraw(): ?int
    {
        return $this->numberOfWinnerInRank2SecondDraw;
    }

    public function setNumberOfWinnerInRank2SecondDraw(int $numberOfWinnerInRank2SecondDraw): self
    {
        $this->numberOfWinnerInRank2SecondDraw = $numberOfWinnerInRank2SecondDraw;

        return $this;
    }

    public function getRankReport2SecondDraw(): ?int
    {
        return $this->rankReport2SecondDraw;
    }

    public function setRankReport2SecondDraw(int $rankReport2SecondDraw): self
    {
        $this->rankReport2SecondDraw = $rankReport2SecondDraw;

        return $this;
    }

    public function getNumberOfWinnerInRank3SecondDraw(): ?int
    {
        return $this->numberOfWinnerInRank3SecondDraw;
    }

    public function setNumberOfWinnerInRank3SecondDraw(int $numberOfWinnerInRank3SecondDraw): self
    {
        $this->numberOfWinnerInRank3SecondDraw = $numberOfWinnerInRank3SecondDraw;

        return $this;
    }

    public function getRankReport3SecondDraw(): ?int
    {
        return $this->rankReport3SecondDraw;
    }

    public function setRankReport3SecondDraw(int $rankReport3SecondDraw): self
    {
        $this->rankReport3SecondDraw = $rankReport3SecondDraw;

        return $this;
    }

    public function getNumberOfWinnerInRank4SecondDraw(): ?int
    {
        return $this->numberOfWinnerInRank4SecondDraw;
    }

    public function setNumberOfWinnerInRank4SecondDraw(int $numberOfWinnerInRank4SecondDraw): self
    {
        $this->numberOfWinnerInRank4SecondDraw = $numberOfWinnerInRank4SecondDraw;

        return $this;
    }

    public function getRankReport4SecondDraw(): ?int
    {
        return $this->rankReport4SecondDraw;
    }

    public function setRankReport4SecondDraw(int $rankReport4SecondDraw): self
    {
        $this->rankReport4SecondDraw = $rankReport4SecondDraw;

        return $this;
    }
}
