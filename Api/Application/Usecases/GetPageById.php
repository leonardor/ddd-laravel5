<?php

declare(strict_types=1);

namespace Demo\Api\Application\Usecases;

use Demo\Api\Application\{
    Contracts\CommandInterface,
    Contracts\ResponseInterface,
    Exceptions\InvalidCommandArgument,
    Responses\Assemblers
};

use Demo\Api\Domain;

class GetPageById extends AbstractResponseUsecase
{
    public function execute(CommandInterface $command): ResponseInterface
    {
        if ($this->validator && !$this->validator->validate($command)) {
            throw new InvalidCommandArgument($this->validator->getErrors()->first(), 400);
        }

        /**
         * @var Domain\Requests\GetPageById
         */
        $request = $this->transformer->transform($command);

        /**
         * @var Domain\Responses\Page
         */
        $response = $this->service->execute($request);

        return resolve(Assemblers\Page::class)->assemble($response);
    }
}