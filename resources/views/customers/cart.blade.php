@extends('layouts.ctmindex')

@section('content')
<link rel="stylesheet" href="{{ asset('css/customercart.css') }}">
<style>

</style>

<div class="cart">
    <div class="cart-title">CART</div>
    <p class="freeship">You are eligible for free shipping.</p>

    @if(session('cart') && count(session('cart')) > 0)
        @php $total = 0; @endphp

        <table class="cart-table">
            <thead>
                <tr>
                    <th style="width: 50%;">Product</th>
                    <th style="width: 25%;">Quantity</th>
                    <th style="width: 25%; text-align:right;">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $id => $item)
                    @php $lineTotal = $item['price'] * $item['quantity']; @endphp
                    <tr>
                        <td>
                            <div class="cart-product">
@php
    // Assume image is stored in 'products/' inside 'storage/app/public'
    $imageExists = isset($item['image']) && Storage::disk('public')->exists('products/' . $item['image']);
    $imagePath = $imageExists
        ? asset('images/giftcard.jpg')
        : asset('storage/' . $item['image']); // fallback
@endphp



<img src="{{ $imagePath }}" alt="{{ $item['product_name'] }}">
<!-- <pre>{{ print_r($item, true) }}</pre> -->

                                <div>
                                    <div class="product-name">{{ $item['product_name'] }}</div>
                                    <div class="product-price">{{ number_format($item['price']) }} MMK</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="quantity-control">
                            <form action="{{ route('cart.update', $id) }}" method="POST">
                                @csrf
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" onchange="this.form.submit()">
                            </form>

                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="remove-link">Remove</button>
                                </form>
                            </div>
                        </td>
                        <td style="text-align:right;">{{ number_format($lineTotal) }} MMK</td>
                    </tr>
                    @php $total += $lineTotal; @endphp
                @endforeach
            </tbody>
        </table>

        <div class="total">
            Total: {{ number_format($total) }} MMK
            <p class="tax">Tax included</p>
            <a href="{{ route('checkout') }}" class="checkout-btn">Checkout</a>
        </div>
    @else
        <div class="empty-cart">Your cart is currently empty.</div>
    @endif
</div>
@endsection
