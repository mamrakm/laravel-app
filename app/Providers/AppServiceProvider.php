<?php

namespace App\Providers;

use App\Models\Customer;
use App\Repositories\CustomerRepositoryImpl;
use App\Services\CustomerServiceImpl;
use App\Services\ICustomerService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(CustomerRepositoryImpl::class, fn () => new CustomerRepositoryImpl(new Customer()));
        $this->app->bind(ICustomerService::class, CustomerServiceImpl::class);    }

    public function boot(): void
    {
        // Other boot logic
    }
}
