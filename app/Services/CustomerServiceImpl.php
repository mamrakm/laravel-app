<?php

namespace App\Services;

use App\Models\Customer;
use App\Repositories\CustomerRepositoryImpl;
use Illuminate\Database\Eloquent\Collection;

readonly class CustomerServiceImpl implements ICustomerService
{
    public function __construct(public CustomerRepositoryImpl $customerRepository)
    {
    }

    public function createCustomer($validated)
    {
        // Create a new customer
        return $this->customerRepository->create($validated);
    }

    public function getAllCustomers(): Collection
    {
        return $this->customerRepository->getAll();
    }

//    public function createCustomer(array $data): Customer
//    {
//        return $this->customerRepository->create($data);
//    }

    public function getCustomerById(int $id): Customer
    {
        return $this->customerRepository->findOrFail($id);
    }

    public function updateCustomer(int $id, array $data): Customer
    {
        $customer = $this->getCustomerById($id);
        $customer->update($data);
        return $customer;
    }

    public function deleteCustomer(int $id): bool
    {
        $customer = $this->customerRepository->getCustomerById($id);
        return $customer->delete();
    }

}
// Compare this snippet from app/Services/CusomerService.php:
