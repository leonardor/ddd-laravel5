<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Contracts\Response;

use Demo\Api\Domain\{
    Contracts\ResponseInterface,
    Contracts\RequestInterface
};

interface ServiceInterface
{
    public function execute(RequestInterface $request): ResponseInterface;
}