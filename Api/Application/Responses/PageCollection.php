<?php

declare(strict_types=1);

namespace Demo\Api\Application\Responses;

class PageCollection extends AbstractCollectionResponse
{
    public function getType(): string
    {
        return Page::class;
    }
}
