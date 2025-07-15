@extends('layouts.ctmindex')
@section('content')
<link rel="stylesheet" href="{{ asset('css/shop.css') }}">
<div class="shop-wrapper">
    <div class="product-grid">
        @foreach($products as $product)
        <div class="product-card">
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->product_name }}">
    <h3>{{ strtoupper($product->product_name) }}</h3>
    <p>{{ number_format($product->sale_price) }} MMK</p>
    <a href="{{ route('products.show', $product->id) }}">
        <button class="add-to-cart-btn">Add to Cart</button>
    </a>
</div>
    @endforeach
    </div>
</div>
@endsection
