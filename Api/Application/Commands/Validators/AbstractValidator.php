<?php

declare(strict_types=1);

namespace Demo\Api\Application\Commands\Validators;

use Demo\Api\Application\Contracts\Command\ValidatorInterface;
use Demo\Api\Application\Contracts\CommandInterface;

use \Illuminate\Support\Facades\Validator;
use \Illuminate\Support\MessageBag;

abstract class AbstractValidator implements ValidatorInterface
{
    /**
     * @var Validator
     */
    private $validator;

    abstract public function validate(CommandInterface $command): bool;

    abstract public function getErrors(): MessageBag;
}