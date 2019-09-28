<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Requests;

class GetPageById extends AbstractRequest
{
    /**
     * @var int
     */
    public $id;
}