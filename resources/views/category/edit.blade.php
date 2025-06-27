@extends('admin.index')
@section('title', 'Categories')
@section('content')


<style>
.modal-overlay {
    display: none;
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0, 0, 0, 0.6);
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

.modal-content {
    background-color: #060606;
    padding: 30px;
    border-radius: 10px;
    width: 400px;
    position: relative;
    box-shadow: 0 0 15px rgba(63, 62, 62, 0.3);
    color: #7C7C7C;
}

.modal-content h2 {
    margin-bottom: 20px;
    font-size: 16px;
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

.modal-content button {
    padding: 10px 16px;
    border: none;
    border-radius: 4px;
    margin-left: 10px;
    float: right;
}

.modal-content button[type="submit"] {
    background-color: #541C1C;
    color: white;
}

.modal-content button[type="button"] {
    background-color: #7C7C7C;
    color: white;
}

.modal-close {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 20px;
    color: #aaa;
    cursor: pointer;
}
</style>
            
</head>
<body>
<!-- EDIT Modal -->
<div class="modal-overlay" id="editModal">
    <div class="modal-content">
        <span class="modal-close" onclick="closeEditModal()">&times;</span>
        <h2>EDIT CATEGORY</h2>

        <form action="" id="editForm" method="POST">
            @csrf
            @method('PUT')

            <label for="editName">Category Name:</label>
            <input type="text" name="name" id="editName" required>

            <button type="submit">Update</button>
            <button type="button" onclick="closeEditModal()">Cancel</button>
        </form>
    </div>
</div>
</body>
</html>
<script>
    function openEditModal(id, name) {
        document.getElementById('editName').value = name;
        document.getElementById('editForm').action = `/category/${id}`;
        document.getElementById('editModal').style.display = 'flex';
    }

    function closeEditModal() {
        document.getElementById('editModal').style.display = 'none';
    }

    window.onclick = function(event) {
        const modal = document.getElementById('editModal');
        if (event.target === modal) {
            closeEditModal();
        }
    };
</script>
