<?php

declare(strict_types=1);

namespace Demo\Api\Domain\ValueObjects;

use Demo\Api\Domain\Exceptions\InvalidpAGETypeException;

class PageType extends AbstractSimpleValue
{
    protected const ALLOWED_VALUES = [
        'page',
        'post'
    ];

    public function __construct(?string $value)
    {
        if (!empty($value) && !in_array($value, static::ALLOWED_VALUES)) {
            throw new InvalidPageTypeException(sprintf('Invalid page type %s', $value));
        }

        $this->value = $value;
    }
}