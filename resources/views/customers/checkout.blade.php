@extends('layouts.ctmindex')
@section('content')
<link rel="stylesheet" href="{{ asset('css/customercheckout.css') }}">

<style>

</style>

<div class="checkout-container">
    <div class="checkout-left">
        <h2>CHECKOUT</h2>

        <h4>CONTACT</h4>
        <label>Email</label><br>
        <input type="email" value="{{ auth()->check() ? auth()->user()->email : '' }}" placeholder="Your email">

        <h4>DELIVERY</h4>
        <label>Receiver's Name</label><br>
        <input type="text" value="{{ auth()->check() ? auth()->user()->name : '' }}" placeholder="Receiver's Name"><br>
        <label>Address</label><br>
        <input type="text" value="{{ auth()->check() ? auth()->user()->address : '' }}" placeholder="Address"><br>
        <label>Phone Number</label><br>
        <input type="text" value="{{ auth()->check() ? auth()->user()->phone : '' }}" placeholder="Phone Number">
        
        <form action="{{  route('customers.payment') }}" method="get">
        <button>GO PAYMENT</button>
        </form>
    </div>

    <div class="checkout-right">
        @foreach ($cart as $item)
            <div class="product-row">
                <div class="product-info">
@php

    $defaultImage = asset('images/giftcard.jpg');
    $imagePath = isset($item['image']) && Storage::disk('public')->exists($item['image'])
        ? asset('storage/' . $item['image'])
        : $defaultImage;
@endphp

<img class="product-img" src="{{ $imagePath }}" alt="Product Image">
                    <div>
                        <div>{{ $item['product_name'] }}</div>
                        <p>{{ number_format($item['price']) }} MMK</p>
                    </div>
                </div>
                <div class="quantity">
                    <span>{{ $item['quantity'] }}</span>
                    </div>
                    <div class="price">
                    <span>{{ number_format($item['price'] * $item['quantity']) }} MMK</span>
                </div>
            </div>
        @endforeach

        <div class="summary">
            <div><span>Subtotal: {{ count($cart) }} items</span><span>{{ number_format($totalAmount) }} MMK</span></div>
            <div><span>Shipping:</span><span>{{ number_format($shipping) }} MMK</span></div>
            <div class="top"><strong>TOTAL</strong><strong>{{ number_format($total) }} MMK</strong></div>
        </div>
    </div>
</div>

@endsection
