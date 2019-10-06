<?php

declare(strict_types=1);

namespace Demo\Api\Application\Commands\Transformers;

use Demo\Api\Application\Contracts\CommandInterface;

use Demo\Api\Domain\{
    Contracts\RequestInterface,
    Requests
};

class CountPagesByCategoryId extends AbstractTransformer
{
    public function transform(CommandInterface $command): RequestInterface
    {
        $request = new Requests\CountPagesByCategoryId();
        $request->category_id = $command->category_id ?? null;

        return $request;
    }
}