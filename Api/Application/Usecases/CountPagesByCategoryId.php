<?php

declare(strict_types=1);

namespace Demo\Api\Application\Usecases;

use Demo\Api\Application\Contracts\ValueObjectInterface;
use Demo\Api\Application\Contracts\CommandInterface;
use Demo\Api\Application\ValueObjects;
use Demo\Api\Application\Exceptions\InvalidCommandArgument;

use Demo\Api\Domain;

class CountPagesByCategoryId extends AbstractValueObjectUsecase
{
    public function execute(CommandInterface $command): ValueObjectInterface
    {
        if ($this->validator && !$this->validator->validate($command)) {
            throw new InvalidCommandArgument($this->validator->getErrors()->first(), 400);
        }

        /**
         * @var Domain\Requests\CountPagesByCategoryId
         */
        $request = $this->transformer->transform($command);

        /**
         * @var Domain\ValueObjects\Count
         */
        $response = $this->service->execute($request);

        return new ValueObjects\Count($response->getValue());
    }
}