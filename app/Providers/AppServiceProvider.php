<?php

namespace App\Providers;

use App\Models\Customer;
use App\Repositories\CustomerRepository;
use App\Repositories\CustomerRepositoryImpl;
use App\Services\CustomerService;
use App\Services\CustomerServiceImpl;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(CustomerRepository::class, fn () => new CustomerRepositoryImpl(new Customer()));
        $this->app->bind(CustomerService::class, CustomerServiceImpl::class);    }

    public function boot(): void
    {
        // Other boot logic
    }
}
