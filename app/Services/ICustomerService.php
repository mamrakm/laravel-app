<?php

namespace App\Services;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Collection;

interface ICustomerService
{
    public function createCustomer($validated);

    public function getAllCustomers(): Collection;

    public function getCustomerById(int $id): Customer;

    public function updateCustomer(int $id, array $data): Customer;

    public function deleteCustomer(int $id): bool;
}
