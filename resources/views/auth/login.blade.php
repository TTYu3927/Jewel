@extends('layouts.ctmindex')
@section('content')

<style>
  .login-container {
    max-width: 400px;
    margin: 155px auto;
    color: #fff;
    text-align: center;
  }
  
  .login-container h2 {
    font-size: 24px;
    color: #fff;
    margin-bottom: 10px;
    letter-spacing: 1px;
  }
  
  .login-container p {
    color: #ccc;
    margin-bottom: 25px;
    font-size: 14px;
  }
  
  .login-form {
    display: flex;
    flex-direction: column;
    gap: 15px;
  }
  
  .login-form input,
  .login-form select,textarea {
    background-color: transparent;
    border: 1px solid #999;
    padding: 10px;
    color: #fff;
    font-size: 14px;
    border-radius: 3px;
  }
  
  .login-form input:focus,
  .login-form select:focus,
  .login-form textarea:focus {
    border-color: #f5c012;
    outline: none;
  }
  
  .dob {
    display: flex;
    gap: 10px;
    justify-content: space-between;
  }
  
  .dob select {
    flex: 1;
    color: #f5c012;
  }
  .login-form button {
    background-color: #5e1c1c;
    color: #fff;
    padding: 12px;
    font-weight: bold;
    border: none;
    cursor: pointer;
    letter-spacing: 1px;
    transition: background-color 0.3s ease;
  }
  
  .login-form button:hover {
    background-color: #741f1f;
  }
  
  .login-link {
    font-size: 13px;
    color: #ccc;
  }
  
  .login-link a {
    color: #f5c012;
    text-decoration: none;
  }
  
  
  
</style>

<div class="login-container">
  <h2>LOGIN</h2>
  <p>Enter your email and password to login:</p>
  <form action="{{ route('login.form') }}" class="login-form" method="POST" >
    @csrf
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>

    <button type="submit">LOGIN</button>

    <p class="login-link">Don't have an account? <a href="{{ route('register.form') }}">Signup</a></p>
  </form>
</div>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@endsection