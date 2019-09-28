<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Contracts;

use Demo\Api\Domain\Contracts\EntityInterface;

interface RepositoryInterface
{
    public function findById(int $id): EntityInterface;

    public function findByCategoryId(
        int $categoryId,
        int $offset,
        int $limit,
        string $sortField,
        string $sortOrder
    ): EntityInterface;

    public function countByCategoryId(int $categoryId): int;

    public function create(EntityInterface $entity): EntityInterface;

    public function update(EntityInterface $entity): EntityInterface;

    public function deleteById(int $id): EntityInterface;
}