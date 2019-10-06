<?php

declare(strict_types=1);

namespace Demo\Api\Application\Responses\Assemblers;

use Demo\Api\Application\{
    Contracts\Response\AggregateAssemblerInterface,
    Contracts\ResponseInterface as ApplicationResponseInterface,
    Contracts\ValueObjectInterface
};

use Demo\Api\Domain\Contracts\ResponseInterface as DomainResponseInterface;

abstract class AbstractAggregateAssembler implements AggregateAssemblerInterface
{
    abstract public function assemble(
        DomainResponseInterface $response,
        ValueObjectInterface $total
    ): ApplicationResponseInterface;
}