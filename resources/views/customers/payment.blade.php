@extends('layouts.ctmindex')
@section('content')

<style>
    body {
        background-color: #0f0f0f;
        font-family: 'Inter', sans-serif;
        margin: 0;
        padding: 0;
        color: #fff;
    }

    .Payment {
        max-width: 1000px;
        margin: 140px auto 60px;
        display: flex;
        justify-content: space-between;
        padding: 20px;
    }

    .left, .right {
        width: 48%;
    }
    .left p {
        font-size: 12px;
        color: #606060;
        margin-bottom: 30px;
        margin-top: 0;
    }
    h1 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 8px;
    }

    h3 {
        font-size: 16px;
        font-weight: bold;
        margin: 20px 0 15px;
    }

    p {
        font-size: 14px;
        color: #ccc;
        margin-bottom: 20px;
    }

    label {
        font-size: 13px;
        margin-bottom: 6px;
        display: block;
        color: #e0e0e0;
    }

    .left input[type="text"],
    .left input[type="email"] {
        width: 85%;
        padding: 12px;
        margin-bottom: 15px;
        border: 1px solid #444;
        background-color: transparent;
        color: #fff;
        font-size: 14px;
    }

    input::placeholder {
        color: #777;
    }

    .expiry-security {
        display: flex;
        gap: 10px;
    }

    .expiry-security .security {
        width: 45%;
    }
    .expiry-security .expiry{
        width: 45%;
    }

    button {
        width: 90%;
        padding: 14px;
        background-color: #541c1c;
        color: #fff;
        font-weight: bold;
        border: none;
        cursor: pointer;
        font-size: 14px;
        margin-top: 10px;
    }

    button:hover {
        background-color: #6a2424;
    }

    .note1 {
        font-size: 12px;
        color: #aaa;
        line-height: 1.5;
        margin-top: 20px;
    }

    .note1 a {
        color: #fff;
        text-decoration: underline;
    }
    .right{

    }
    .right-info {
        font-size: 14px;
        line-height: 2;
    }
    .right-info a{
        text-decoration: none;
        color: #f5c012;
    }
    .right-info span.label {
        color: #aaa;
        display: inline-block;
        width: 130px;        
    }
    .right-info input[type="text"],
    .right-info input[type="email"]{
        margin-left: 10px;
        border: none;
        background-color: transparent;
        color: #fff;
        font-size: 14px;
    }

    .note2 {
        font-size: 12px;
        color: #aaa;
        margin-top: 20px;
        padding: 12px;
        border: 1px solid #444;
        background-color: #141414;
        border-radius: 6px;
    }

</style>

<div class="Payment">
    <div class="left">
        <h1>PAYMENT</h1>
        <p>All transactions are secure and encrypted.</p>

        <h3>CARD INFORMATION</h3>

        <label>Card Number</label>
        <input type="text" placeholder="1234 5678 9012 3456" maxlength="19" required>

        <label>Name on Card</label>
        <input type="text" placeholder="Ex. John Doe" required>

        <div class="expiry-security">
            <div class="expiry">
                <label>Expiry Code</label>
                <input type="text" placeholder="MM/YY" maxlength="5" required>
            </div>
            <div class="security">
                <label>Security Code</label>
                <input type="text" placeholder="***" maxlength="3" required >
            </div>
        </div>

        <button type="submit">PAY NOW</button>

        <p class="note1">
            Your info will be saved to a Shop account. By continuing, you agree to Shop’s
            <a href="#">Terms of Service</a> and acknowledge the <a href="#">Privacy Policy</a>.
        </p>
    </div>

    <div class="right">
        <h3>DELIVERY INFORMATION</h3>
        @if(auth('customer')->check())
    <div class="right-info">
        <div><span class="label">Customer's Name:</span> {{ auth('customer')->user()->name }}</div>
        <div><span class="label">Email:</span> {{ auth('customer')->user()->email }}</div>
        <div><span class="label">Phone Number:</span> {{ auth('customer')->user()->phone }}</div>
        <div><span class="label">Delivery Address:</span> {{ auth('customer')->user()->address }}</div>
        <div><span class="label">Total Amount:</span>{{ number_format($totalAmount) }}MMK</div>
    </div>
@else
    <div class="right-info">
        <div>Please <a href="{{ route('login.form') }}">log in</a> to see your delivery information.</div>
    </div>
@endif
        <p class="note2">
        <i class="fa-solid fa-circle-exclamation" style="color: #FFD43B;"></i> The total amount you pay includes all applicable customs duties & taxes.
            We guarantee no additional charges on delivery.
        </p>
    </div>
</div>
@endsection
