<?php

declare(strict_types=1);

namespace Demo\Api\Application\Usecases;

use Demo\Api\Application\Contracts\ResponseInterface;
use Demo\Api\Application\Contracts\CommandInterface;
use Demo\Api\Application\Exceptions\InvalidCommandArgument;
use Demo\Api\Application\Responses\Assemblers;
use Demo\Api\Application\ValueObjects;

use Demo\Api\Domain;

class GetPagesByCategoryId extends AbstractAggregateResponseUsecase
{
    public function execute(CommandInterface $command): ResponseInterface
    {
        if ($this->validator && !$this->validator->validate($command)) {
            throw new InvalidCommandArgument($this->validator->getErrors()->first(), 400);
        }

        /**
         * @var ValueObjects\Count
         */
        $total = resolve(CountPagesByCategoryId::class)->execute($command);

        /**
         * @var Domain\Requests\GetPagesByCategoryId
         */
        $request = $this->transformer->transform($command);

        /**
         * @var Domain\Responses\PageCollection
         */
        $response = $this->service->execute($request);

        return resolve(Assemblers\PageAggregate::class)
                    ->assemble($response, $total->getValue());
    }
}