<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Responses;

class PageCollection extends AbstractCollectionResponse
{
    public function getType(): string
    {
        return Page::class;
    }
}