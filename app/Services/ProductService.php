<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface ProductService
{
    public function getAllProducts(): Collection;

    public function getProductById(int $id): ?Product;

    public function createProduct(array $data): Product;

    public function updateProduct(int $id, array $data): ?Product;

    public function deleteProduct(int $id): bool;
}
