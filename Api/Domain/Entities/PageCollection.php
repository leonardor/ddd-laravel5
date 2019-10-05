<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Entities;

use Demo\Api\Domain\Entities;

class PageCollection extends AbstractCollectionEntity
{
    public function getType(): string
    {
        return Entities\Page::class;
    }
}