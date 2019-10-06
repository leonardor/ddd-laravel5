<?php

declare(strict_types=1);

namespace Demo\Api\Infrastructure\Persistence\Repositories\Eloquent;

use \Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $primaryKey = 'id';
    
    protected $table = 'pages';

    protected $fillable = [
        'id',
        'title',
        'description',
        'type',
        'visible',
        'category_id',
        'date',
        'update'
    ];

    /**
     * @var bool
     */
    public $timestamps = false;
}
