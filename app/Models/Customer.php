<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Table name (optional if it matches the plural of the model name)
    protected $table = 'customers';

    // Fillable attributes for mass assignment
    protected $fillable = ['name', 'email', 'phone'];

    // Timestamps (enabled by default)
    public $timestamps = true;

    // Casts for attributes
    protected $casts = [
        'is_active' => 'boolean',
        'created_at' => 'datetime:Y-m-d',
    ];

    /**
     * Retrieve all customers.
     *
     * @return Collection
     */
    public static function getAll(): Collection
    {
        return self::all();
    }

    /**
     * Find a customer by ID or throw an exception if not found.
     *
     * @param int $id
     * @return Customer
     */
    public static function findById(int $id): Customer
    {
        return self::findOrFail($id);
    }

    /**
     * Create a new customer.
     *
     * @param array $data
     * @return Customer
     */
    public static function createCustomer(array $data): Customer
    {
        return self::create($data);
    }

    /**
     * Update the customer record by ID.
     *
     * @param int $id
     * @param array $data
     * @return Customer
     */
    public static function updateCustomer(int $id, array $data): Customer
    {
        $customer = self::findById($id);
        $customer->update($data);
        return $customer;
    }

    /**
     * Delete a customer by ID.
     *
     * @param int $id
     * @return bool
     */
    public static function deleteCustomer(int $id): bool
    {
        $customer = self::findById($id);
        return $customer->delete();
    }
}
