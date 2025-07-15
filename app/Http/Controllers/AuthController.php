<?php


namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show registration form
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Handle registration
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|min:6|confirmed',
            'phone' => 'required|string|max:15',
            'date_of_birth' => 'date',
            'address' => 'required|string|max:255'
        ]);

        $validated['password'] = Hash::make($validated['password']);

        Customer::create($validated);
        
        return redirect()->route('login.form')->with('success', 'Registration successful! Please login.');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->usertype == 'admin') {
                return redirect()->intended(route('admin.index'))->with('success', 'Welcome Admin');
            } elseif ($user->usertype == 'customer') {
                return redirect()->intended(route('customers.index'))->with('success', 'Welcome User');
            } else {
                return redirect()->back()->with('error', 'Unauthorized user type');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }            


            


    }

    // Handle logout
    public function logout(Request $request)
    {
        auth('customer')->logout();
        auth('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form')->with('success', 'Logged out successfully.');
    }
}
