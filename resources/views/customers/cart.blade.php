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

    .cart {
        max-width: 1000px;
        margin: 140px auto 60px;
        padding: 20px;
    }

    .cart-title {
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        letter-spacing: 1px;
    }

    .freeship {
        text-align: center;
        font-size: 12px;
        color: #cfcfcf;
        margin-bottom: 30px;
    }

    .cart-table {
        width: 100%;
        border-collapse: collapse;
        color: #e0e0e0;
        table-layout: fixed;
    }

    .cart-table thead {
        display: table;
        width: 100%;
        table-layout: fixed;
    }

    .cart-table tbody {
        display: block;
        max-height: 350px;
        overflow-y: auto;
        width: 100%;
    }

    .cart-table tbody tr {
        display: table;
        width: 100%;
        table-layout: fixed;
    }

    .cart-table th,
    .cart-table td {
        padding: 15px 10px;
        border-bottom: 1px solid #222;
        vertical-align: middle;
    }

    .cart-table th {
        font-size: 13px;
        text-align: left;
        color: #aaa;
        text-transform: uppercase;
    }

    .cart-product {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .cart-product img {
        width: 85px;
        height: 85px;
        object-fit: cover;
        border-radius: 6px;
        background: #222;
    }

    .product-name {
        font-size: 14px;
        font-weight: 500;
        color: #f1f1f1;
    }

    .product-price {
        font-size: 13px;
        color: #999;
    }

    .quantity-control {
        display: flex;
        flex-direction: column;
        align-items: center;

    }

    .quantity-control input[type="number"] {
        width: 25px;
        padding: 5px;
        background: #1e1e1e;
        color: #fff;
        border: 1px solid #444;
        border-radius: 4px;
        text-align: center;
    }

    .remove-link {
        background: none;
        border: none;
        color: #999;
        text-decoration: underline;
        font-size: 12px;
        cursor: pointer;
    }

    .remove-link:hover {
        color: #ff4444;
    }

    .total {
        font-size: 18px;
        font-weight: bold;
        text-align: right;
        color: #f1f1f1;
        border-top: 1px solid #333;
        padding-top: 20px;
        margin-top: 20px;
    }

    .tax {
        color: #606060;
        font-size: 12px;
    }

    .empty-cart {
        color: #888;
        text-align: center;
        font-size: 16px;
        margin-top: 120px;
    }

    .checkout-btn {
        background-color: #541c1c;
        color: #e0e0e0;
        text-decoration: none;
        font-size: 12px;
        padding: 10px 20px;
        text-transform: uppercase;
        margin-top: 10px;
        display: inline-block;
    }

    .checkout-btn:hover {
        background-color: #7a1c1c;
        color: #fff;
    }
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
                                <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['product_name'] }}">
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
