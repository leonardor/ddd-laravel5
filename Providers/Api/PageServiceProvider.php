<?php

declare(strict_types=1);

namespace Demo\Providers\Api;

use \Illuminate\Support\ServiceProvider;

use Demo\Api\{
    Application,
    Domain,
    Infrastructure
};

class PageServiceProvider extends ServiceProvider
{
    public function register()
    {
        /* services */
        $this->app
            ->when(Domain\Services\GetPageById::class)
            ->needs(Domain\Contracts\RepositoryInterface::class)
            ->give(Infrastructure\Persistence\Repositories\Page::class);

        $this->app
            ->when(Domain\Services\GetPageById::class)
            ->needs(Domain\Contracts\Request\ValidatorInterface::class)
            ->give(Domain\Requests\Validators\GetPageById::class);

        $this->app
            ->when(Domain\Services\DeletePageById::class)
            ->needs(Domain\Contracts\RepositoryInterface::class)
            ->give(Infrastructure\Persistence\Repositories\Page::class);

        $this->app
            ->when(Domain\Services\DeletePageById::class)
            ->needs(Domain\Contracts\Request\ValidatorInterface::class)
            ->give(Domain\Requests\Validators\DeletePageById::class);

        $this->app
            ->when(Domain\Services\UpdatePageById::class)
            ->needs(Domain\Contracts\RepositoryInterface::class)
            ->give(Infrastructure\Persistence\Repositories\Page::class);

        $this->app
            ->when(Domain\Services\UpdatePageById::class)
            ->needs(Domain\Contracts\Request\ValidatorInterface::class)
            ->give(Domain\Requests\Validators\UpdatePageById::class);
        
        $this->app
            ->when(Domain\Services\UpdatePageById::class)
            ->needs(Domain\Contracts\Request\TransformerInterface::class)
            ->give(Domain\Requests\Transformers\Page::class);
        
        $this->app
            ->when(Domain\Services\CreatePage::class)
            ->needs(Domain\Contracts\RepositoryInterface::class)
            ->give(Infrastructure\Persistence\Repositories\Page::class);
  
        $this->app
            ->when(Domain\Services\CreatePage::class)
            ->needs(Domain\Contracts\Request\ValidatorInterface::class)
            ->give(Domain\Requests\Validators\CreatePage::class);

        $this->app
            ->when(Domain\Services\CreatePage::class)
            ->needs(Domain\Contracts\Request\TransformerInterface::class)
            ->give(Domain\Requests\Transformers\Page::class);

        $this->app
            ->when(Domain\Services\GetPagesByCategoryId::class)
            ->needs(Domain\Contracts\RepositoryInterface::class)
            ->give(Infrastructure\Persistence\Repositories\Page::class);

        $this->app
            ->when(Domain\Services\GetPagesByCategoryId::class)
            ->needs(Domain\Contracts\Request\ValidatorInterface::class)
            ->give(Domain\Requests\Validators\GetPagesByCategoryId::class);

        $this->app
            ->when(Domain\Services\CountPagesByCategoryId::class)
            ->needs(Domain\Contracts\RepositoryInterface::class)
            ->give(Infrastructure\Persistence\Repositories\Page::class);

        $this->app
            ->when(Domain\Services\CountPagesByCategoryId::class)
            ->needs(Domain\Contracts\Request\ValidatorInterface::class)
            ->give(Domain\Requests\Validators\CountPagesByCategoryId::class);

        /* usecases */
        $this->app
            ->when(Application\Usecases\CountPagesByCategoryId::class)
            ->needs(Domain\Contracts\ValueObject\ServiceInterface::class)
            ->give(Domain\Services\CountPagesByCategoryId::class);

        $this->app
            ->when(Application\Usecases\CountPagesByCategoryId::class)
            ->needs(Application\Contracts\Command\ValidatorInterface::class)
            ->give(Application\Commands\Validators\CountPagesByCategoryId::class);

        $this->app
            ->when(Application\Usecases\CountPagesByCategoryId::class)
            ->needs(Application\Contracts\Command\TransformerInterface::class)
            ->give(Application\Commands\Transformers\CountPagesByCategoryId::class);

        $this->app
            ->when(Application\Usecases\GetPagesByCategoryId::class)
            ->needs(Domain\Contracts\Response\ServiceInterface::class)
            ->give(Domain\Services\GetPagesByCategoryId::class);

        $this->app
            ->when(Application\Usecases\GetPagesByCategoryId::class)
            ->needs(Application\Contracts\Command\ValidatorInterface::class)
            ->give(Application\Commands\Validators\GetPagesByCategoryId::class);

        $this->app
            ->when(Application\Usecases\GetPagesByCategoryId::class)
            ->needs(Application\Contracts\Command\TransformerInterface::class)
            ->give(Application\Commands\Transformers\GetPagesByCategoryId::class);

        $this->app
            ->when(Application\Usecases\GetPageById::class)
            ->needs(Domain\Contracts\Response\ServiceInterface::class)
            ->give(Domain\Services\GetPageById::class);

        $this->app
            ->when(Application\Usecases\GetPageById::class)
            ->needs(Application\Contracts\Command\ValidatorInterface::class)
            ->give(Application\Commands\Validators\GetPageById::class);

        $this->app
            ->when(Application\Usecases\GetPageById::class)
            ->needs(Application\Contracts\Command\TransformerInterface::class)
            ->give(Application\Commands\Transformers\GetPageById::class);

        $this->app
            ->when(Application\Usecases\DeletePageById::class)
            ->needs(Domain\Contracts\Response\ServiceInterface::class)
            ->give(Domain\Services\DeletePageById::class);

        $this->app
            ->when(Application\Usecases\DeletePageById::class)
            ->needs(Application\Contracts\Command\ValidatorInterface::class)
            ->give(Application\Commands\Validators\DeletePageById::class);

        $this->app
            ->when(Application\Usecases\DeletePageById::class)
            ->needs(Application\Contracts\Command\TransformerInterface::class)
            ->give(Application\Commands\Transformers\DeletePageById::class);

        $this->app
            ->when(Application\Usecases\UpdatePageById::class)
            ->needs(Domain\Contracts\Response\ServiceInterface::class)
            ->give(Domain\Services\UpdatePageById::class);

        $this->app
            ->when(Application\Usecases\UpdatePageById::class)
            ->needs(Application\Contracts\Command\ValidatorInterface::class)
            ->give(Application\Commands\Validators\UpdatePageById::class);

        $this->app
            ->when(Application\Usecases\UpdatePageById::class)
            ->needs(Application\Contracts\Command\TransformerInterface::class)
            ->give(Application\Commands\Transformers\UpdatePageById::class);

        $this->app
            ->when(Application\Usecases\CreatePage::class)
            ->needs(Domain\Contracts\Response\ServiceInterface::class)
            ->give(Domain\Services\CreatePage::class);

        $this->app
            ->when(Application\Usecases\CreatePage::class)
            ->needs(Application\Contracts\Command\ValidatorInterface::class)
            ->give(Application\Commands\Validators\CreatePage::class);

        $this->app
            ->when(Application\Usecases\CreatePage::class)
            ->needs(Application\Contracts\Command\TransformerInterface::class)
            ->give(Application\Commands\Transformers\CreatePage::class);

        /* persistence */
        $this->app
            ->when(Infrastructure\Persistence\Repositories\Page::class)
            ->needs(Domain\Contracts\Repository\AssemblerInterface::class)
            ->give(Infrastructure\Persistence\Repositories\Assemblers\Page::class);

        $this->app
            ->when(Infrastructure\Persistence\Repositories\Page::class)
            ->needs(\Illuminate\Database\Eloquent\Model::class)
            ->give(Infrastructure\Persistence\Repositories\Eloquent\Page::class);
    }
}