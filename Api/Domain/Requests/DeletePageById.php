<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Requests;

class DeletePageById extends AbstractRequest
{
    /**
     * @var int
     */
    public $id;
}