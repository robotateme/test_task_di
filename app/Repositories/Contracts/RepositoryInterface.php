<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{

    /**
     * @param int $id
     * @return Model
     */
    public function getOneById(int $id): Model;

}
