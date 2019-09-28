<?php

declare(strict_types=1);

namespace Demo\Api\Domain\ValueObjects;

use Demo\Api\Domain\Contracts\SimpleValueInterface;
use Demo\Api\Domain\Exceptions\InvalidValueException;

abstract class AbstractSimpleValue implements SimpleValueInterface
{
    protected const ALLOWED_VALUES = [];
    /**
     * @var string
     */
    protected $value;

    public function __construct(?string $value)
    {
        if (!in_array($value, static::ALLOWED_VALUES)) {
            throw new InvalidValueException();
        }

        $this->value = $value;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function __toString()
    {
        return $this->value;
    }
}