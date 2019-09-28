<?php

declare(strict_types=1);

namespace Demo\Api\Application\ValueObjects;

use Demo\Api\Application\Contracts\ValueObjectInterface;

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