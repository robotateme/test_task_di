<?php

namespace Tests\Unit;

use App\Repositories\Products\RestApiRepository;
use App\Services\ProductsService;
use Tests\TestCase;
use function PHPUnit\Framework\assertInstanceOf;

class ProductServiceTest extends TestCase
{
    private ProductsService $service;

    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->service = app(ProductsService::class);

    }

    /**
     * @return void
     */
    public function test_change_repository_to_api_by_id(): void
    {

        $this->service->getOneById(1000);
        assertInstanceOf(RestApiRepository::class, $this->service->getProductsRepository());
    }

    /**
     * @return void
     */
    public function test_change_repository_to_database_by_id(): void
    {
        $this->service->getOneById(100);
        assertInstanceOf(RestApiRepository::class, $this->service->getProductsRepository());
    }

}
