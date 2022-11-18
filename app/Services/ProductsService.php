<?php

namespace App\Services;

use App\Repositories\Contracts\Products\ProductsRepositoryInterface;
use App\Repositories\Products\RestApiRepository;
use App\Repositories\Products\SqlRepository;
use App\Services\Contracts\ServiceInterface;
use Illuminate\Database\Eloquent\Model;

class ProductsService implements ServiceInterface
{
    /**
     * @param ProductsRepositoryInterface $productsRepository
     */
    public function __construct(protected ProductsRepositoryInterface $productsRepository)
    {
    }

    /**
     * @param int $productId
     * @return Model|null
     */
    public function getOneById(int $productId): ?Model
    {
        $this->changeRepository($productId);
        return $this->productsRepository->getOneById($productId);
    }

    /**
     * @param int $productId
     * @return void
     */
    protected function changeRepository(int $productId): void
    {
        if ($productId < 1000) {
            $this->productsRepository = new SqlRepository();
        } else {
            $this->productsRepository = new RestApiRepository();
        }
    }

    /**
     * @return ProductsRepositoryInterface
     */
    public function getProductsRepository(): ProductsRepositoryInterface
    {
        return $this->productsRepository;
    }
}
