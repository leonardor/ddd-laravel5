<?php

declare(strict_types=1);

namespace Demo\Api\Application\Responses;

class PageAggregate extends AbstractAggregateResponse
{
    /**
     * @var int
     */
    public $total;

    /**
     * @var int
     */
    public $count;

    /**
     * @var PageCollection
     */
    public $items;
}
