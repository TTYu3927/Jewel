@extends('layouts.index')
@section('title', 'Categories')
@section('content')
<link rel="stylesheet" href="{{ asset('css/category.css') }}">

    <div class="admin-header">
        <i class="fa-solid fa-greater-than"></i>
        <h1 class="h1">Categories</h1>
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
            <tr onclick="openEditModal({{ $category->id }}, '{{ addslashes($category->name) }}')">
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

            <form action="{{ route('category.store') }}" method="POST">
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

    
    <div class="modal-overlay" id="editModal">
    <div class="modal-content">
        <span class="modal-close" onclick="closeEditModal()">&times;</span>
        <h2>EDIT CATEGORY</h2>

        <form id="editForm" method="POST">
            @csrf
            @method('PUT')

            <label for="editName">Category Name:</label>
            <input type="text" name="name" id="editName" required>
            <img src="images/delete.png" class="dlt" alt="delete" onclick="openDeleteModal()">
            <button type="submit">Update</button>
            <button type="button" onclick="closeEditModal()">Cancel</button>
        </form>
    </div>
</div>

    <div class="modal-overlay" id="deleteModal">
        <div class="modal-content">
            <span class="modal-close" onclick="closeDeleteModal()">&times;</span>
            <h2>DELETE CATEGORY</h2>
            <p>Are you sure you want to delete this category?</p>
            <form action="" method="POST" id="deleteForm">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
                <button type="button" onclick="closeDeleteModal()">Cancel</button>
            </form>
        </div>
    </div>


    <script>
    let currentEditId = null;

    function openModal() {
        const modal = document.getElementById('modal');
        document.getElementById('name').value = '';
        modal.style.display = 'flex';
        setTimeout(() => document.getElementById('name').focus(), 100);
    }

    function closeModal() {
        document.getElementById('modal').style.display = 'none';
    }

    function openEditModal(id, name) {
        currentEditId = id;
        document.getElementById('editName').value = name;
        document.getElementById('editForm').action = `/category/${id}`;
        document.getElementById('editModal').style.display = 'flex';
    }

    function closeEditModal() {
        document.getElementById('editModal').style.display = 'none';
    }

    function openDeleteModal() {
        if (currentEditId) {
            document.getElementById('deleteForm').action = `/category/${currentEditId}`;
            document.getElementById('deleteModal').style.display = 'flex';
        }
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').style.display = 'none';
    }

    window.onclick = function(event) {
        const modal = document.getElementById('modal');
        const editModal = document.getElementById('editModal');
        const deleteModal = document.getElementById('deleteModal');

        if (event.target === modal) {
            closeModal();
        }
        if (event.target === editModal) {
            closeEditModal();
        }
        if (event.target === deleteModal) {
            closeDeleteModal();
        }
    };
</script>

@endsection