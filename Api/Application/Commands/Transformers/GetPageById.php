<?php

declare(strict_types=1);

namespace Demo\Api\Application\Commands\Transformers;

use Demo\Api\Application\Contracts\CommandInterface;

use Demo\Api\Domain\{
    Contracts\RequestInterface,
    Requests
};

class GetPageById extends AbstractTransformer
{
    public function transform(CommandInterface $command): RequestInterface
    {
        $request = new Requests\GetPageById();
        $request->id = $command->id ?? null;

        return $request;
    }
}