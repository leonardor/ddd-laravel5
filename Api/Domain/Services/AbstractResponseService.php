<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Services;

use Demo\Api\Domain\Contracts\ResponseInterface;
use Demo\Api\Domain\Contracts\RequestInterface;
use Demo\Api\Domain\Contracts\Response\ServiceInterface;

abstract class AbstractResponseService implements ServiceInterface
{
    abstract public function execute(RequestInterface $request): ResponseInterface;
}