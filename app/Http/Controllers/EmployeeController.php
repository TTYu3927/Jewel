<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::latest()->get();
        return view('employees.index', compact('employees'));
    }
        /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email',
            'password' => 'required|confirmed|min:6',
            'position' => 'nullable',
            'phone_number' => 'nullable',
            'address' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);
    
        // Format DOB
        $dob = null;
        if ($request->dob_year && $request->dob_month && $request->dob_day) {
            $dob = "{$request->dob_year}-{$request->dob_month}-{$request->dob_day}";
        }
    
        // Handle image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('employees', 'public');
        }
    
        Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'position' => $request->position,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'date_of_birth' => $dob,
            'image' => $imagePath,
        ]);
    
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }        /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'status' => 'required|in:Online,Offline',
            'phone_number' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:500',
            'image' => 'nullable|image|max:2048',
        ]);
    
        if ($request->hasFile('image')) {
            if ($employee->image) {
                Storage::disk('public')->delete($employee->image);
            }
            $data['image'] = $request->file('image')->store('employees', 'public');
        }
    
        $employee->update($data);
    
        return redirect()->route('employees.index')->with('success', 'Employee updated!');
    }
            /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        if ($employee->image) {
            Storage::disk('public')->delete($employee->image);
        }

        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully!');
    }
}
