<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the customers.
     */
    public function index()
    {
        $customers = Customer::all(); // Fetch all customers from the database
        return view('customers.index', compact('customers')); // Pass customers to the view
    }

    /**
     * Show the form for creating a new customer.
     */
    public function create()
    {
        return view('customers.create'); // Show the customer creation form
    }

    /**
     * Store a newly created customer in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
        ]);

        // Create a new customer
        Customer::create($validated);

        // Redirect to the customer list with success message
        return redirect()->route('customers.index')->with('success', 'Customer added successfully!');
    }

    /**
     * Show the form for editing the specified customer.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer')); // Show the customer edit form
    }

    /**
     * Update the specified customer in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
        ]);

        // Update the customer
        $customer->update($validated);

        // Redirect to the customer list with success message
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully!');
    }

    /**
     * Remove the specified customer from storage.
     */
    public function destroy(Customer $customer)
    {
        // Delete the customer
        $customer->delete();

        // Redirect to the customer list with success message
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully!');
    }
}
