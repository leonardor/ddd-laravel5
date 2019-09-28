<?php

declare(strict_types=1);

namespace Demo\Api\Application\Contracts\Response;

use Demo\Api\Application\Contracts\CommandInterface;
use Demo\Api\Application\Contracts\ResponseInterface;

interface UsecaseInterface
{
    public function execute(CommandInterface $command): ResponseInterface;
}