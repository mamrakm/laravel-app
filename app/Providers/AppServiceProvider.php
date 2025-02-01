<?php

namespace App\Providers;

use App\Repositories\CustomerRepository;
use App\Repositories\CustomerRepositoryImpl;
use App\Services\CustomerService;
use App\Services\CustomerServiceImpl;
use App\Services\ProductService;
use App\Services\ProductServiceImpl;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //x$this->app->singleton(CustomerRepository::class, fn() => new CustomerRepositoryImpl(new Customer()));
        $this->app->bind(CustomerService::class, CustomerServiceImpl::class);
        $this->app->bind(ProductService::class, ProductServiceImpl::class);

        $this->app->bind(CustomerRepository::class, CustomerRepositoryImpl::class);
    }

    public function boot(): void
    {
        // Other boot logic
    }
}

