<?php

declare(strict_types=1);

namespace Demo\Api\Application\Commands;

class GetPageById extends AbstractCommand
{
    /**
     * @var int
     */
    public $id;
}