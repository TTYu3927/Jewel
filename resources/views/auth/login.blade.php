@extends('layouts.ctmindex')
@section('content')
<link rel="stylesheet" href="{{ asset('css/authlogin.css') }}">

<style>

  
  
  
</style>

<div class="login-container">
  <h2>LOGIN</h2>
  <p>Enter your email and password to login:</p>
  <form action="{{ route('login.form') }}" class="login-form" method="POST" >
    @csrf
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>

    <button type="submit">LOGIN</button>
    <!-- <a href="{{ route('logout') }}">Logout</a> -->

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