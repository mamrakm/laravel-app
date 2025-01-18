<?php

namespace App\Repositories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Collection;

class CustomerRepositoryImpl implements CustomerRepository
{
    public function __construct(private readonly Customer $customer)
    {
    }

    public function getAll(): Collection
    {
        return $this->customer->all();
    }

    public function findById(int $id): Customer
    {
        return $this->customer->findOrFail($id);
    }

    public function create(array $data): Customer
    {
        return $this->customer->create($data);
    }

    public function update(int $id, array $data): Customer
    {
        $customer = $this->findById($id);
        $customer->update($data);
        return $customer;
    }

    public function delete(int $id): bool
    {
        $customer = $this->findById($id);
        return $customer->delete();
    }
}
