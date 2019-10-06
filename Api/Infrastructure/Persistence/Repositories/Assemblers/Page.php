<?php

declare(strict_types=1);

namespace Demo\Api\Infrastructure\Persistence\Repositories\Assemblers;

use Demo\Api\Domain\{
    Contracts\EntityInterface,
    Entities,
    ValueObjects
};

use \Illuminate\Database\Eloquent\{
    Model,
    Collection
};

class Page extends AbstractAssembler
{
    public function assemble(Model $model): EntityInterface
    {
        $entity = new Entities\Page(
            (int) $model->getAttribute('id'),
            $model->getAttribute('title'),
            $model->getAttribute('description'),
            new ValueObjects\PageType($model->getAttribute('type')),
            (int) $model->getAttribute('category_id'),
            (bool) $model->getAttribute('visible'),
            static::verifyDate($model->getAttribute('date')) ? new \DateTime($model->getAttribute('date')) : null,
            static::verifyDate($model->getAttribute('update')) ? new \DateTime($model->getAttribute('update')) : null
        );

        return $entity;
    }

    public function assembleCollection(Collection $collection): EntityInterface
    {
        $collectionEntity = new Entities\PageCollection();

        foreach ($collection as $model) {
            $collectionEntity->append($this->assemble($model));
        }

        return $collectionEntity;
    }
}