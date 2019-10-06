<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Services;

use Demo\Api\Domain\{
    Contracts\ValueObject\ServiceInterface,
    Contracts\RequestInterface,
    Contracts\ValueObjectInterface,
    Contracts\Request\TransformerInterface,
    Contracts\Request\ValidatorInterface,
    Contracts\RepositoryInterface
};

abstract class AbstractValueObjectService implements ServiceInterface
{
    /**
     * @var TransformerInterface|null
     */
    protected $transformer;
    /**
     * @var ValidatorInterface
     */
    protected $validator;
    /**
     * @var RepositoryInterface
     */
    protected $repository;

    public function __construct(
        RepositoryInterface $repository,
        ValidatorInterface $validator,
        ?TransformerInterface $transformer = null
    ) {
        $this->transformer = $transformer;
        $this->repository = $repository;
        $this->validator = $validator;
    }

    abstract public function execute(RequestInterface $request): ValueObjectInterface;
}