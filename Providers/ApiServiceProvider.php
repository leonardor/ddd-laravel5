<?php

declare(strict_types=1);

namespace Demo\Providers;

use \Illuminate\Support\ServiceProvider;

use Demo\Providers\Api;

class ApiServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->register(Api\PageServiceProvider::class);
    }
}