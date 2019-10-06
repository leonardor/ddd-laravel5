<?php

declare(strict_types=1);

namespace Demo\Api\Application\Usecases;

use Demo\Api\Application\{
    Contracts\Response\UsecaseInterface,
    Contracts\CommandInterface,
    Contracts\ResponseInterface,
    Contracts\Command\ValidatorInterface,
    Contracts\Command\TransformerInterface
};

use Demo\Api\Domain\Contracts\Response\ServiceInterface;

abstract class AbstractResponseUsecase implements UsecaseInterface
{
    /**
     * @var ServiceInterface
     */
    protected $service;

    /**
     * @var ValidatorInterface
     */
    protected $validator;

    /**
     * @var TransformerInterface
     */
    protected $transformer;

    public function __construct(
        ServiceInterface $service,
        ValidatorInterface $validator,
        TransformerInterface $transformer
    ) {
        $this->service = $service;
        $this->validator = $validator;
        $this->transformer = $transformer;
    }

    abstract public function execute(CommandInterface $command): ResponseInterface;
}
