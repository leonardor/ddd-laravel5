<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Responses\Assemblers;

use Demo\Api\Domain\Contracts\ResponseInterface;
use Demo\Api\Domain\Contracts\EntityInterface;

use Demo\Api\Domain\Responses;

class Page extends AbstractAssembler
{
    public function assemble(EntityInterface $entity): ResponseInterface
    {
        $response = new Responses\Page();

        $response->id = $entity->getId();
        $response->title = $entity->getTitle();
        $response->description = $entity->getDescription();
        $response->type = $entity->getType()->getValue();
        $response->is_visible = $entity->isVisible();
        $response->category_id = $entity->getCategoryId();
        $response->date = !empty($entity->getDate()) ? $entity->getDate()->format('Y-m-d H:i:s') : null;
        $response->update = !empty($entity->getUpdate()) ? $entity->getUpdate()->format ('Y-m-d H:i:s') : null;

        return $response;
    }
}