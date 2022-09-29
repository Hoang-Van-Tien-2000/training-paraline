<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton(
            \App\Repositories\RepositoryInterface::class,
            \App\Repositories\UserRepository::class,
            \App\Repositories\TeamRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        resolve(\Illuminate\Routing\UrlGenerator::class)->forceScheme('https');

       // parent::boot();
        Paginator::useBootstrap();
    }
}
