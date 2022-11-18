<?php

namespace App\Repositories\Products;

use App\Models\Product;
use App\Repositories\Contracts\Products\ProductsRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class SqlRepository implements ProductsRepositoryInterface
{

    /**
     * @param int $id
     * @return Model|null
     */
    public function getOneById(int $id): ?Model
    {
        return Product::find($id);
    }
}
