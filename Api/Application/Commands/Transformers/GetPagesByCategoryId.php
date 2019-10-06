<?php

declare(strict_types=1);

namespace Demo\Api\Application\Commands\Transformers;

use Demo\Api\Application\Contracts\CommandInterface;

use Demo\Api\Domain\{
    Contracts\RequestInterface,
    Requests
};

class GetPagesByCategoryId extends AbstractTransformer
{
    public function transform(CommandInterface $command): RequestInterface
    {
        $request = new Requests\GetPagesByCategoryId();
        $request->category_id = $request->category_id ?? null;
        $request->offset = $request->offset ?? null;
        $request->limit = $request->limit ?? null;
        $request->sort_field = $request->sort_field ?? null;
        $request->sort_order = $request->sort_order ?? null;

        return $request;
    }
}