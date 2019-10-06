<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Services;

use Demo\Api\Domain\{
    Contracts\RequestInterface,
    Contracts\ResponseInterface,
    Exceptions\InvalidRequestArgumentException,
    Entities,
    Responses\Assemblers
};

class GetPagesByCategoryId extends AbstractResponseService
{
    public function execute(RequestInterface $request): ResponseInterface
    {
        if ($this->validator && !$this->validator->validate($request)) {
            throw new InvalidRequestArgumentException($this->validator->getErrors()->first(), 400);
        }

        /**
         * @var Entities\PageCollection
         */
        $collection = $this->repository->findByCategoryId(
            $request->category_id,
            $request->offset,
            $request->limit,
            $request->sort_field,
            $request->sort_order
        );

        return resolve(Assemblers\PageCollection::class)->assemble($collection);
    }
}
