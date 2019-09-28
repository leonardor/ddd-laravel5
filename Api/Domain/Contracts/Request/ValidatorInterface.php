<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Contracts\Request;

use Demo\Api\Domain\Contracts\RequestInterface;

use \Illuminate\Support\MessageBag;

interface ValidatorInterface
{
    public function validate(RequestInterface $request): bool;

    public function getErrors(): MessageBag;
}