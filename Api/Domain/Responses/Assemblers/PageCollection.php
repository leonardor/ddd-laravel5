<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Responses\Assemblers;

use Demo\Api\Domain\Contracts\ResponseInterface;
use Demo\Api\Domain\Contracts\EntityInterface;

use Demo\Api\Domain\Responses;

class PageCollection extends AbstractAssembler
{
    public function assemble(EntityInterface $collection): ResponseInterface
    {
        $response = new Responses\PageCollection();

        foreach ($collection as $entity) {
            $response->append(resolve(Page::class)->assemble($entity));
        }

        return $response;
    }
}