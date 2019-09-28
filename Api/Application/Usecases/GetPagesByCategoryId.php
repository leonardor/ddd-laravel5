<?php

declare(strict_types=1);

namespace Demo\Api\Application\Usecases;

use Demo\Api\Application\Contracts\ResponseInterface;
use Demo\Api\Application\Contracts\CommandInterface;
use Demo\Api\Application\Exceptions\InvalidCommandArgument;
use Demo\Api\Application\Responses\Assemblers;

class GetPagesByCategoryId extends AbstractAggregatedResponseUsecase
{
    public function execute(CommandInterface $command): ResponseInterface
    {
        if ($this->validator && !$this->validator->validate($command)) {
            throw new InvalidCommandArgument($this->validator->getErrors()->first(), 400);
        }

        $total = resolve(CountPagesByCategoryId::class)->execute($command);

        $request = $this->transformer->transform($command);

        $response = $this->service->execute($request);

        return resolve(Assemblers\PageAggregate::class)
                    ->assemble($response, $total->getValue());
    }
}