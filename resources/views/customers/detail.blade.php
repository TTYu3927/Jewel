@extends('layouts.ctmindex')

@section('content')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">

<div class="detail-container">
    <div class="detail-image">
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->product_name }}">
    </div>

    <div class="detail-info">
        <h1>{{ strtoupper($product->product_name) }}</h1>
        <p class="price">{{ number_format($product->sale_price) }} MMK</p>
        <p class="stock">Stock: {{ $product->stock_qty }} left</p>
        <p>Metal: {{ $product->karats }}</p>


            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <div class="quantity">
            <label for="qty">Qty:</label>
            <input type="number" id="qty" name="quantity" value="1" min="1" max="{{ $product->stock_qty }}">
        </div>
            <button class="add-to-cart-btn" type="submit">Add to Cart</button>
            </form>
            
        <hr class="separator1">
        <p class="dcp">DESCRIPTION: {{ $product->description}}</p>
        <hr class="separator2">
        <p>SHIPPING & RETURNS:  <br>
        Orders are processed within 1-3 business days. <br>
        In-store pick-up is available for Yangon and Mandalay. <br>
        Please contact us at shwelucksan@gmail.com  </p>

    </div>
</div>
<h3>Discover More</h3>
<div class="product-grid">
    @foreach($related as $item)
        <div class="product-card">
            <a href="{{ route('products.show', $item->id) }}">
                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->product_name }}">
                <h4>{{ strtoupper($item->product_name) }}</h4>
            </a>
        </div>
    @endforeach

</div>
@endsection
