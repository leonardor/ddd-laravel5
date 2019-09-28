<?php

declare(strict_types=1);

namespace Demo\Api\Application\Commands;

class DeletePageById extends AbstractCommand
{
    /**
     * @var int
     */
    public $id;
}