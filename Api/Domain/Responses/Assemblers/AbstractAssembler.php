<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Responses\Assemblers;

use Demo\Api\Domain\{
    Contracts\Response\AssemblerInterface,
    Contracts\ResponseInterface,
    Contracts\EntityInterface
};

abstract class AbstractAssembler implements AssemblerInterface
{
    abstract public function assemble(EntityInterface $entity): ResponseInterface;
}