<?php

declare(strict_types=1);

namespace Demo\Api\Application\Responses\Assemblers;

use Demo\Api\Application\Contracts\ResponseInterface as ApplicationResponseInterface;
use Demo\Api\Application\Responses\Assemblers;
use Demo\Api\Application\Responses;
use Demo\Api\Application\Contracts\ValueObjectInterface;

use Demo\Api\Domain\Contracts\ResponseInterface as DomainResponseInterface;

class PageAggregate extends AbstractAggregateAssembler
{
    public function assemble(
        DomainResponseInterface $response,
        ValueObjectInterface $total
    ): ApplicationResponseInterface {
        $response = new  Responses\PageAggregate();

        $response->total = $total;
        $response->items = resolve(Assemblers\PageCollection::class)
                                ->assemble($response);
        $response->count = count($response->items);

        return $response;
    }
}