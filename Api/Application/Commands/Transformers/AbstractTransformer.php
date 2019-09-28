<?php

declare(strict_types=1);

namespace Demo\Api\Application\Commands\Transformers;

use Demo\Api\Application\Contracts\Command\TransformerInterface;
use Demo\Api\Application\Contracts\CommandInterface;

use Demo\Api\Domain\Contracts\RequestInterface;

abstract class AbstractTransformer implements TransformerInterface
{
    abstract public function transform(CommandInterface $command): RequestInteface;

    public static function verifyDate(?string $date): bool
    {
        return !is_null($date) && checkdate(
            (int)(new \DateTime($date))->format('m'),
            (int)(new \DateTime($date))->format('d'),
            (int)(new \DateTime($date))->format('Y')
        );
    }
}