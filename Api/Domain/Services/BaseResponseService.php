<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Services;

use Demo\Api\Domain\Contracts\TransformerInterface;
use Demo\Api\Domain\Contracts\Request\ValidatorInterface;
use Demo\Api\Domain\Contracts\RequestInterface;
use Demo\Api\Domain\Contracts\ResponseInterface;
use Demo\Api\Domain\Contracts\RepositoryInterface;

class BaseResponseService extends AbstractResponseService
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

    public function execute(RequestInterface $request): ResponseInterface
    {
    }

    public function getById(RequestInterface $request): EntityInterface
    {
        return $this->repository->findById($request->id);
    }

    public function deleteById(RequestInterface $request): EntityInterface
    {
        return $this->repository->deleteById($request->id);
    }

    public function getByCategoryId(RequestInterface $request): EntityInterface
    {
        return $this->repository->findByCategoryId(
            $request->category_id,
            $request->offset,
            $request->limit,
            $request->sort_field,
            $request->sort_order
        );
    }

    public function updateById(EntityInterface $entity): EntityInterface
    {
        return $this->repository->update($entity);
    }

    public function create(EntityInterface $entity): EntityInterface
    {
        return $this->repository->create($entity);
    }
}
