<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Responses\Assemblers;

use Demo\Api\Domain\Contracts\Response\AssemblerInterface;
use Demo\Api\Domain\Contracts\ResponseInterface;
use Demo\Api\Domain\Contracts\EntityInterface;

abstract class AbstractAssembler implements AssemblerInterface
{
    abstract public function assemble(EntityInterface $entity): ResponseInterface;
}