@extends('admin.index')
@section('title', 'Edit Product')
@section('content')

    <style>
        form {
            display: flex;
            max-width: 900px;
            margin: auto;
            padding: 17px;
            border: none;
            border-radius: 5px;
            background-color: #181818;
            gap: 95px;
        }

        .formleft,
        .formright {
            flex: 1;
            padding: 20px;
            background-color: #181818;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #dfdeda;
        }

        input[type="text"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #7C7C7C;
            border-radius: 4px;
            background-color: transparent;
            color: #dfdeda;
            font-size: 14px;
        }

        button {
            background-color: #541c1c;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            font-size: 11px;
        }

        button:hover {
            background-color: #6a2525;
        }

        .cxnl a {
            color: #dfdeda;
            text-decoration: none;
        }

        .cxnl {
            background-color: #7C7C7C;
            font-size: 11px;
        }

        .img {
            object-fit: cover;
            border-radius: 5px;
        }

        .img+label {
            display: block;
            cursor: pointer;
            color: #dfdeda;
            background-color: #541c1c;
            padding: 7px;
            font-size: 12px;
            width: calc(100% - 60%);
            margin-top: 10px;
            text-align: center;
        }

        .room {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0;
            margin-bottom: 20px;
            color: #7C7C7C;
            margin-right: 30px;
        }

        h2 {
            font-size: 16px;
            margin-top: 10px;
        }

        .room a {
            color: #7C7C7C;
            text-decoration: none;
        }

        .room i {
            color: #7C7C7C;
            font-size: 16px;
            margin-right: 10px;
            margin-top: 10px;
            margin-left: 10px;
        }

        .del {
            width: 30px;
            height: 30px;
            cursor: pointer;
            float: left;
            margin-top: 10px;
            margin-right: 10px;
            margin-left: 10px;
        }

        .formright {
            margin-top: 30px;
        }

        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-content {
            background-color: rgb(6, 6, 6);
            padding: 30px;
            border-radius: 10px;
            width: 400px;
            position: relative;
            box-shadow: 0 0 15px rgba(63, 62, 62, 0.3);
            color: #7C7C7C;
            font-family: Arial, sans-serif;
        }

        .modal-close {
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 24px;
            color: white;
            cursor: pointer;
        }
        .btndel{
            display: flex;
            justify-content: end;
            gap: 20px;
            margin-top: 20px;
            margin-left: 170px;
        }
        .btndel .cnl{
            background-color: #7C7C7C;
        }
        .modal-content form{
            background-color: transparent;
        }
        .modal-content p{
            color: #dfdeda;
            font-size: 14px;
            margin-top: 20px;
        }
    </style>

    <div class="room">
        <i class="fa-solid fa-greater-than"></i>
        <a href="{{ route('products.index') }}">
            <h2>Products</h2>
        </a>
        <i class="fa-solid fa-greater-than"></i>
        <h2>Edit</h2>
    </div>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="formleft">
            <input type="file" name="image" id="file" style="display: none;">
            <img src="/images/camera.png" alt="preview" class="img" id="preview">
            <label for="file">UPLOAD PHOTO</label>
            @error('image') <div style="color:red;">{{ $message }}</div> @enderror

            <label>Product Name:</label>
            <input type="text" name="product_name" value="{{ old('product_name', $product->product_name) }}">
            @error('product_name') <div style="color:red;">{{ $message }}</div> @enderror

            <label>Product Category:</label>
            <select name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <label>Karats:</label>
            <select name="karats">
                <option value="14K" {{ $product->karats == '14K' ? 'selected' : '' }}>14K</option>
                <option value="18K" {{ $product->karats == '18K' ? 'selected' : '' }}>18K</option>
                <option value="24K" {{ $product->karats == '24K' ? 'selected' : '' }}>24K</option>
            </select>

            <label>Description:</label>
            <textarea name="description">{{ old('description', $product->description) }}</textarea>

            <a href="#" class="delete-link" onclick="openDeleteModal(event)">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="none" viewBox="0 0 40 40">
                    <path
                        d="M11.6665 35C10.7498 35 9.9654 34.6739 9.31318 34.0217C8.66095 33.3694 8.33429 32.5844 8.33318 31.6667V10C7.86095 10 7.4654 9.84 7.14651 9.52C6.82762 9.2 6.66762 8.80444 6.66651 8.33333C6.6654 7.86222 6.8254 7.46667 7.14651 7.14667C7.46762 6.82667 7.86318 6.66667 8.33318 6.66667H14.9998C14.9998 6.19444 15.1598 5.79889 15.4798 5.48C15.7998 5.16111 16.1954 5.00111 16.6665 5H23.3332C23.8054 5 24.2015 5.16 24.5215 5.48C24.8415 5.8 25.001 6.19556 24.9998 6.66667H31.6665C32.1387 6.66667 32.5348 6.82667 32.8548 7.14667C33.1748 7.46667 33.3343 7.86222 33.3332 8.33333C33.3321 8.80444 33.1721 9.20056 32.8532 9.52167C32.5343 9.84278 32.1387 10.0022 31.6665 10V31.6667C31.6665 32.5833 31.3404 33.3683 30.6882 34.0217C30.036 34.675 29.251 35.0011 28.3332 35H11.6665ZM28.3332 10H11.6665V31.6667H28.3332V10ZM16.6665 28.3333C17.1387 28.3333 17.5348 28.1733 17.8548 27.8533C18.1748 27.5333 18.3343 27.1378 18.3332 26.6667V15C18.3332 14.5278 18.1732 14.1322 17.8532 13.8133C17.5332 13.4944 17.1376 13.3344 16.6665 13.3333C16.1954 13.3322 15.7998 13.4922 15.4798 13.8133C15.1598 14.1344 14.9998 14.53 14.9998 15V26.6667C14.9998 27.1389 15.1598 27.535 15.4798 27.855C15.7998 28.175 16.1954 28.3344 16.6665 28.3333ZM23.3332 28.3333C23.8054 28.3333 24.2015 28.1733 24.5215 27.8533C24.8415 27.5333 25.001 27.1378 24.9998 26.6667V15C24.9998 14.5278 24.8398 14.1322 24.5198 13.8133C24.1998 13.4944 23.8043 13.3344 23.3332 13.3333C22.8621 13.3322 22.4665 13.4922 22.1465 13.8133C21.8265 14.1344 21.6665 14.53 21.6665 15V26.6667C21.6665 27.1389 21.8265 27.535 22.1465 27.855C22.4665 28.175 22.8621 28.3344 23.3332 28.3333Z"
                        fill="#9D0000" />
                </svg>
            </a>
        </div>

        <div class="formright">
            <label>Target Gender:</label>
            <select name="Gender">
                <option>Select Target Gender</option>
                <option value="Female" {{ $product->Gender == 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Male" {{ $product->Gender == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Unisex" {{ $product->Gender == 'Unisex' ? 'selected' : '' }}>Unisex</option>
            </select>

            <label>Product Code:</label>
            <input type="text" name="product_code" value="{{ old('product_code', $product->product_code) }}">
            @error('product_code') <div style="color:red;">{{ $message }}</div> @enderror

            <label>Purchased Price:</label>
            <input type="number" name="purchased_price" value="{{ old('purchased_price', $product->purchased_price) }}">

            <label>Sale Price:</label>
            <input type="number" name="sale_price" value="{{ old('sale_price', $product->sale_price) }}">

            <label>Stock Quantity:</label>
            <input type="number" name="stock_qty" value="{{ old('stock_qty', $product->stock_qty) }}">

            <button type="button" class="cxnl" onclick="window.location='{{ route('products.index') }}'">CANCEL</button>
            <button type="submit">SAVE</button>
        </div>
    </form>

    <div class="modal-overlay" id="deleteModal">
        <div class="modal-content">
            <span class="modal-close" onclick="closeDeleteModal()">&times;</span>
            <h2>DELETE PRODUCT</h2>
            <p>Are you sure you want to delete this product?</p>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" id="deleteForm">
                @csrf
                @method('DELETE')
                <div class="btndel">
                <button type="button" onclick="closeDeleteModal()" class="cnl">CANCEL</button>
                <button type="submit">DELETE</button>
                </div>
            </form>
        </div>
    </div>

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

        function openDeleteModal(event) {
            event.preventDefault();
            document.getElementById('deleteModal').style.display = 'flex';
        }
        function closeDeleteModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }
    </script>
@endsection