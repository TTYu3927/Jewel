@extends('layouts.index')
@section('title', 'Products')
@section('content')

<style>
    h1 {
    font-size: 16px;
    margin-bottom: 20px;
    color: #7C7C7C;
}

.btn-add {
    display: inline-block;
    margin-bottom: 20px;
    background-color: #541C1C;
    color: white;
    padding: 8px 12px;
    text-decoration: none;
    margin-top: 15px;
    margin-right: 30px;
}

a.btn-add {
    text-decoration: none;
}

.dlt {
    width: 30px;
    height: 30px;
    cursor: pointer;
    float: left;
    margin-top: 10px;
    margin-right: 10px;
    margin-left: 10px;
}

.category-table {
    width: 100%;
    border-collapse: collapse;
}

.category-table th {
    padding: 12px;
    border: 1px solid #787878;
    text-align: left;
    color: #787878;
    border-left: none;
    border-right: none;
    font-size: 11px;
}

.category-table td {
    padding: 12px;
    border: 1px solid #787878;
    border-radius: 1px;
    text-align: left;
    color: #dfdeda;
    border-left: none;
    border-right: none;
    font-size: 12px;
}

form {
    display: inline;
}

.admin-header {
    display: flex;
    justify-content: start;
    align-items: center;
    margin-bottom: 20px;
    margin-left: 20px;
}

.admin-header h1 {
    font-size: 16px;
    color: #7C7C7C;
    margin: 0;
    margin-right: 30px;
}

.admin-header i {
    color: #7C7C7C;
    font-size: 16px;
    margin-right: 10px;
}

.admin-header a.btn-add {
    font-size: 10px;
    color: #dfdeda;
}

.opt {
    /* margin-left: 400px; */
    background: transparent;
    outline: none;
    padding: 2px;
    color: #787878;
}

.opt select {
    background-color: #2a2a2a;
    border: none;
    color: #dfdeda;
    padding: 7px;
    font-size: 12px;
}

.opt select option {
    color: #D4AF37;
}

.opt select:hover {
    background-color: #3a3a3a;
}

.opt select:focus {
    outline: none;
    border: 1px solid #D4AF37;
}

.opt select i {
    color: #D4AF37;
    margin-left: 5px;
}

.admin-search-bar {
    display: flex;
    align-items: center;
    padding: 5px;
    border: 1px solid #787878;
}

form.admin-search-bar {
    margin-left: auto;
    margin-right: 20px;
    background: transparent;
    outline: none;
    padding: 2px;
    color: #787878;
}

.admin-search-bar input {
    background-color: transparent;
    border: none;
}

.admin-search-bar input::placeholder {
    color: #dfdeda;
    font-size: 12px;
}

.pagination {
    display: flex;
    justify-content: center;
    margin-top: 70px;
    color: #dfdeda;
    font-size: 14px;
    position: block;
}

.pagination a {
    color: #dfdeda;
    text-decoration: underline;
    padding: 8px 12px;
    margin: 0 5px;
}
.pagination .page-item:first-child,
.pagination .page-item:last-child,
.pagination .pagination-summary {
display: none !important;
}
.pagination .page-item.active a {
    background-color: #D4AF37;
    color: #2a2a2a;
    border-radius: 5px;
}
.pagination .page-item a {
    color: #dfdeda;
    padding: 8px 12px;
    margin: 0 5px;
}
.pagination p{
    display: none;
}


tr {
    cursor: pointer;
}

th, td {
    text-align: center;
}

.category-table th select,
.category-table td select {
    background-color: transparent;
    border: none;
    color: #787878;
    font-size: 12px;
    padding: 5px;
}

.category-table th select:hover,
.category-table td select:hover {
    background-color: none;
}

.category-table th select:focus,
.category-table td select:focus {
    outline: none;
    border: none;
}
</style>



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
