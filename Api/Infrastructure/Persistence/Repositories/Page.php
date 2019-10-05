<?php

declare(strict_types=1);

namespace Demo\Api\Infrastructure\Persistence\Repositories;

use Demo\Api\Domain\Contracts\EntityInterface;

class Page extends AbstractRepository
{
    public function create(EntityInterface $entity): EntityInterface
    {
        try {
            $model = $this->model->create([
                'title' => $entity->getTitle(),
                'description' => $entity->getDescription(),
                'type' => $entity->getType()->getValue(),
                'is_visible' => (int)$entity->isVisible(),
                'category_id' => $entity->getCategoryId(),
                'date' => (is_a($entity->getDate(), "DateTime") ? $entity->getDate()->format('Y-m-d H:i:s') : null),
                'update' => (is_a($entity->getUpdate(), "DateTime") ? $entity->getUpdate()->format('Y-m-d H:i:s') : null)
            ]);
        } catch (\Throwable $e) {
            throw new ModelException($e->getMessage(), 500, $e);
        }

        return $this->assembler->assemble($model);
    }

    public function update(EntityInterface $entity): EntityInterface
    {
        try {
            $model = $this->model->findOrFail($entity->getId());
        } catch (\Throwable $e) {
            throw new ModelNotFoundException("Model not found", 404, $e);
        }

        $model->fill([
            'id' => $entity->getId(),
            'title' => $entity->getTitle(),
            'description' => $entity->getDescription(),
            'type' => $entity->getType()->getValue(),
            'is_visible' => (int)$entity->isVisible(),
            'category_id' => $entity->getCategoryId(),
            'date' => (is_a($entity->getDate(), "DateTime") ? $entity->getDate()->format('Y-m-d H:i:s') : null),
            'update' => (is_a($entity->getUpdate(), "DateTime") ? $entity->getUpdate()->format('Y-m-d H:i:s') : null)
        ]);

        try {
            $model->save();

            $this->model = $model;
        } catch (\Throwable $e) {
            throw new ModelException($e->getMessage(), 500, $e);
        }

        return $this->assembler->assemble($model);
    }
}
