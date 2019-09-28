<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Contracts\Request;

use Demo\Api\Domain\Contracts\EntityInterface;
use Demo\Api\Domain\Contracts\RequestInterface;

interface TransformerInterface
{
    public function transform(RequestInterface $request): EntityInterface;
}