@extends('layouts.ctmindex')
@section('content')
<style>
/* Reset password form styling */
.reset-password-form {
    width: 400px;
    margin: 80px auto;
    padding: 60px;
    background: #f9f9f9;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    text-align: center;
    font-family: 'Arial', sans-serif;
}

.reset-password-form h2 {
    margin-bottom: 20px;
    color: #333;
    font-size: 28px;
}

.reset-password-form label {
    display: block;
    margin-top: 15px;
    font-weight: bold;
    text-align: left;
    color: #555;
}

.reset-password-form input[type="email"],
.reset-password-form input[type="password"] {
    width: 100%;
    padding: 10px 12px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 16px;
}

.reset-password-form button {
    margin-top: 40px;
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

.reset-password-form button:hover {
    background-color: #741f1f;
}

.error {
    color: red;
    font-size: 0.9em;
    margin-top: 5px;
    display: block;
    text-align: left;
}
</style>

<div class="reset-password-form">
    <h2>Reset Password</h2>

    <form method="POST" action="{{ route('customer.password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <label>Email:</label>
        <input type="email" name="email" required placeholder="Enter your email">
        @error('email') <span class="error">{{ $message }}</span> @enderror

        <label>New Password:</label>
        <input type="password" name="password" required placeholder="Enter new password">
        @error('password') <span class="error">{{ $message }}</span> @enderror

        <label>Confirm Password:</label>
        <input type="password" name="password_confirmation" required placeholder="Confirm new password">

        <button type="submit">Reset Password</button>
    </form>
</div>
@endsection
