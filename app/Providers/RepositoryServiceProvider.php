<?php

namespace App\Providers;

use App\Repositories\Contracts\Products\ProductsRepositoryInterface;
use App\Repositories\Products\RestApiRepository;
use App\Repositories\Products\SqlRepository;
use App\Services\ProductsService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(ProductsRepositoryInterface::class, SqlRepository::class);
        $this->app->bind(ProductsRepositoryInterface::class, RestApiRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
