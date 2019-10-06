<?php

declare(strict_types=1);

namespace Demo\Api\UI\Http\Requests\Transformers;

use Demo\Api\Application\{
    Contracts\CommandInterface,
    Commands
};

use \Illuminate\Http\Request;

class CountPagesByCategoryId extends AbstractTransformer
{
    public function transform(Request $request): CommandInterface
    {
        $command = new Commands\CountPagesByCategoryId();
        $command->category_id = (int)$request->get('category_id', 0);

        return $command;
    }
}