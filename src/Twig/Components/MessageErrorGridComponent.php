<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('message_error_grid')]
final class MessageErrorGridComponent
{
    public string $message;
}
