<?php

namespace App\Twig\Components;

use App\Repository\DrawEuromillionsRepository;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('all_draws_euromillions')]
final class AllDrawsEuromillionsComponent
{
    public function __construct(private readonly DrawEuromillionsRepository $repository) {
    }

    public function getAllDrawsEuromillions(): array
    {
        return $this->repository->findAll();
    }
}
