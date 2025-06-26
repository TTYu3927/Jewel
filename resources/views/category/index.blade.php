@extends('admin.index')
@section('title', 'Categories')
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
    a.btn-add{
        text-decoration: none;
    }

    .category-table {
        width: 100%;
        border-collapse: collapse;
        border-color: ;
        box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }

    .category-table th{
        padding: 12px;
        border: 1px solid #787878;
        border-radius: 1px;
        text-align: left;
        color: #787878;

    }
    .category-table td {
        padding: 12px;
        border: 1px solid #787878;
        border-radius: 1px;
        text-align: left;
        color: #dfdeda;

        
    }

    .category-table th {
        border-color: #787878;
    }


    form {
        display: inline;
    }
    .admin-header{
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        margin-left: 20px;
    }
    .admin-header a.btn-add {
        font-size: 10px;
        color: #dfdeda;
    }

    .admin-search-bar {
    display: flex;
    align-items: center;
    padding: 5px;
    border: 1px solid #787878;
}
.admin-search-bar input {
    border: none;
    background: transparent;
    outline: none;
    padding: 2px;
    color: #787878;
}
.admin-search-bar input::placeholder {
    color: #dfdeda;
    font-size: 12px;
}
.pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
    margin-bottom: 20px;
    color: #dfdeda;
    font-size: 10px;
}
.pagination a {
    color: #dfdeda;
    text-decoration: underline;
    padding: 8px 12px;
    margin: 0 5px;
}
.modal-overlay {
        display: none;
        position: fixed;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    /* Modal Container */
    .modal-content {
        background-color:rgb(6, 6, 6);
        padding: 30px;
        border-radius: 10px;
        width: 400px;
        position: relative;
        box-shadow: 0 0 15px rgba(63, 62, 62, 0.3);
        color: #7C7C7C;
        font-family: Arial, sans-serif;
    }

    .modal-content h2 {
        color: #7C7C7C;
        margin-bottom: 20px;
        text-align: start;
        font-size: 16px;
    }

    .modal-content label {
        display: block;
        margin-bottom: 8px;
    }

    .modal-content input[type="text"] {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-bottom: 15px;
        color: #F8F6F2;
        background-color: transparent;
    }

    .modal-content button[type="submit"] {
        background-color: #541C1C;
        color: white;
        padding: 10px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
        margin-left: 10px;
    }
    .modal-content button[type="button"] {
        background-color: #7C7C7C;
        color: white;
        padding: 10px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
        margin-right: 10px;
    }


    .modal-content button:hover {
        background-color: #3d1414;
    }
    .modal-content button[type="button"]:hover {
        background-color: #5a5a5a;
    }

    .modal-close {
        position: absolute;
        top: 10px; right: 15px;
        font-size: 20px;
        color: #aaa;
        cursor: pointer;
    }

    .modal-close:hover {
        color: #000;
    }



</style>
<div class="admin-header">
    <h1><i class="fa-solid fa-greater-than"></i>Categories</h1>
    <a href="#" class="btn-add" onclick="openModal()"><i class="fa-solid fa-plus"></i>CREATE NEW</a>
            <form class="admin-search-bar" action="#" method="get">
                    <input type="text" placeholder="Search" name="search"><i class="fas fa-search" style="color: #D4AF37;"></i>

                </form>
</div>

<table class="category-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
            <td>{{ $category->formatted_id }}</td>
            <td>{{ $category['name'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="pagination">
    {{ $categories->links() }}
</div>

<div class="modal-overlay" id="modal">
    <div class="modal-content">
        <span class="modal-close" onclick="closeModal()">&times;</span>
        <h2>CREATE NEW CATEGORY</h2>

        <form action="{{ route('category.create') }}" method="POST">
            @csrf

            <label for="name">Category Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter category name" value="{{ old('name') }}">

            @error('name')
                <div class="error" style="color:red;">{{ $message }}</div>
            @enderror
            <button type="submit">Create</button>
            <button type="button" onclick="closeModal()" style="margin-left: 10px;">Cancel</button>
        </form>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('modal').style.display = 'flex';
    }

    function closeModal() {
        document.getElementById('modal').style.display = 'none';
    }

    window.onclick = function(event) {
        const modal = document.getElementById('modal');
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    }
</script>

@endsection

