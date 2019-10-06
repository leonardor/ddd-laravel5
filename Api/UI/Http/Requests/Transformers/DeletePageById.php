<?php

declare(strict_types=1);

namespace Demo\Api\UI\Http\Requests\Transformers;

use Demo\Api\Application\{
    Contracts\CommandInterface,
    Commands
};

use \Illuminate\Http\Request;

class DeletePageById extends AbstractTransformer
{
    public function transform(Request $request): CommandInterface
    {
        $command = new Commands\DeletePageById();
        $command->id = (int)$request->get('id', 0);

        return $command;
    }
}