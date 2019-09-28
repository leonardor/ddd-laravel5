<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Contracts;

interface RequestInterface
{
    public function all(): array;
}