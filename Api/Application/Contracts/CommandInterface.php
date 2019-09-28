<?php

declare(strict_types=1);

namespace Demo\Api\Application\Contracts;

interface CommandInterface
{
    public function all(): array;
}