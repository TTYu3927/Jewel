@extends('layouts.ctmindex')
@section('content')

<style>
  .signup-container {
    max-width: 400px;
    margin: 155px auto;
    color: #fff;
    text-align: center;
  }
  
  .signup-container h2 {
    font-size: 24px;
    color: #fff;
    margin-bottom: 10px;
    letter-spacing: 1px;
  }
  
  .signup-container p {
    color: #ccc;
    margin-bottom: 25px;
    font-size: 14px;
  }
  
  .signup-form {
    display: flex;
    flex-direction: column;
    gap: 15px;
  }
  
  .signup-form input,
  .signup-form select,textarea {
    background-color: transparent;
    border: 1px solid #999;
    padding: 10px;
    color: #fff;
    font-size: 14px;
    border-radius: 3px;
  }
  
  .signup-form input:focus,
  .signup-form select:focus,
  .signup-form textarea:focus {
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
  .signup-form button {
    background-color: #5e1c1c;
    color: #fff;
    padding: 12px;
    font-weight: bold;
    border: none;
    cursor: pointer;
    letter-spacing: 1px;
    transition: background-color 0.3s ease;
  }
  
  .signup-form button:hover {
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

<div class="signup-container">
  <h2>SIGN UP</h2>
  <p>Please fill in the informations below:</p>
  <form action="{{ route('customers.store') }}" class="signup-form" method="POST" >
    @csrf
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="phone" placeholder="Phone" required>

    <div class="dob">
      <select name="dob_month" required>
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
      <select name="dob_day" required>
        <option value="">Day</option>
        @for ($day = 1; $day <= 31; $day++)
          <option value="{{ str_pad($day, 2, '0', STR_PAD_LEFT) }}">{{ $day }}</option>
        @endfor
      </select>
      <select name="dob_year" required>
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

    <p class="login-link">Already have an account? <a href="{{ route('customers.index') }}">Login</a></p>
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