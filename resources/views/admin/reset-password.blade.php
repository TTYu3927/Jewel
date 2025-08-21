@extends('layouts.ctmindex')
@section('content')
<div class="reset-password-form">
    <h2>Reset Password</h2>

    <form method="POST" action="{{ route('admin.password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <label>Email:</label>
        <input type="email" name="email" required placeholder="Enter your email">

        <label>New Password:</label>
        <input type="password" name="password" required placeholder="Enter new password">

        <label>Confirm Password:</label>
        <input type="password" name="password_confirmation" required placeholder="Confirm new password">

        <button type="submit">Reset Password</button>
    </form>
</div>
@endsection
