<?php

declare(strict_types=1);

namespace Demo\Api\Application\Contracts\Command;

use Demo\Api\Application\Contracts\CommandInterface;

use Demo\Api\Domain\Contracts\RequestInterface;

interface TransformerInterface
{
    public function transform(CommandInterface $command): RequestInterface;

    public static function verifyDate(?string $date): bool;
}