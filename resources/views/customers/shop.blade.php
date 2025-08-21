@extends('layouts.ctmindex')
@section('content')
<link rel="stylesheet" href="{{ asset('css/shop.css') }}">


<div class="filter-sort-bar">
    <form id="filterForm" action="{{ route('customers.shop') }}" method="GET" class="filterform">
        <div class="sort-by">
            <select name="sort" onchange="document.getElementById('filterForm').submit()">
                <option value="">SORT BY:</option>
                <option value="price_asc" {{ request('sort')=='price_asc' ? 'selected' : '' }}>Price: Low → High</option>
                <option value="price_desc" {{ request('sort')=='price_desc' ? 'selected' : '' }}>Price: High → Low</option>
                <option value="name_asc" {{ request('sort')=='name_asc' ? 'selected' : '' }}>Name: A → Z</option>
                <option value="name_desc" {{ request('sort')=='name_desc' ? 'selected' : '' }}>Name: Z → A</option>
            </select>
        </div>

        <div class="filter-by">
            <select name="category" onchange="document.getElementById('filterForm').submit()">
                <option value="all">All Categories</option>
                <option value="new_arrivals" {{ request('category')=='new_arrivals' ? 'selected' : '' }}>New Arrivals</option>
                <option value="best_sellers" {{ request('category')=='best_sellers' ? 'selected' : '' }}>Best Sellers</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category')==$cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </form>
</div>

<div class="shop-wrapper">
    <div class="product-grid">
        @foreach($products as $product)
        <div class="product-card">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->product_name }}">
            <h3>{{ strtoupper($product->product_name) }}</h3>
            <p>{{ number_format($product->sale_price) }} MMK</p>
            <p class="stock">Stock: {{ $product->stock_qty }} left</p>
            <a href="{{ route('products.show', $product->id) }}">
                <button class="add-to-cart-btn">Add to Cart</button>
            </a>
        </div>
    @endforeach
    </div>
</div>
@endsection
