@extends('admin.index')
@section('title', 'Products')
@section('content')

<link rel="stylesheet" href="{{ asset('css/products.css') }}">

<div class="admin-header">
    <i class="fa-solid fa-greater-than"></i>
    <h1 class="h1">Products</h1>
    <a href="{{ route('products.create') }}" class="btn-add"><i class="fa-solid fa-plus"></i> CREATE NEW</a>
    <div class="opt">
        <select onchange="filterTable('category', this.value)">
            <option value="">Select Category</option>
            @foreach ($products->pluck('category.name')->unique() as $categoryName)
                <option value="{{ $categoryName }}">{{ $categoryName }}</option>
            @endforeach
        </select>
    </div>
    <form class="admin-search-bar" action="#" method="get">
        <input type="text" placeholder="Search" name="search"><i class="fas fa-search" style="color: #D4AF37;"></i>
    </form>
</div>

<table class="category-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>IMAGE</th>
            <th>
                <select onchange="filterTable('product_name', this.value)">
                    <option value="">PRODUCT NAME</option>
                    @foreach ($products->unique('product_name') as $product)
                        <option value="{{ $product->product_name }}">{{ $product->product_name }}</option>
                    @endforeach
                </select>
            </th>
            <th>
                <select onchange="filterTable('product_code', this.value)">
                    <option value="">PRODUCT CODE</option>
                    @foreach ($products->unique('product_code') as $product)
                        <option value="{{ $product->product_code }}">{{ $product->product_code }}</option>
                    @endforeach
                </select>
            </th>
            <th>
                <select onchange="filterTable('purchased_price', this.value)">
                    <option value="">PURCHASED PRICE</option>
                    @foreach ($products->unique('purchased_price') as $product)
                        <option value="{{ $product->purchased_price }}">{{ $product->purchased_price }}</option>
                    @endforeach
                </select>
            </th>
            <th>
                <select onchange="filterTable('sale_price', this.value)">
                    <option value="">SALE PRICE</option>
                    @foreach ($products->unique('sale_price') as $product)
                        <option value="{{ $product->sale_price }}">{{ $product->sale_price }}</option>
                    @endforeach
                </select>
            </th>
            <th>
                <select onchange="filterTable('category', this.value)">
                    <option value="">CATEGORY</option>
                    @foreach ($products->pluck('category.name')->unique() as $categoryName)
                        <option value="{{ $categoryName }}">{{ $categoryName }}</option>
                    @endforeach
                </select>
            </th>
            <th>
                <select onchange="filterTable('stock_qty', this.value)">
                    <option value="">STOCK</option>
                    @foreach ($products->pluck('stock_qty')->unique() as $qty)
                        <option value="{{ $qty }}">{{ $qty }}</option>
                    @endforeach
                </select>
            </th>
        </tr>
    </thead>

    <tbody>
        @foreach ($products as $product)
        <tr onclick="window.location='{{ route('products.edit', $product->id) }}'">
            <td>{{ 'P' . str_pad($product->id, 4, '0', STR_PAD_LEFT) }}</td>
            <td>
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" width="40">
                @endif
            </td>
            <td data-column="product_name">{{ $product->product_name }}</td>
            <td data-column="product_code">{{ $product->product_code }}</td>
            <td data-column="purchased_price">{{ $product->purchased_price }}</td>
            <td data-column="sale_price">{{ $product->sale_price }}</td>
            <td data-column="category">{{ $product->category->name ?? 'N/A' }}</td>
            <td data-column="stock_qty">{{ $product->stock_qty }}</td>
            <td>{{ $product->gender }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="pagination">
    {{ $products->links() }}
</div>

<script>
    function filterTable(column, value) {
        const rows = document.querySelectorAll(".category-table tbody tr");
        rows.forEach(row => {
            const text = row.querySelector(`[data-column="${column}"]`)?.textContent.trim() || "";
            row.style.display = (!value || text === value) ? "" : "none";
        });
    }
</script>

@endsection
