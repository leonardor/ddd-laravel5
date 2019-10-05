<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Services;

use Demo\Api\Domain\Contracts\ResponseInterface;
use Demo\Api\Domain\Contracts\RequestInterface;
use Demo\Api\Domain\Exceptions\InvalidRequestArgumentException;
use Demo\Api\Domain\Entities;
use Demo\Api\Domain\Responses\Assemblers;

class CreatePage extends AbstractResponseService
{
    public function execute(RequestInterface $request): ResponseInterface
    {
        if ($this->validator && !$this->validator->validate($request)) {
            throw new InvalidRequestArgumentException($this->validator->getErrors()->first(), 400);
        }

        /**
         * @var Entities\Page
         */
        $entity = $this->transformer->transform($request);

        /**
         * @var Entities\Page
         */
        $entity = $this->repository->create($entity);

        return resolve(Assemblers\Page::class)->assemble($entity);
    }
}
