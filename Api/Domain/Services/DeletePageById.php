<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Services;

use Demo\Api\Domain\{
    Contracts\ResponseInterface,
    Contracts\RequestInterface,
    Exceptions\InvalidRequestArgumentException,
    Entities,
    Responses\Assemblers
};

class DeletePageById extends AbstractResponseService
{
    public function execute(RequestInterface $request): ResponseInterface
    {
        if ($this->validator && !$this->validator->validate($request)) {
            throw new InvalidRequestArgumentException($this->validator->getErrors()->first(), 400);
        }
    
        /**
         * @var Entities\Page
         */
        $entity = $this->repository->deleteById($request->id);

        return resolve(Assemblers\Page::class)->assemble($entity);
    }
}
