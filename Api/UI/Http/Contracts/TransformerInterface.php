<?php

declare(strict_types=1);

namespace Demo\Api\UI\Http\Contracts;

use Demo\Api\Application\Contracts\RequestInterface;

use Illuminate\Http\Request;

interface TransformerInterface
{
    public function transform(Request $request): RequestInterface;
}