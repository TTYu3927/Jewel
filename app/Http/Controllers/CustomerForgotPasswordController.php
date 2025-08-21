<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;

class CustomerForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('admin.forgot-password'); 
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::broker('customers')->sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function showResetForm($token)
    {
        return view('admin.reset-password', ['token' => $token]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::broker('customers')->reset(
            $request->only('email','password','password_confirmation','token'),
            function($customer, $password){
                $customer->password = Hash::make($password);
                $customer->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('adminlogin')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
