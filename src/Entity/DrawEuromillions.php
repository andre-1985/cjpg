<?php

namespace App\Entity;

use App\Repository\DrawEuromillionsRepository;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: DrawEuromillionsRepository::class)]
class DrawEuromillions
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
    #[Assert\LessThanOrEqual(50)]
    private ?int $ball1;

    #[ORM\Column]
    #[Assert\NotNull()]
    #[Assert\GreaterThanOrEqual(1)]
    #[Assert\LessThanOrEqual(50)]
    private ?int $ball2;

    #[ORM\Column]
    #[Assert\NotNull()]
    #[Assert\GreaterThanOrEqual(1)]
    #[Assert\LessThanOrEqual(50)]
    private ?int $ball3;

    #[ORM\Column]
    #[Assert\NotNull()]
    #[Assert\GreaterThanOrEqual(1)]
    #[Assert\LessThanOrEqual(50)]
    private ?int $ball4;

    #[ORM\Column]
    #[Assert\NotNull()]
    #[Assert\GreaterThanOrEqual(1)]
    #[Assert\LessThanOrEqual(50)]
    private ?int $ball5;

    #[ORM\Column]
    #[Assert\NotNull()]
    #[Assert\GreaterThanOrEqual(1)]
    #[Assert\LessThanOrEqual(12)]
    private ?int $star1;

    #[ORM\Column]
    #[Assert\NotNull()]
    #[Assert\GreaterThanOrEqual(1)]
    #[Assert\LessThanOrEqual(12)]
    private ?int $star2;

    #[ORM\Column]
    #[Assert\NotBlank]
    private ?string $ascendingWinningBalls;

    #[ORM\Column]
    #[Assert\NotBlank]
    private ?string $ascendingWinningStars;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank1InFrance;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank1InEurope;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $rankReport1;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank2InFrance;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank2InEurope;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $rankReport2;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank3InFrance;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank3InEurope;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $rankReport3;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank4InFrance;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank4InEurope;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $rankReport4;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank5InFrance;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank5InEurope;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $rankReport5;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank6InFrance;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank6InEurope;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $rankReport6;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank7InFrance;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank7InEurope;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $rankReport7;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank8InFrance;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank8InEurope;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $rankReport8;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank9InFrance;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank9InEurope;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $rankReport9;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank10InFrance;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank10InEurope;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $rankReport10;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank11InFrance;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank11InEurope;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $rankReport11;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank12InFrance;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank12InEurope;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $rankReport12;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank13InFrance;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $numberOfWinnerInRank13InEurope;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $rankReport13;

    public function getBallsArray(): array
    {
        $ballsArray = [$this->ball1, $this->ball2, $this->ball3, $this->ball4, $this->ball5];
        return $ballsArray;
    }

    public function getStarsArray(): array
    {
        $starsArray = [$this->star1, $this->star2];
        return $starsArray;
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

    public function getDrawDate()
    {
        return $this->drawDate;
    }

    public function setDrawDate($drawDate): self
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

    public function getStar1(): ?int
    {
        return $this->star1;
    }

    public function setStar1(int $star1): self
    {
        $this->star1 = $star1;

        return $this;
    }

    public function getStar2(): ?int
    {
        return $this->star2;
    }

    public function setStar2(int $star2): self
    {
        $this->star2 = $star2;

        return $this;
    }

    public function getAscendingWinningBalls(): ?string
    {
        return $this->ascendingWinningBalls;
    }

    public function setAscendingWinningBalls(string $ascendingWinningBalls): self
    {
        $this->ascendingWinningBalls = $ascendingWinningBalls;

        return $this;
    }

    public function getAscendingWinningStars(): ?string
    {
        return $this->ascendingWinningStars;
    }

    public function setAscendingWinningStars(string $ascendingWinningStars): self
    {
        $this->ascendingWinningStars = $ascendingWinningStars;

        return $this;
    }

    public function getNumberOfWinnerInRank1InFrance(): ?int
    {
        return $this->numberOfWinnerInRank1InFrance;
    }

    public function setNumberOfWinnerInRank1InFrance(int $numberOfWinnerInRank1InFrance): self
    {
        $this->numberOfWinnerInRank1InFrance = $numberOfWinnerInRank1InFrance;

        return $this;
    }

    public function getNumberOfWinnerInRank1InEurope(): ?int
    {
        return $this->numberOfWinnerInRank1InEurope;
    }

    public function setNumberOfWinnerInRank1InEurope(int $numberOfWinnerInRank1InEurope): self
    {
        $this->numberOfWinnerInRank1InEurope = $numberOfWinnerInRank1InEurope;

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

    public function getNumberOfWinnerInRank2InFrance(): ?int
    {
        return $this->numberOfWinnerInRank2InFrance;
    }

    public function setNumberOfWinnerInRank2InFrance(int $numberOfWinnerInRank2InFrance): self
    {
        $this->numberOfWinnerInRank2InFrance = $numberOfWinnerInRank2InFrance;

        return $this;
    }

    public function getNumberOfWinnerInRank2InEurope(): ?int
    {
        return $this->numberOfWinnerInRank2InEurope;
    }

    public function setNumberOfWinnerInRank2InEurope(int $numberOfWinnerInRank2InEurope): self
    {
        $this->numberOfWinnerInRank2InEurope = $numberOfWinnerInRank2InEurope;

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

    public function getNumberOfWinnerInRank3InFrance(): ?int
    {
        return $this->numberOfWinnerInRank3InFrance;
    }

    public function setNumberOfWinnerInRank3InFrance(int $numberOfWinnerInRank3InFrance): self
    {
        $this->numberOfWinnerInRank3InFrance = $numberOfWinnerInRank3InFrance;

        return $this;
    }

    public function getNumberOfWinnerInRank3InEurope(): ?int
    {
        return $this->numberOfWinnerInRank3InEurope;
    }

    public function setNumberOfWinnerInRank3InEurope(int $numberOfWinnerInRank3InEurope): self
    {
        $this->numberOfWinnerInRank3InEurope = $numberOfWinnerInRank3InEurope;

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

    public function getNumberOfWinnerInRank4InFrance(): ?int
    {
        return $this->numberOfWinnerInRank4InFrance;
    }

    public function setNumberOfWinnerInRank4InFrance(int $numberOfWinnerInRank4InFrance): self
    {
        $this->numberOfWinnerInRank4InFrance = $numberOfWinnerInRank4InFrance;

        return $this;
    }

    public function getNumberOfWinnerInRank4InEurope(): ?int
    {
        return $this->numberOfWinnerInRank4InEurope;
    }

    public function setNumberOfWinnerInRank4InEurope(int $numberOfWinnerInRank4InEurope): self
    {
        $this->numberOfWinnerInRank4InEurope = $numberOfWinnerInRank4InEurope;

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

    public function getNumberOfWinnerInRank5InFrance(): ?int
    {
        return $this->numberOfWinnerInRank5InFrance;
    }

    public function setNumberOfWinnerInRank5InFrance(int $numberOfWinnerInRank5InFrance): self
    {
        $this->numberOfWinnerInRank5InFrance = $numberOfWinnerInRank5InFrance;

        return $this;
    }

    public function getNumberOfWinnerInRank5InEurope(): ?int
    {
        return $this->numberOfWinnerInRank5InEurope;
    }

    public function setNumberOfWinnerInRank5InEurope(int $numberOfWinnerInRank5InEurope): self
    {
        $this->numberOfWinnerInRank5InEurope = $numberOfWinnerInRank5InEurope;

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

    public function getNumberOfWinnerInRank6InFrance(): ?int
    {
        return $this->numberOfWinnerInRank6InFrance;
    }

    public function setNumberOfWinnerInRank6InFrance(int $numberOfWinnerInRank6InFrance): self
    {
        $this->numberOfWinnerInRank6InFrance = $numberOfWinnerInRank6InFrance;

        return $this;
    }

    public function getNumberOfWinnerInRank6InEurope(): ?int
    {
        return $this->numberOfWinnerInRank6InEurope;
    }

    public function setNumberOfWinnerInRank6InEurope(int $numberOfWinnerInRank6InEurope): self
    {
        $this->numberOfWinnerInRank6InEurope = $numberOfWinnerInRank6InEurope;

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

    public function getNumberOfWinnerInRank7InFrance(): ?int
    {
        return $this->numberOfWinnerInRank7InFrance;
    }

    public function setNumberOfWinnerInRank7InFrance(int $numberOfWinnerInRank7InFrance): self
    {
        $this->numberOfWinnerInRank7InFrance = $numberOfWinnerInRank7InFrance;

        return $this;
    }

    public function getNumberOfWinnerInRank7InEurope(): ?int
    {
        return $this->numberOfWinnerInRank7InEurope;
    }

    public function setNumberOfWinnerInRank7InEurope(int $numberOfWinnerInRank7InEurope): self
    {
        $this->numberOfWinnerInRank7InEurope = $numberOfWinnerInRank7InEurope;

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

    public function getNumberOfWinnerInRank8InFrance(): ?int
    {
        return $this->numberOfWinnerInRank8InFrance;
    }

    public function setNumberOfWinnerInRank8InFrance(int $numberOfWinnerInRank8InFrance): self
    {
        $this->numberOfWinnerInRank8InFrance = $numberOfWinnerInRank8InFrance;

        return $this;
    }

    public function getNumberOfWinnerInRank8InEurope(): ?int
    {
        return $this->numberOfWinnerInRank8InEurope;
    }

    public function setNumberOfWinnerInRank8InEurope(int $numberOfWinnerInRank8InEurope): self
    {
        $this->numberOfWinnerInRank8InEurope = $numberOfWinnerInRank8InEurope;

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

    public function getNumberOfWinnerInRank9InFrance(): ?int
    {
        return $this->numberOfWinnerInRank9InFrance;
    }

    public function setNumberOfWinnerInRank9InFrance(int $numberOfWinnerInRank9InFrance): self
    {
        $this->numberOfWinnerInRank9InFrance = $numberOfWinnerInRank9InFrance;

        return $this;
    }

    public function getNumberOfWinnerInRank9InEurope(): ?int
    {
        return $this->numberOfWinnerInRank9InEurope;
    }

    public function setNumberOfWinnerInRank9InEurope(int $numberOfWinnerInRank9InEurope): self
    {
        $this->numberOfWinnerInRank9InEurope = $numberOfWinnerInRank9InEurope;

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

    public function getNumberOfWinnerInRank10InFrance(): ?int
    {
        return $this->numberOfWinnerInRank10InFrance;
    }

    public function setNumberOfWinnerInRank10InFrance(int $numberOfWinnerInRank10InFrance): self
    {
        $this->numberOfWinnerInRank10InFrance = $numberOfWinnerInRank10InFrance;

        return $this;
    }

    public function getNumberOfWinnerInRank10InEurope(): ?int
    {
        return $this->numberOfWinnerInRank10InEurope;
    }

    public function setNumberOfWinnerInRank10InEurope(int $numberOfWinnerInRank10InEurope): self
    {
        $this->numberOfWinnerInRank10InEurope = $numberOfWinnerInRank10InEurope;

        return $this;
    }

    public function getRankReport10(): ?int
    {
        return $this->rankReport10;
    }

    public function setRankReport10(int $rankReport10): self
    {
        $this->rankReport10 = $rankReport10;

        return $this;
    }

    public function getNumberOfWinnerInRank11InFrance(): ?int
    {
        return $this->numberOfWinnerInRank11InFrance;
    }

    public function setNumberOfWinnerInRank11InFrance(int $numberOfWinnerInRank11InFrance): self
    {
        $this->numberOfWinnerInRank11InFrance = $numberOfWinnerInRank11InFrance;

        return $this;
    }

    public function getNumberOfWinnerInRank11InEurope(): ?int
    {
        return $this->numberOfWinnerInRank11InEurope;
    }

    public function setNumberOfWinnerInRank11InEurope(int $numberOfWinnerInRank11InEurope): self
    {
        $this->numberOfWinnerInRank11InEurope = $numberOfWinnerInRank11InEurope;

        return $this;
    }

    public function getRankReport11(): ?int
    {
        return $this->rankReport11;
    }

    public function setRankReport11(int $rankReport11): self
    {
        $this->rankReport11 = $rankReport11;

        return $this;
    }

    public function getNumberOfWinnerInRank12InFrance(): ?int
    {
        return $this->numberOfWinnerInRank12InFrance;
    }

    public function setNumberOfWinnerInRank12InFrance(int $numberOfWinnerInRank12InFrance): self
    {
        $this->numberOfWinnerInRank12InFrance = $numberOfWinnerInRank12InFrance;

        return $this;
    }

    public function getNumberOfWinnerInRank12InEurope(): ?int
    {
        return $this->numberOfWinnerInRank12InEurope;
    }

    public function setNumberOfWinnerInRank12InEurope(int $numberOfWinnerInRank12InEurope): self
    {
        $this->numberOfWinnerInRank12InEurope = $numberOfWinnerInRank12InEurope;

        return $this;
    }

    public function getRankReport12(): ?int
    {
        return $this->rankReport12;
    }

    public function setRankReport12(int $rankReport12): self
    {
        $this->rankReport12 = $rankReport12;

        return $this;
    }

    public function getNumberOfWinnerInRank13InFrance(): ?int
    {
        return $this->numberOfWinnerInRank13InFrance;
    }

    public function setNumberOfWinnerInRank13InFrance(int $numberOfWinnerInRank13InFrance): self
    {
        $this->numberOfWinnerInRank13InFrance = $numberOfWinnerInRank13InFrance;

        return $this;
    }

    public function getNumberOfWinnerInRank13InEurope(): ?int
    {
        return $this->numberOfWinnerInRank13InEurope;
    }

    public function setNumberOfWinnerInRank13InEurope(int $numberOfWinnerInRank13InEurope): self
    {
        $this->numberOfWinnerInRank13InEurope = $numberOfWinnerInRank13InEurope;

        return $this;
    }

    public function getRankReport13(): ?int
    {
        return $this->rankReport13;
    }

    public function setRankReport13(int $rankReport13): self
    {
        $this->rankReport13 = $rankReport13;

        return $this;
    }
}
