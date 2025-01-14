<?php

namespace App\Repositories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Collection;

interface ICustomerRepository
{
    public function getAll(): Collection;

    public function findById(int $id): Customer;

    public function create(array $data): Customer;

    public function update(int $id, array $data): Customer;

    public function delete(int $id): bool;
}
