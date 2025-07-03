<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('customers.index');
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
    {   $date_of_birth = $request->dob_year . '-' . $request->dob_month . '-' . $request->dob_day;
        $request->merge(['date_of_birth' => $date_of_birth]);
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'phone' => 'required',
            'date_of_birth' => 'required|date',
            'address' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        

        $validated['password'] = Hash::make($validated['password']);

        Customer::create($validated);

        return redirect()->route('customers.index')->with('success', 'Customer added successfully');
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));

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
