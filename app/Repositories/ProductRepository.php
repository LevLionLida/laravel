<?php

namespace App\Repository;

use App\Http\Requests\CreateProductRequest;
use App\Models\Product;
use App\Repository\Contracts\ProductRepositoryContract;

class ProductRepository implements ProductRepositoryContract
{
    public function __construct(protected Product $product)
    {
    }//model Product

    public function create(CreateProductRequest $request): Product|bool
    {
        dd($request-> validated());
        return false;
    }
}
