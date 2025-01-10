<?php

namespace Tests\Feature;

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_customer_successfully()
    {
        // Simulate a form submission
        $response = $this->post('/customers', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        // Assert the customer was created
        $response->assertStatus(302); // Redirect
        $this->assertDatabaseHas('customers', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);
    }

    /** @test */
    public function it_returns_customers_list()
    {
        Customer::factory()->count(5)->create();

        $response = $this->getJson('/api/customers');

        $response->assertStatus(200)
            ->assertJsonCount(5)
            ->assertJsonStructure([
                '*' => ['id', 'name', 'email', 'created_at', 'updated_at']
            ]);
    }

    /** @test */
    public function it_creates_multiple_customers()
    {
        Customer::factory()->count(10)->create();

        $this->assertDatabaseCount('customers', 10);
    }

    /** @test */
    public function it_formats_customer_name_correctly()
    {
        $customer = new Customer(['name' => 'john doe']);

        $this->assertEquals('John Doe', $customer->formatted_name);
    }
}
