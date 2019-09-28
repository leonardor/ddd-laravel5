<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Services;

use Demo\Api\Domain\Contracts\RequestInterface;
use Demo\Api\Domain\Contracts\ResponseInterface;
use Demo\Api\Domain\Exceptions\InvalidRequestArgumentException;
use Demo\Api\Domain\Entities;
use Demo\Api\Domain\Responses\Assemblers;

class GetPagesByCategoryId extends BaseResponseService
{
    public function execute(RequestInterface $request): ResponseInterface
    {
        if ($this->validator && !$this->validator->validate($request)) {
            throw new InvalidRequestArgumentException($this->validator->getErrors()->first(), 400);
        }

        /**
         * @var Entities\PageCollection
         */
        $collection = parent::getByCategoryId($request);

        return resolve(Assemblers\PageCollection::class)->assemble($collection);
    }
}
