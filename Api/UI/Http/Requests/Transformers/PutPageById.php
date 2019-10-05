<?php

declare(strict_types=1);

namespace Demo\Api\UI\Http\Requests\Transformers;

use Demo\Api\Application\Contracts\CommandInterface;

use Demo\Api\Application\Commands;

use Illuminate\Http\Request;

class PutPageById extends AbstractTransformer
{
    public function transform(Request $request): CommandInterface
    {
        $command = new Commands\UpdatePageById();
        $command->id = $request->post('id', 0);
        $command->title = $request->post('title', null);
        $command->description = $request->post('description', null);
        $command->category_id = (int)$request->post('category_id', 0);
        $command->type = $request->post('type', 'page');
        $command->is_visible = (bool)$request->post('visible', false);
        $command->date = $request->post('date', date('Y-m-d H:i:s'));
        $command->update = date('Y-m-d H:i:s');

        return $command;
    }
}