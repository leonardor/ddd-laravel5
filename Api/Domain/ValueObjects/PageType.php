<?php

declare(strict_types=1);

namespace Demo\Api\Domain\ValueObjects;

use Demo\Api\Domain\{
    Contracts\ValueObjectInterface,
    Exceptions\InvalidPageTypeException
};

class PageType implements ValueObjectInterface
{
    private const ALLOWED_VALUES = [
        'page',
        'post'
    ];

    /**
     * @var string
     */
    private $value;

    public function __construct(?string $value)
    {
        if (!empty($value) && !in_array($value, static::ALLOWED_VALUES)) {
            throw new InvalidPageTypeException(sprintf('Invalid page type %s', $value));
        }

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}