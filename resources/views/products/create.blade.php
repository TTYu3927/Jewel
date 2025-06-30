@extends('admin.index')
@section('title', 'Create Product')
@section('content')

<link rel="stylesheet" href="{{ asset('css/procreate.css') }}">

<div class="room">
    <i class="fa-solid fa-greater-than"></i>
    <a href="{{ route('products.index') }}"><h2>Products</h2></a>
    <i class="fa-solid fa-greater-than"></i>
    <h2>Create New Product</h2>
</div>


<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="formleft">

    <input type="file" name="image" id="file" style="display: none;">
    <img src="/images/camera.png" alt="preview" class="img" id="preview">
    <label for="file">UPLOAD PHOTO</label>
    @error('image') <div style="color:red;">{{ $message }}</div> @enderror

    <label>Product Name:</label>
    <input type="text" name="product_name" value="{{ old('product_name') }}">
    @error('product_name') <div style="color:red;">{{ $message }}</div> @enderror

    <label>Product Category:</label>
    <select name="category_id">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>

    <label>Karats:</label>
    <select name="karats">
        <option value="14K">14K</option>
        <option value="18K">18K</option>
        <option value="24K">24K</option>
    </select>

    <label>Description:</label>
    <textarea name="description">{{ old('description') }}</textarea>

    </div>

    <div class="formright">
    
    <label>Target Gender:</label>
    <select name="Gender">
        <option>Select Target Gender</option>
        <option value="">Female</option>
        <option value="">Male</option>
        <option value="">Unisex</option>
    </select>

    <label>Product Code:</label>
    <input type="text" name="product_code" value="{{ old('product_code') }}">
    @error('product_code') <div style="color:red;">{{ $message }}</div> @enderror

    <label>Purchased Price:</label>
    <input type="number" name="purchased_price" value="{{ old('purchased_price') }}">

    <label>Sale Price:</label>
    <input type="number" name="sale_price" value="{{ old('sale_price') }}">

    <label>Stock Quantity:</label>
    <input type="number" name="stock_qty" value="{{ old('stock_qty') }}">

    <button type="submit" class="cxnl"><a href="{{ route('products.index') }}">CANCEL</a></button>
    <button type="submit">CREATE</button>

    </div>
</form>

<script>
document.getElementById('file').addEventListener('change', function (event) {
    const image = document.querySelector('.img');
    const file = event.target.files[0];

    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();

        reader.onload = function (e) {
            image.src = e.target.result;
            image.style.display = 'block';
            image.style.width = '100px';
            image.style.height = '80px';
            image.style.objectFit = 'cover';
        };

        reader.readAsDataURL(file);
    } else {
        image.src = '';
        alert('Please upload a valid image file.');
    }
});
</script>
@endsection
