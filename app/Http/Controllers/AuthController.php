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

        // Show admin login form
        public function showAdminLoginForm()
        {
            return view('adminlogin');
        }

        // Admin login
        public function adminLogin(Request $request)
        {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
        
            $credentials = $request->only('email', 'password');
        
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
        
                if ($user->usertype === 'admin') {
                    return redirect()->intended(route('dashboardchart'))->with('success', 'Welcome Admin');
                }
        
                Auth::logout(); // not admin, force logout
                return redirect()->back()->with('error', 'Not an admin user.');
            }
        
            return redirect()->back()->with('error', 'Invalid credentials');
        }
        
        // Show customer login form
        public function showLoginForm()
        {
            return view('auth.login');
        }

        // Customer login
        public function customerLogin(Request $request)
        {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
        
            $credentials = $request->only('email', 'password');
        
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
        
                if ($user->usertype === 'customer') {
                    return redirect()->intended(route('customers.index'))->with('success', 'Welcome');
                }
        
                Auth::logout();
                return redirect()->back()->with('error', 'Not a customer user.');
            }
        
            return redirect()->back()->with('error', 'Invalid credentials');
        }
        
    // Handle logout
// Customer logout
public function customerLogout(Request $request)
{
    Auth::logout(); // This logs out the current user (customer)

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login.form')->with('success', 'Logged out successfully.');
}

// Admin logout
public function adminLogout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('admin.login.form')->with('success', 'Logged out successfully.');
}
    
}
