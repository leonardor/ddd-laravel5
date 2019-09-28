<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Contracts\Response;

use Demo\Api\Domain\Contracts\ResponseInterface;
use Demo\Api\Domain\Contracts\EntityInterface;

interface AssemblerInterface
{
    public function assemble(EntityInterface $entity): ResponseInterface;
}