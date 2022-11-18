<?php

namespace App\Repositories\Products;

use App\Models\Product;
use App\Repositories\Contracts\Products\ProductsRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class ProductsApiRepository implements ProductsRepositoryInterface
{
    private string|null $host;

    public function __construct()
    {
        $this->host = config('services.product.api.url');
    }

    /**
     * @param int $id
     * @return Model|null
     */
    public function getOneById(int $id): ?Model
    {
        $method = 'products/%d';
        $responseData = \Http::get(\URL::format($this->host, sprintf($method, $id)))->json();
        //@todo checking response datatype array|scalar and throwing exception (??)
        return (new Product())->fill($responseData);
    }
}
