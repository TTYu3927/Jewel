<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use App\Models\Order;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $latestProducts = Product::latest()->take(4)->get();
        return view('customers.index', compact('latestProducts'));    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.register');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'nullable|string|max:15',
            'date_of_birth' => 'date',
            'address' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        

        $validated['password'] = Hash::make($validated['password']);

        Customer::create($validated);

        return redirect()->route('customers.index')->with('success', 'Customer added successfully');
    }
    public function contact()
    {
        return view('customers.contact');
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));

    }
    public function customerList()
{
    $customers = Customer::all(); 
    return view('admin.customerlist', compact('customers'));
}

    public function orderList()
    {
        $orders = Order::all(); // Assuming you have an Order model
        return view('admin.orderlist', compact('orders'));
    }
    public function edit(Customer $customer)
    {
        //
    }

    public function update(Request $request, Customer $customer)
    {
        //
    }

    public function destroy(Customer $customer)
    {
//

}}
