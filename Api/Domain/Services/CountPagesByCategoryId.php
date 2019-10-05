<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Services;

use Demo\Api\Domain\Contracts\RequestInterface;
use Demo\Api\Domain\Contracts\ValueObjectInterface;
use Demo\Api\Domain\ValueObjects;
use Demo\Api\Domain\Exceptions\InvalidRequestArgumentException;

class CountPagesByCategoryId extends AbstractValueObjectService
{
    public function execute(RequestInterface $request): ValueObjectInterface
    {
        if ($this->validator && !$this->validator->validate($request)) {
            throw new InvalidRequestArgumentException($this->validator->getErrors()->first(), 400);
        }

        /**
         * @var int
         */
        $total = $this->repository->countByCategoryId($request->category_id);

        return new ValueObjects\Count($total);
    }
}
