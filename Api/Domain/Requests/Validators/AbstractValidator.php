<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Requests\Validators;

use Demo\Api\Domain\Contracts\Request\ValidatorInterface;
use Demo\Api\Domain\Contracts\RequestInterface;

use \Illuminate\Support\Facades\Validator;
use \Illuminate\Support\MessageBag;

abstract class AbstractValidator implements ValidatorInterface
{
    /**
     * @var Validator
     */
    private $validator;

    abstract public function validate(RequestInterface $request): bool;

    abstract public function getErrors(): MessageBag;
}