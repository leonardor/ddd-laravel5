<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Requests;

use Demo\Api\Domain\Contracts\RequestInterface;

abstract class AbstractRequest implements RequestInterface
{
    public function all(): array
    {
        return get_object_vars($this);
    }
}