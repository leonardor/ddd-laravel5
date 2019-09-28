<?php

declare(strict_types=1);

namespace Demo\Api\Infrastructure\Persistence\Repositories\Eloquent\Assemblers;

use Demo\Api\Domain\Contracts\EntityInterface;
use Demo\Api\Domain\Contracts\Repository\AssemblerInterface;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

abstract class AbstractAssembler implements AssemblerInterface
{
    abstract public function assemble(Model $model): EntityInterface;

    abstract public function assembleCollection(Collection $collection): EntityInterface;

    public static function verifyDate(?string $date): bool
    {
        return !is_null($date) && checkdate(
            (int)(new \DateTime($date))->format('m'),
            (int)(new \DateTime($date))->format('d'),
            (int)(new \DateTime($date))->format('Y')
        );
    }
}