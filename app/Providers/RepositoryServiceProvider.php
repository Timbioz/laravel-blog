<?php

namespace App\Providers;

use App\Interfaces\CategoriesRepositoryInterface;
use App\Interfaces\ImagesRepositoryInterface;
use App\Interfaces\PostsRepositoryInterface;
use App\Interfaces\TagsRepositoryInterface;
use App\Repositories\CategoriesRepository;
use App\Repositories\ImagesRepository;
use App\Repositories\PostsRepository;
use App\Repositories\TagsRepository;
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
        $this->app->bind(TagsRepositoryInterface::class, TagsRepository::class);
        $this->app->bind(ImagesRepositoryInterface::class, ImagesRepository::class);
    }
}
