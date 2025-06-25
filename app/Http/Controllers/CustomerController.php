<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Display a list of customers
    public function index()
    {
        $customers = Customer::all();
        return view('customer.index', compact('customers'));
    }

    // Show form to create new customer
    public function create()
    {
        return view('customer.create');
    }

    // Store new customer in database
    public function store(Request $request)
    {
        $request->validate([
            'customer_name'    => 'required|string|max:255',
            'order_quantity'   => 'required|integer|min:0',
            'purchased_amount' => 'required|numeric|min:0',
            'status'           => 'required|in:active,inactive',
            'last_login'       => 'nullable|date',
        ]);

        Customer::create($request->all());

        return redirect()->route('customer.index')->with('success', 'Customer created successfully.');
    }

    // Show form to edit existing customer
    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    // Update customer record
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'customer_name'    => 'required|string|max:255',
            'order_quantity'   => 'required|integer|min:0',
            'purchased_amount' => 'required|numeric|min:0',
            'status'           => 'required|in:active,inactive',
            'last_login'       => 'nullable|date',
        ]);

        $customer->update($request->all());

        return redirect()->route('customer.index')->with('success', 'Customer updated successfully.');
    }

    // Delete customer
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customer.index')->with('success', 'Customer deleted successfully.');
    }
}
