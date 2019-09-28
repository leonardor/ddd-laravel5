<?php

declare(strict_types=1);

namespace Demo\Api\Application\Commands;

class GetPagesByCategoryId extends AbstractCommand
{
    /**
     * @var int
     */
    public $offset;

    /**
     * @var int
     */
    public $limit;

    /**
     * @var string
     */
    public $sort_field;

    /**
     * @var string
     */
    public $sort_order;

    /**
     * @var int
     */
    public $category_id;
}