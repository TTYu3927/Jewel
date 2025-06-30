<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Shwe Luck San')</title>
    <link rel="icon" href="images/logoo.png" type="image">

    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<button id="admin-hamburger" class="admin-hamburger" aria-label="Toggle sidebar">
        <span></span>
        <span></span>
        <span></span>
    </button>

    <aside class="admin-sidebar">
    <div class="logo">
        <img src="/images/image.png" width="55" height="60" alt="logo">
        <div class="nav-name">
            <h1>SHWE LUCK SAN</h1>
            <p>Gold & Jewelry</p>
        </div>
    </div>
    <nav>
        <ul>
            <li>
                <img src="/images/image 2.png" width="24" height="24" alt="logo">
                <a href="{{ route('admin.index') }}">Dashboard</a>
            </li>
            <li>
                <img src="/images/image 1.png" width="24" height="24" alt="user">
                <a href="#">Customers</a>
            </li>
            <li>
                <img src="/images/image 3.png" width="24" height="24" alt="product">
                <a href="#">Orders</a>
            </li>
            <hr style="width: 20%; background-color: #374151;">
            <li>
                <img src="/images/image 4.png" width="24" height="24" alt="transaction">
                <a href="#">Products</a>
            </li>
            <li>
                <img src="/images/image 5.png" width="24" height="24" alt="settings">
                <a href="{{ route('category.index') }}">Categories</a>
            </li>
            <li>
                <img src="/images/image 6.png" width="24" height="24" alt="transaction">
                <a href="#">Employees</a>
            </li>
        </ul>
        </nav>
    </aside>
    <main class="admin-main">
        <div class="admin-profile">
            <img src="/images/user.png" alt="admin" width="50" height="50" id="adminAvatar">
            <ul class="admin-dropdown" id="adminDropdown">
                <li><img src="/images/image 8.png" width="24" height="24" alt="logo">Edit Profile</li>
                <li><img src="/images/image 7.png" width="24" height="24" alt="logo">Logout</li>
            </ul>
        </div>
        <div class="admin-content">
        @yield('content')
        </div>

    @stack('scripts')
    </main>

</body>
</html>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const avatar = document.getElementById('adminAvatar');
            const dropdown = document.getElementById('adminDropdown');

            avatar.addEventListener('click', function (e) {
                e.stopPropagation();
                dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
            });

            document.addEventListener('click', function (e) {
                if (!dropdown.contains(e.target) && e.target !== avatar) {
                    dropdown.style.display = 'none';
                }
            });
        });
    </script>
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

        .dlt{
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
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
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
        .opt{
            margin-left: 400px;
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
            margin-top: 20px;
            margin-bottom: 20px;
            color: #dfdeda;
            font-size: 10px;
            position: block;
        }

        .pagination a {
            color: #dfdeda;
            text-decoration: underline;
            padding: 8px 12px;
            margin: 0 5px;
        }
        tr{
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