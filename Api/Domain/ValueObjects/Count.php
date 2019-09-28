<?php

declare(strict_types=1);

namespace Demo\Api\Domain\ValueObjects;

use Demo\Api\Domain\Contracts\ValueObjectInterface;

class Count implements ValueObjectInterface
{
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}