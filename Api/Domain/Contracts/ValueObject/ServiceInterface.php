<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Contracts\ValueObject;

use Demo\Api\Domain\Contracts\ValueObjectInterface;
use Demo\Api\Domain\Contracts\RequestInterface;

interface ServiceInterface
{
    public function execute(RequestInterface $request): ValueObjectInterface;
}