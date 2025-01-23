<?php

namespace Tests;

use App\Services\CustomerService;
use App\Services\CustomerServiceImpl;

class CustomerTest extends TestCase
{
    public function test_customer_service_resolves_to_correct_implementation(): void
    {
        $service = $this->app->make(CustomerService::class);
        $this->assertInstanceOf(CustomerServiceImpl::class, $service);
    }

    public function test_customer_service_can_retrieve_customers(): void
    {
        $service = $this->app->make(CustomerService::class);
        $customers = $service->getCustomers();
        $this->assertIsArray($customers);
    }

    public function test_customer_service_can_retrieve_customer_by_id(): void
    {
        $service = $this->app->make(CustomerService::class);
        $customer = $service->getCustomerById(1);
        $this->assertIsArray($customer);
    }

    public function test_customer_service_can_create_customer(): void
    {
        $service = $this->app->make(CustomerService::class);
        $customer = $service->createCustomer([
            'name' => 'John Doe',
            'email' => 'john.doe@hotmail.com',
            'phone' => '1234567890',
        ]);

        $this->assertIsArray($customer);

        $this->assertSame('John Doe', $customer['name']);
        $this->assertSame('john.doe@hotmail.com', $customer['email']);
        $this->assertSame('1234567890', $customer['phone']);
    }

}
