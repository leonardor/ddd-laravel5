<?php

declare(strict_types=1);

namespace Demo\Api\Application\Commands;

class UpdatePageById extends AbstractCommand
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $title;

    /**
     * @var ?string
     */
    public $description;

    /**
     * @var string
     */
    public $type = 'page';

    /**
     * @var int
     */
    public $category_id;

    /**
     * @var ?\DateTime
     */
    public $date;

    /**
     * @var ?\DateTime
     */
    public $update;

    /**
     * @var bool
     */
    public $is_visible;
}