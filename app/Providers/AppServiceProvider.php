<?php

namespace App\Providers;

use App\Models\Customer;
use App\Repositories\CustomerRepository;
use App\Services\CustomerService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(CustomerRepository::class, fn () => new CustomerRepository(new Customer()));
        $this->app->singleton(CustomerService::class, fn ($app) => new CustomerService($app->make(CustomerRepository::class)));
    }

    public function boot(): void
    {
        // Other boot logic
    }
}
