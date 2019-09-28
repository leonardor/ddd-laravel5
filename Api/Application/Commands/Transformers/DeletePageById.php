<?php

declare(strict_types=1);

namespace Demo\Api\Application\Commands\Transformers;

use Demo\Api\Application\Contracts\CommandInterface;

use Demo\Api\Domain\Contracts\RequestInterface;
use Demo\Api\Domain\Requests;

class DeletePageById extends AbstractTransformer
{
    public function transform(CommandInterface $command): RequestInterface
    {
        $request = new Requests\DeletePageById();
        $request->id = $command->id ?? null;

        return $request;
    }
}