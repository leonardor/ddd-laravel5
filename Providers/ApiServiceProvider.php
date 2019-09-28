<?php

declare(strict_types=1);

namespace Demo\Providers;

use Illuminate\Support\ServiceProvider;

class ApiServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }

    public function register()
    {
        $this->app->register('Demo\Providers\Api\PageServiceProvider');
    }
}