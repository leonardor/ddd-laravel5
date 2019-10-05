<?php

declare(strict_types=1);

namespace Demo\Api\Application\Commands;

class CountPagesByCategoryId extends AbstractCommand
{
    /**
     * @var int
     */
    public $category_id;
}