<?php

declare(strict_types=1);

namespace Demo\Api\Application\Contracts\Response;

use Demo\Api\Application\{
    Contracts\ResponseInterface as ApplicationResponseInterface,
    Contracts\ValueObjectInterface
};

use Demo\Api\Domain\Contracts\ResponseInterface as DomainResponseInterface;

interface AggregateAssemblerInterface
{
    public function assemble(
        DomainResponseInterface $response,
        ValueObjectInterface $total
    ): ApplicationResponseInterface;
}