<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
{
    $this->app->bind(
        \App\Repositories\Interfaces\BookRepositoryInterface::class,
        \App\Repositories\BookRepository::class
    );

    $this->app->bind(
        \App\Repositories\Interfaces\AuthorRepositoryInterface::class,
        \App\Repositories\AuthorRepository::class
    );

    $this->app->bind(
        \App\Repositories\Interfaces\CategoryRepositoryInterface::class,
        \App\Repositories\CategoryRepository::class
    );
}


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
