<?php

declare(strict_types=1);

namespace Demo\Api\Application\Usecases;

use Demo\Api\Application\Contracts\ValueObjectInterface;
use Demo\Api\Application\Contracts\CommandInterface;
use Demo\Api\Application\ValueObjects;
use Demo\Api\Application\Exceptions\InvalidCommandArgument;

class CountPagesByCategoryId extends AbstractValueObjectUsecase
{
    public function execute(CommandInterface $command): ValueObjectInterface
    {
        if ($this->validator && !$this->validator->validate($command)) {
            throw new InvalidCommandArgument($this->validator->getErrors()->first(), 400);
        }

        $request = $this->transformer->transform($command);

        $response = $this->service->execute($request);

        return new ValueObjects\Count($response->getValue());
    }
}