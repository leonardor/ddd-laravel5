<?php

declare(strict_types=1);

namespace Demo\Api\Application\Commands;

use Demo\Api\Application\Contracts\CommandInterface;

abstract class AbstractCommand implements CommandInterface
{
    public function all(): array
    {
        return get_object_vars($this);
    }
}