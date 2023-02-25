<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
/*use App\Repository\UserSelectionEuromillionsRepository;
use Doctrine\ORM\Mapping as ORM;*/

//#[ORM\Entity(repositoryClass: UserSelectionEuromillionsRepository::class)]
class UserSelectionEuromillions
{
    /*#[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;*/

    #[Assert\Type('array')]
    #[Assert\Count(
        max: 5,
        maxMessage: 'maximum 5 boules'
    )]
    private array $userBallsSelection = [];

    #[Assert\Type('array')]
    #[Assert\Count(
        max: 2,
        maxMessage: 'maximum 2 étoiles'
    )]
    private array $userStarsSelection = [];

    /*public function getId(): ?int
    {
        return $this->id;
    }*/

    public function getUserBallsSelection(): array
    {
        return $this->userBallsSelection;
    }

    public function setUserBallsSelection(?array $userBallsSelection): self
    {
        $this->userBallsSelection = $userBallsSelection;

        return $this;
    }

    public function getUserStarsSelection(): array
    {
        return $this->userStarsSelection;
    }

    public function setUserStarsSelection(?array $userStarsSelection): self
    {
        $this->userStarsSelection = $userStarsSelection;

        return $this;
    }
}
