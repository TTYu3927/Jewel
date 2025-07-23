@extends('layouts.ctmindex')

@section('content')
<style>
    .success{
        text-align: center;
        margin-top: 250px;
    }
    .success h1 {
        font-size: 32px;
        color: #D4AF37;
    }
    .success p {
        font-size: 11px;
        color: #aaa;
    }
    .success a {
        color: #f5c012;
        text-decoration: none;
    }
    .success button {
        padding: 10px 20px;
        background-color: #541c1c;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 13px;
        text-transform: uppercase;
    }
    .success button:hover{
        background-color: #6a2424;
    }

</style>
<div class="success">
    <h1>Order Successful! 🎉 </h1>
    <p>You will receive a comfirmation email shortly.</p>
    <p>Thank you for shopping with us!</p>
    <a href="{{ route('customers.shop') }}"><button>Continue Shopping</button></a>
</div>
@endsection
