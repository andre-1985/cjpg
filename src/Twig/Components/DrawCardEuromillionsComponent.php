<?php

namespace App\Twig\Components;

use App\Entity\DrawEuromillions;
use App\Repository\DrawEuromillionsRepository;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('draw_card_euromillions')]
final class DrawCardEuromillionsComponent
{
    public int $id;

    public function __construct(private readonly DrawEuromillionsRepository $repository)
    {
    }

    public function getDrawEuromillions(): DrawEuromillions
    {
        return $this->repository->find($this->id);
    }
}
