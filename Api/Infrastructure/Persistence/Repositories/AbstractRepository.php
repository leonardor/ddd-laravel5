<?php

declare(strict_types=1);

namespace Demo\Api\Infrastructure\Persistence\Repositories;

use Demo\Api\Domain\{
    Contracts\RepositoryInterface,
    Contracts\Repository\AssemblerInterface,
    Contracts\EntityInterface
};

use Demo\Api\Infrastructure\Persistence\{
    Exceptions\ModelNotFoundException,
    Exceptions\ModelException
};

use \Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository implements RepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;
    /**
     * @var AssemblerInterface
     */
    protected $assembler;

    public function __construct(Model $model, AssemblerInterface $assembler)
    {
        $this->model = $model;
        $this->assembler = $assembler;
    }

    public function findById(int $id): EntityInterface
    {
        try {
            $model = $this->model->findOrFail($id);

            return $this->assembler->assemble($model);
        } catch (\Throwable $e) {
            throw new ModelNotFoundException("Model not found", 404, $e);
        }
    }

    public function findByCategoryId(
        int $categoryId,
        int $offset = 0,
        int $limit = 10,
        string $sortField = 'date',
        string $sortOrder = 'desc'
    ): EntityInterface {
        $models = $this->model->where('category_id', '=', $categoryId)
                            ->where('visible', '=', 1)
                            ->offset($offset)
                            ->limit($limit)
                            ->orderBy($sortField, $sortOrder)
                            ->get();

        return $this->assembler->assembleCollection($models);
    }

    public function countByCategoryId(int $categoryId): int
    {
        return $this->model->where('category_id', '=', $categoryId)
                        ->where('visible', '=', 1)
                        ->count();
    }

    public function create(EntityInterface $entity): EntityInterface
    {
        try {
            $model = $this->model->create($entity->toArray());

            return $this->assembler->assemble($model);
        } catch (\Throwable $e) {
            throw new ModelException("Model not created", 500, $e);
        }
    }

    public function update(EntityInterface $entity): EntityInterface
    {
        try {
            $model = $this->model->findOrFail($entity->getId());
        } catch (\Throwable $e) {
            throw new ModelNotFoundException("Model not found", 404, $e);
        }

        $model->fill($entity->toArray());

        try {
            $model->save();

            $this->model = $model;

            return $this->assembler->assemble($model);
        } catch (\Throwable $e) {
            throw new ModelException($e->getMessage(), 500, $e);
        }
    }

    public function deleteById(int $id): EntityInterface
    {
        try {
            $model = $this->model->findOrFail($id);
        } catch (\Throwable $e) {
            throw new ModelNotFoundException("Model not found", 404, $e);
        }

        try {
            $model->delete();

            $this->model = null;

            return $this->assembler->assemble($model);
        } catch (\Throwable $e) {
            throw new ModelException("Model not deleted", 500, $e);
        }
    }

    public function findOrFail(int $id): Model
    {
        $model = $this->model->findOrFail($id);

        return $model;
    }
}