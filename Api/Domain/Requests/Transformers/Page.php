<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Requests\Transformers;

use Demo\Api\Domain\{
    Contracts\EntityInterface,
    Contracts\RequestInterface
};

use Demo\Api\Domain\{
    Entities,
    ValueObjects
};

class Page extends AbstractTransformer
{
    public function transform(RequestInterface $request): EntityInterface
    {
        $entity = new Entities\Page(
            $request->id ?? 0,
            $request->title ?? '',
            $request->description ?? null,
            new ValueObjects\PageType($request->type ?? null),
            $request->category_id ?? 0,
            $request->is_visible ?? false,
            (!empty($request->date) ? new \DateTime($request->date) : null),
            (!empty($request->update) ? new \DateTime($request->update) : null)
        );

        return $entity;
    }
}