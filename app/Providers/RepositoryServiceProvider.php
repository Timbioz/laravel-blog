<?php

namespace App\Providers;

use App\Interfaces\CategoriesRepositoryInterface;
use App\Interfaces\PostsRepositoryInterface;
use App\Repositories\CategoriesRepository;
use App\Repositories\PostsRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(PostsRepositoryInterface::class, PostsRepository::class);
        $this->app->bind(CategoriesRepositoryInterface::class, CategoriesRepository::class);
    }
}
