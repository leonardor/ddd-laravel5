<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Services;

use Demo\Api\Domain\{
    Contracts\ResponseInterface,
    Contracts\RequestInterface,
    Contracts\Response\ServiceInterface,
    Contracts\Request\TransformerInterface,
    Contracts\RepositoryInterface,
    Contracts\Request\ValidatorInterface
};

abstract class AbstractResponseService implements ServiceInterface
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

    abstract public function execute(RequestInterface $request): ResponseInterface;
}