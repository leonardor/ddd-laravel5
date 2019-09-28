<?php

declare(strict_types=1);

namespace Demo\Api\Application\Commands\Transformers;

use Demo\Api\Application\Contracts\CommandInterface;

use Demo\Api\Domain\Contracts\RequestInterface;
use Demo\Api\Domain\Requests;

class CreatePage extends AbstractTransformer
{
    public function transform(CommandInterface $command): RequestInterface
    {
        $request = new Requests\CreatePage();
        $request->title = $command->title ?? null;
        $request->description = $command->description ?? null;
        $request->type = $command->type ?? null;
        $request->is_visible = $command->is_visible ?? null;
        $request->category_id = $command->category_id ?? null;
        $request->date = static::verifyDate($command->date) ? (new \DateTime($command->date))->format('Y-m-d H:i:s') : null;
        $request->update = static::verifyDate($command->update) ? (new \DateTime($command->update))->format('Y-m-d H:i:s') : null;

        return $request;
    }
}