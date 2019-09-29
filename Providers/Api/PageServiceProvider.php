<?php

declare(strict_types=1);

namespace Demo\Providers\Api;

use Illuminate\Support\ServiceProvider;

class PageServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }

    public function register()
    {
        /* services */
        $this->app
            ->when('Demo\Api\Domain\Services\GetPageById')
            ->needs('Demo\Api\Domain\Contracts\RepositoryInterface')
            ->give('Demo\Api\Infrastructure\Persistence\Repositories\Page');

        $this->app
            ->when('Demo\Api\Domain\Services\GetPageById')
            ->needs('Demo\Api\Domain\Contracts\Request\ValidatorInterface')
            ->give('Demo\Api\Domain\Requests\Validators\GetPageById');

        $this->app
            ->when('Demo\Api\Domain\Services\DeletePageById')
            ->needs('Demo\Api\Domain\Contracts\RepositoryInterface')
            ->give('Demo\Api\Infrastructure\Persistence\Repositories\Page');

        $this->app
            ->when('Demo\Api\Domain\Services\DeletePageById')
            ->needs('Demo\Api\Domain\Contracts\Request\ValidatorInterface')
            ->give('Demo\Api\Domain\Requests\Validators\DeletePageById');

        $this->app
            ->when('Demo\Api\Domain\Services\UpdatePageById')
            ->needs('Demo\Api\Domain\Contracts\RepositoryInterface')
            ->give('Demo\Api\Infrastructure\Persistence\Repositories\Page');

        $this->app
            ->when('Demo\Api\Domain\Services\UpdatePageById')
            ->needs('Demo\Api\Domain\Contracts\Request\ValidatorInterface')
            ->give('Demo\Api\Domain\Requests\Validators\UpdatePageById');
        
        $this->app
            ->when('Demo\Api\Domain\Services\UpdatePageById')
            ->needs('Demo\Api\Domain\Contracts\Request\TransformerInterface')
            ->give('Demo\Api\Domain\Request\Transformers\Page');
        
        $this->app
            ->when('Demo\Api\Domain\Services\CreatePage')
            ->needs('Demo\Api\Domain\Contracts\RepositoryInterface')
            ->give('Demo\Api\Infrastructure\Persistence\Repositories\Page');
  
        $this->app
            ->when('Demo\Api\Domain\Services\CreatePage')
            ->needs('Demo\Api\Domain\Contracts\Request\ValidatorInterface')
            ->give('Demo\Api\Domain\Requests\Validators\CreatePage');

        $this->app
            ->when('Demo\Api\Domain\Services\CreatePage')
            ->needs('Demo\Api\Domain\Contracts\Request\TransformerInterface')
            ->give('Demo\Api\Domain\Request\Transformers\Page');

        $this->app
            ->when('Demo\Api\Domain\Services\GetPagesByCategoryId')
            ->needs('Demo\Api\Domain\Contracts\RepositoryInterface')
            ->give('Demo\Api\Infrastructure\Persistence\Repositories\Page');

        $this->app
            ->when('Demo\Api\Domain\Services\GetPagesByCategoryId')
            ->needs('Demo\Api\Domain\Contracts\Request\ValidatorInterface')
            ->give('Demo\Api\Domain\Requests\Validators\GetPagesByCategoryId');

        $this->app
            ->when('Demo\Api\Domain\Services\CountPagesByCategoryId')
            ->needs('Demo\Api\Domain\Contracts\RepositoryInterface')
            ->give('Demo\Api\Infrastructure\Persistence\Repositories\Page');

        $this->app
            ->when('Demo\Api\Domain\Services\CountPagesByCategoryId')
            ->needs('Demo\Api\Domain\Contracts\Request\ValidatorInterface')
            ->give('Demo\Api\Domain\Requests\Validators\CountPagesByCategoryId');

        /* usecases */
        $this->app
            ->when('Demo\Api\Application\Usecases\CountPagesByCategoryId')
            ->needs('Demo\Api\Domain\Contracts\ValueObject\ServiceInterface')
            ->give('Demo\Api\Domain\Services\CountPagesByCategoryId');

        $this->app
            ->when('Demo\Api\Application\Usecases\CountPagesByCategoryId')
            ->needs('Demo\Api\Application\Contracts\Command\ValidatorInterface')
            ->give('Demo\Api\Application\Commands\Validators\CountPagesByCategoryId');

        $this->app
            ->when('Demo\Api\Application\Usecases\CountPagesByCategoryId')
            ->needs('Demo\Api\Application\Contracts\Command\TransformerInterface')
            ->give('Demo\Api\Application\Commands\Transformers\CountPagesByCategoryId');

        $this->app
            ->when('Demo\Api\Application\Usecases\GetPagesByCategoryId')
            ->needs('Demo\Api\Domain\Contracts\Response\ServiceInterface')
            ->give('Demo\Api\Domain\Services\GetPagesByCategoryId');

        $this->app
            ->when('Demo\Api\Application\Usecases\GetPagesByCategoryId')
            ->needs('Demo\Api\Application\Contracts\Command\ValidatorInterface')
            ->give('Demo\Api\Application\Commands\Validators\GetPagesByCategoryId');

        $this->app
            ->when('Demo\Api\Application\Usecases\GetPagesByCategoryId')
            ->needs('Demo\Api\Application\Contracts\Command\TransformerInterface')
            ->give('Demo\Api\Application\Commands\Transformers\GetPagesByCategoryId');

        $this->app
            ->when('Demo\Api\Application\Usecases\GetPageById')
            ->needs('Demo\Api\Domain\Contracts\Response\ServiceInterface')
            ->give('Demo\Api\Domain\Services\GetPageById');

        $this->app
            ->when('Demo\Api\Application\Usecases\GetPageById')
            ->needs('Demo\Api\Application\Contracts\Command\ValidatorInterface')
            ->give('Demo\Api\Application\Commands\Validators\GetPageById');

        $this->app
            ->when('Demo\Api\Application\Usecases\GetPageById')
            ->needs('Demo\Api\Application\Contracts\Command\TransformerInterface')
            ->give('Demo\Api\Application\Commands\Transformers\GetPageById');

        $this->app
            ->when('Demo\Api\Application\Usecases\DeletePageById')
            ->needs('Demo\Api\Domain\Contracts\Response\ServiceInterface')
            ->give('Demo\Api\Domain\Services\DeletePageById');

        $this->app
            ->when('Demo\Api\Application\Usecases\DeletePageById')
            ->needs('Demo\Api\Application\Contracts\Command\ValidatorInterface')
            ->give('Demo\Api\Application\Commands\Validators\DeletePageById');

        $this->app
            ->when('Demo\Api\Application\Usecases\DeletePageById')
            ->needs('Demo\Api\Application\Contracts\Command\TransformerInterface')
            ->give('Demo\Api\Application\Commands\Transformers\DeletePageById');

        $this->app
            ->when('Demo\Api\Application\Usecases\UpdatePageById')
            ->needs('Demo\Api\Domain\Contracts\Response\ServiceInterface')
            ->give('Demo\Api\Domain\Services\UpdatePageById');

        $this->app
            ->when('Demo\Api\Application\Usecases\UpdatePageById')
            ->needs('Demo\Api\Application\Contracts\Command\ValidatorInterface')
            ->give('Demo\Api\Application\Commands\Validators\UpdatePageById');

        $this->app
            ->when('Demo\Api\Application\Usecases\UpdatePageById')
            ->needs('Demo\Api\Application\Contracts\Command\TransformerInterface')
            ->give('Demo\Api\Application\Commands\Transformers\UpdatePageById');

        $this->app
            ->when('Demo\Api\Application\Usecases\CreatePage')
            ->needs('Demo\Api\Domain\Contracts\Response\ServiceInterface')
            ->give('Demo\Api\Domain\Services\CreatePage');

        $this->app
            ->when('Demo\Api\Application\Usecases\CreatePage')
            ->needs('Demo\Api\Application\Contracts\Command\ValidatorInterface')
            ->give('Demo\Api\Application\Commands\Validators\CreatePage');

        $this->app
            ->when('Demo\Api\Application\Usecases\CreatePage')
            ->needs('Demo\Api\Application\Contracts\Command\TransformerInterface')
            ->give('Demo\Api\Application\Commands\Transformers\CreatePage');

        /* persistence */
        $this->app
            ->when('Demo\Api\Infrastructure\Persistence\Repositories\Page')
            ->needs('Demo\Api\Domain\Contracts\Repository\AssemblerInterface')
            ->give('Demo\Api\Infrastructure\Persistence\Repositories\Assemblers\Page');

        $this->app
            ->when('Demo\Api\Infrastructure\Persistence\Repositories\Page')
            ->needs('Illuminate\Database\Eloquent\Model')
            ->give('Demo\Api\Infrastructure\Persistence\Repositories\Eloquent\Page');
    }
}