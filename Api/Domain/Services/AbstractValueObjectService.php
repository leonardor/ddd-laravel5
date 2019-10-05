<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Services;

use Demo\Api\Domain\Contracts\ValueObject\ServiceInterface;
use Demo\Api\Domain\Contracts\RequestInterface;
use Demo\Api\Domain\Contracts\ValueObjectInterface;
use Demo\Api\Domain\Contracts\Request\TransformerInterface;
use Demo\Api\Domain\Contracts\Request\ValidatorInterface;
use Demo\Api\Domain\Contracts\RepositoryInterface;

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