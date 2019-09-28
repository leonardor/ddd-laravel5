<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Services;

use Demo\Api\Domain\Contracts\TransformerInterface;
use Demo\Api\Domain\Contracts\Request\ValidatorInterface;
use Demo\Api\Domain\Contracts\RequestInterface;
use Demo\Api\Domain\Contracts\ValueObjectInterface;
use Demo\Api\Domain\Contracts\RepositoryInterface;

class BaseValueObjectService extends AbstractValueObjectService
{
    /**
     * @var ?TransformerInterface
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

    public function execute(RequestInterface $request): ValueObjectInterface
    {
    }

    public function countByCategoryId(RequestInterface $request): int
    {
        return $this->repository->countByCategoryId($request->category_id);
    }
}
