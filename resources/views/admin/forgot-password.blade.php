@extends('layouts.ctmindex')
@section('content')
<style>
    /* adminforgot.css */

.forgot-password-form {
    width: 400px;
    margin: 80px auto;
    padding: 60px;
    background: #f9f9f9;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    text-align: center;
    font-family: 'Arial', sans-serif;
}

.forgot-password-form h2 {
    margin-bottom: 20px;
    color: #333;
    font-size: 28px;
}

.forgot-password-form label {
    display: block;
    margin-top: 15px;
    font-weight: bold;
    text-align: left;
    color: #555;
}

.forgot-password-form input[type="email"] {
    width: 100%;
    padding: 10px 12px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 16px;
}

.forgot-password-form button {
    margin-top: 60px;
    width: 100%;
    padding: 12px;
    background-color: #5e1c1c;
    color: white;
    border: none;
    border-radius: 8px;
    font-weight: bold;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.forgot-password-form button:hover {
    background-color: #741f1f;
}

.error {
    color: red;
    font-size: 0.9em;
    margin-top: 5px;
    display: block;
    text-align: left;
}

.success-message {
    background-color: #d4edda;
    color: #155724;
    padding: 10px;
    border-radius: 8px;
    margin-bottom: 15px;
    font-size: 14px;
}

</style>
<div class="forgot-password-form">
    <h2>Forgot Password</h2>
    @if(session('status'))
        <div class="success-message">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.password.email') }}">
        @csrf
        <label>Email:</label>
        <input type="email" name="email" required placeholder="Enter your email">
        @error('email') <span class="error">{{ $message }}</span> @enderror
        <button type="submit">Send Password Reset Link</button>
    </form>
</div>
@endsection
