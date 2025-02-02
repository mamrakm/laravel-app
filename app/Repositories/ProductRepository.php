<?php

namespace App\Repositories;
interface ProductRepository
{
    public function findById(int $id): ?Product;

    public function findAll(): Collection;

    public function save(array $data): Product;

    public function update(int $id, array $data): ?Product;

    public function deleteById(int $id): bool;
}
