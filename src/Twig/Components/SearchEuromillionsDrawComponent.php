<?php

namespace App\Twig\Components;

use App\Repository\DrawEuromillionsRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent('search_euromillions_draw')]
final class SearchEuromillionsDrawComponent
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public ?string $query = null;

    public function __construct(private readonly DrawEuromillionsRepository $repository) {
    }

    public function getDrawsEuromillions(): array {
        return $this->repository->findAll($this->query);
    }
}
