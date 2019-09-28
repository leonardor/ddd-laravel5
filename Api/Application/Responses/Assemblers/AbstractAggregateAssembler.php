<?php

declare(strict_types=1);

namespace Demo\Api\Application\Responses;

use Demo\Api\Application\Contracts\Response\AggregateAssemblerInterface;
use Demo\Api\Application\Contracts\ResponseInterface as ApplicationResponseInterface;
use Demo\Api\Application\Contracts\ValueObjectInterface;

use Demo\Api\Domain\Contracts\ResponseInterface as DomainResponseInterface;

abstract class AbstractAggregateAssembler implements AggregateAssemblerInterface
{
    abstract public function assemble(
        DomainResponseInterface $response,
        ValueObjectInterface $total
    ): ApplicationResponseInterface;
}