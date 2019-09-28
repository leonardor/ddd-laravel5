<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Requests;

class CountPagesByCategoryId extends AbstractRequest
{
    /**
     * @var int
     */
    public $category_id;
}