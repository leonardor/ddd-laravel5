<?php

declare(strict_types=1);

namespace Demo\Api\UI\Http\Requests\Transformers;

use Demo\Api\UI\Http\Contracts\Request\TransformerInterface;

use Demo\Api\Application\Contracts\CommandInterface;

use Illuminate\Http\Request;

abstract class AbstractTransformer implements TransformerInterface
{
    abstract public function transform(Request $request): CommandInterface;
}