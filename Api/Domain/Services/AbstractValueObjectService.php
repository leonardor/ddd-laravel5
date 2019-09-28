<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Services;

use Demo\Api\Domain\Contracts\ValueObject\ServiceInterface;
use Demo\Api\Domain\Contracts\RequestInterface;
use Demo\Api\Domain\Contracts\ValueObjectInterface;

abstract class AbstractValueObjectService implements ServiceInterface
{
    abstract public function execute(RequestInterface $request): ValueObjectInterface;
}