<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Shwe Luck San')</title>
    <link rel="icon" href="images/title.png" type="image">

    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<button class="hamburger" id="hamburgerBtn">
    <i class="fas fa-bars"></i>
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

    </main>

</body>
</html>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const avatar = document.getElementById('adminAvatar');
        const dropdown = document.getElementById('adminDropdown');
        const sidebar = document.querySelector('.admin-sidebar');
        const hamburgerBtn = document.getElementById('hamburgerBtn');

        avatar.addEventListener('click', function (e) {
            e.stopPropagation();
            dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
        });

        document.addEventListener('click', function (e) {
            if (!dropdown.contains(e.target) && e.target !== avatar) {
                dropdown.style.display = 'none';
            }
        });

        // Hamburger toggle
        hamburgerBtn.addEventListener('click', function () {
            sidebar.classList.toggle('active');
        });
    });
</script>
