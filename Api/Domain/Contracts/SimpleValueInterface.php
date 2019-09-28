<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Contracts;

interface SimpleValueInterface
{
    public function getValue(): ?string;
}