<?php

declare(strict_types=1);

namespace Demo\Api\Application\Contracts\Command;

use Demo\Api\Application\Contracts\CommandInterface;

use \Illuminate\Support\MessageBag;

interface ValidatorInterface
{
    public function validate(CommandInterface $request): bool;

    public function getErrors(): MessageBag;
}