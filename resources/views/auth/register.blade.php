@extends('layouts.ctmindex')
@section('content')
<link rel="stylesheet" href="{{ asset('css/authregister.css') }}">

<style>
  
  
  
</style>

<div class="signup-container">
  <h2>SIGN UP</h2>
  <p>Please fill in the informations below:</p>
  <form action="{{ route('customers.store') }}" class="signup-form" method="POST" >
    @csrf
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="phone" placeholder="Phone" required>

    <div class="dob">
      <select name="dob_month">
        <option value="">Month</option>
        <option value="01">January</option>
        <option value="02">February</option>
        <option value="03">March</option>
        <option value="04">April</option>
        <option value="05">May</option>
        <option value="06">June</option>
        <option value="07">July</option>
        <option value="08">August</option>
        <option value="09">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
      </select>
      <select name="dob_day">
        <option value="">Day</option>
        @for ($day = 1; $day <= 31; $day++)
          <option value="{{ str_pad($day, 2, '0', STR_PAD_LEFT) }}">{{ $day }}</option>
        @endfor
      </select>
      <select name="dob_year">
        <option value="">Year</option>
        @for ($year = date('Y'); $year >= 1900; $year--)
          <option value="{{ $year }}">{{ $year }}</option>
        @endfor
      </select>
    </div>

    <textarea name="address" placeholder="address"></textarea>

    
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

    <button type="submit">SIGN UP</button>

    <p class="login-link">Already have an account? <a href="{{ route('login.form') }}">Login</a></p>
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