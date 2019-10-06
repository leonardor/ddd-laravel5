<?php

declare(strict_types=1);

namespace Demo\Api\UI\Http\Requests\Transformers;

use Demo\Api\Application\{
    Contracts\CommandInterface,
    Commands
};

use \Illuminate\Http\Request;

class GetPagesByCategoryId extends AbstractTransformer
{
    public function transform(Request $request): CommandInterface
    {
        $command = new Commands\GetPagesByCategoryId();
        $command->category_id = (int)$request->get('category_id', 0);
        $command->offset = (int)$request->get('offset', 0);
        $command->limit = (int)$request->get('limit', 0);
        $command->sort_field = strtolower($request->get('sort_field', 'date'));
        $command->sort_order = strtolower($request->get('sort_order', 'desc'));

        return $command;
    }
}