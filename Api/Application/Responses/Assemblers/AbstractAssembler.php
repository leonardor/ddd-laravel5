<?php

declare(strict_types=1);

namespace Demo\Api\Application\Responses\Assemblers;

use Demo\Api\Application\Contracts\Response\AssemblerInterface;
use Demo\Api\Application\Contracts\ResponseInterface as ApplicationResponseInterface;

use Demo\Api\Domain\Contracts\ResponseInterface as DomainResponseInterface;

abstract class AbstractAssembler implements AssemblerInterface
{
    abstract public function assemble(
        DomainResponseInterface $response
    ): ApplicationResponseInterface;
}