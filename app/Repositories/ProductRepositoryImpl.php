<?php

namespace App\Repositories;

class ProductRepositoryImpl implements ProductRepository
{
    public function findById(int $id): ?Product
    {
        return Product::find($id);
    }

    public function findAll(): Collection
    {
        return Product::all();
    }

    public function save(array $data): Product
    {
        return Product::create($data);
    }

    public function update(int $id, array $data): ?Product
    {
        $product = Product::find($id);
        if ($product) {
            $product->update($data);
        }
        return $product;
    }

    public function deleteById(int $id): bool
    {
        return Product::destroy($id) > 0;
    }
}
