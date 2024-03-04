<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function index($searchQuery)
    {
        $query = Product::query();

        if ($searchQuery) {
            $query->where('name', 'LIKE', "%$searchQuery%")
                  ->orWhere('price', 'LIKE', "%$searchQuery%");
        }
        return $query->paginate(10);
    }

    public function create($data)
    {
        return Product::create($data);
    }

    public function update(Product $product, $data)
    {
        $product->update($data);
        return $product;
    }

    public function delete(Product $product)
    {
        $product->delete();
    }
}
