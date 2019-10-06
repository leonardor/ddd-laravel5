<?php

declare(strict_types=1);

namespace Demo\Api\Application\Commands\Validators;

use Demo\Api\Application\{
    Contracts\Command\ValidatorInterface,
    Contracts\CommandInterface
};

use \Illuminate\{
    Validation\Factory as ValidatorFactory,
    Validation\Validator,
    Support\MessageBag
};

abstract class AbstractValidator implements ValidatorInterface
{
    /**
     * @var ValidatorFactory
     */
    protected $validatorFactory;

    /**
     * @var Validator
     */
    protected $validator;

    public function __construct(ValidatorFactory $validatorFactory) {
        $this->validatorFactory = $validatorFactory;
    }

    abstract public function validate(CommandInterface $command): bool;

    public function getErrors(): MessageBag
    {
        return $this->validator->errors();
    }
}