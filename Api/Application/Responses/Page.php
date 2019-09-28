<?php

declare(strict_types=1);

namespace Demo\Api\Application\Responses;

class Page extends AbstractResponse
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
     * @var bool
     */
    public $is_visible;

    /**
     * @var ?string
     */
    public $description;

    /**
     * @var string
     */
    public $type;

    /**
     * @var int;
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
}
