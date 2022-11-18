<?php

namespace App\Providers;

use App\Repositories\Contracts\Products\ProductsRepositoryInterface;
use App\Repositories\Products\ProductsApiRepository;
use App\Repositories\Products\ProductsRepository;
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
        $this->app->bind(ProductsRepositoryInterface::class, ProductsRepository::class);
        $this->app->bind(ProductsRepositoryInterface::class, ProductsApiRepository::class);
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
