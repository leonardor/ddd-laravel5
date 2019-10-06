<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Requests\Validators;

use Demo\Api\Domain\{
    Contracts\Request\ValidatorInterface,
    Contracts\RequestInterface
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

    abstract public function validate(RequestInterface $request): bool;

    public function getErrors(): MessageBag
    {
        return $this->validator->errors();
    }
}