<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Services\ProductService;
use Illuminate\Database\Eloquent\Collection;

class ProductServiceImpl implements ProductService
{
    public function __construct(private readonly ProductRepository $productRepository)
    {
    }

    public function getAllProducts(): Collection
    {
        return $this->productRepository->findAll();
    }

    public function getProductById(int $id): ?Product
    {
        return $this->productRepository->findById($id);
    }

    public function createProduct(array $data): Product
    {
        return $this->productRepository->save($data);
    }

    public function updateProduct(int $id, array $data): ?Product
    {
        return $this->productRepository->update($id, $data);
    }

    public function deleteProduct(int $id): bool
    {
        return $this->productRepository->deleteById($id);
    }
}
