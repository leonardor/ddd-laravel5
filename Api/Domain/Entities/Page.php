<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Entities;

use Demo\Api\Domain\Entities\AbstractEntity;

use Demo\Api\Domain\ValueObjects;

class Page extends AbstractEntity
{
    public function __construct(
        int $id,
        string $title,
        ?string $description,
        ValueObjects\PageType $type,
        int $categoryId,
        bool $isVisible,
        ?\DateTime $date,
        ?\DateTime $update
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->type = $type;
        $this->categoryId = $categoryId;
        $this->isVisible = $isVisible;
        $this->date = $date;
        $this->update = $update;
    }
}