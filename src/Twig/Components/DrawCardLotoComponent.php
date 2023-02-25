<?php

namespace App\Twig\Components;

use App\Entity\DrawLoto;
use App\Repository\DrawLotoRepository;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('draw_card_loto')]
final class DrawCardLotoComponent
{
    public int $id;

    public function __construct(public readonly DrawLotoRepository $repository)
    {
    }

    public function getDrawLoto(): DrawLoto
    {
        return $this->repository->find($this->id);
    }
}
