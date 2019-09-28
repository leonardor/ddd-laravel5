<?php

declare(strict_types=1);

namespace Demo\Api\Application\Contracts\Response;

use Demo\Api\Application\Contracts\ResponseInterface as ApplicationResponseInterface;

use Demo\Api\Domain\Contracts\ResponseInterface as DomainResponseInterface;

interface AssemblerInterface
{
    public function assemble(
        DomainResponseInterface $response
    ): ApplicationResponseInterface;
}