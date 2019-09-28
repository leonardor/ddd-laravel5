<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Contracts\Repository;

use Demo\Api\Domain\Contracts\EntityInterface;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface AssemblerInterface
{
    public function assemble(Model $model): EntityInterface;

    public function assembleCollection(Collection $collection): EntityInterface;

    public static function verifyDate(?string $date): bool;
}