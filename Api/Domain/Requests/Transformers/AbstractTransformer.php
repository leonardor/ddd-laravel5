<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Requests\Transformers;

use Demo\Api\Domain\Contracts\Request\TransformerInterface;
use Demo\Api\Domain\Contracts\EntityInterface;
use Demo\Api\Domain\Contracts\RequestInterface;

abstract class AbstractTransformer implements TransformerInterface
{
    abstract public function transform(RequestInterface $request): EntityInterface;
}