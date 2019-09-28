<?php

declare(strict_types=1);

namespace Demo\Api\Application\Contracts\ValueObject;

use Demo\Api\Application\Contracts\CommandInterface;
use Demo\Api\Application\Contracts\ValueObjectInterface;

interface UsecaseInterface
{
    public function execute(CommandInterface $command): ValueObjectInterface;
}