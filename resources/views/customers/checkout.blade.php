@extends('layouts.ctmindex')
@section('content')

<style>
    body {
        background-color: #0f0f0f;
        color: #fff;
        font-family: 'Inter', sans-serif;
        margin: 0;
        padding: 0;
    }

    .checkout-container {
        display: flex;
        max-width: 1200px;
        margin: 145px auto 40px;
        gap: 40px;
    }

    .checkout-left{
        flex: 1;
        margin-left: 40px;
    }
    .checkout-right {
        flex: 1;
    }

    .checkout-left input {
        width: 75%;
        padding: 12px;
        margin-bottom: 20px;
        border: 1px solid #555;
        background-color: transparent;
        color: #fff;
    }

    .checkout-left h2, .checkout-left h4 {
        margin-bottom: 15px;
    }
    .checkout-left label{

        font-size: 12px;
    }

    .checkout-left button {
        width: 80%;
        padding: 14px;
        background-color: #541c1c;
        color: #fff;
        border: none;
        font-weight: bold;
        margin-top: 10px;
        cursor: pointer;
    }

    .checkout-left button:hover {
        background-color: #6a2424;
    }

    .checkout-right .item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
    }
    .checkout-right .product-info p{
        margin: 0;
        font-size: 11px;
        color: #999;
    }

    .checkout-right .summary {
        padding-top: 20px;
        margin-top: 30px;
    }

    .checkout-right .summary div {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }
.checkout-right .summary .top{
    border-top: 2px solid #333;
    padding-top: 10px;

}

    .product-img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        margin-right: 20px;
    }

    .product-row {
        display: grid;
        grid-template-columns: repeat(3,1fr);
        align-items: center;
        justify-content: space-between;
        margin: 0 0 10px 0;
        text-align: center;
    }

    .product-info {
        display: flex;
        font-size: 14px;
        align-items: center
    }
    .product-info .quantity {
        text-align: center;
        margin-right: 20px;
    }
    .product-info .price {
        width: 70px;
        text-align: right;
    }

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
                    <img class="product-img" src="{{ asset('storage/' . $item['image']) }}" alt="Product Image">
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
