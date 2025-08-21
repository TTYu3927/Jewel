<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Shwe Luck San')</title>
  <link rel="icon" href="images/logoo.png" type="image">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/layoutadmin.css') }}">

</head>
<style>
</style>

<body>


  <main class="admin-main">

    <div>
      <aside class="admin-sidebar">
        <div class="logo">
          <img src="/images/side.png" width="55" height="60" alt="logo">
          <div class="nav-name">
            <h1>SHWE LUCK SAN</h1>
            <p>Gold & Jewelry</p>
          </div>
        </div>
        <nav>
          <ul>
            <li>
              <a href="{{ route('dashboardchart') }}" class="{{ request()->routeIs('admin.index') ? 'active' : '' }}" class="active">
                <img src="/images/image 2.png" width="24" height="24" alt="logo">
                <span>Dashboard</span>
              </a>
            </li>

            <li>
              <a href="{{ route('admin.customers') }}"
                class="{{ request()->routeIs('admin.customers') ? 'active' : '' }}" class="active">
                <img src="/images/image 1.png" width="24" height="24" alt="user">
                <span>Customers</span>
              </a>
            </li>
            <li>
              <a href="{{ route('admin.order') }}" class="{{ request()->routeIs('admin.order') ? 'active' : '' }}">
              <img src="/images/image 3.png" width="24" height="24" alt="product">
              <span>Orders</span>
              </a>
            </li>

            <hr style="width: 20%; background-color: #374151;">

            <li>
              <a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.*') ? 'active' : '' }}">
              <img src="/images/image 4.png" width="24" height="24" alt="transaction">
              <span>Products</span>
              </a>
            </li>

            <li>
              <a href="{{ route('category.index') }}" class="{{ request()->routeIs('category.*') ? 'active' : '' }}">
              <img src="/images/image 5.png" width="24" height="24" alt="settings">
              <span>Categories</span>
              </a>
            </li>

            <li>
              <a href="{{ route('employees.index') }}" class="{{ request()->routeIs('employees.*') ? 'active' : '' }}">
              <img src="/images/image 6.png" width="24" height="24" alt="transaction">
              <span>Employees</span>
              </a>
            </li>

          </ul>
        </nav>
      </aside>

    </div>
    <div class="admin-profile">

      <img src="/images/user.png" alt="admin" width="50" height="50" id="adminAvatar">
      <ul class="admin-dropdown" id="adminDropdown">
        <li><img src="/images/image 8.png" width="24" height="24" alt="logo">Edit Profile</li>
        <a href="{{ route('admin.logout') }}">
          <li><img src="/images/image 7.png" width="24" height="24" alt="logo">Logout</li>
        </a>
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
    const toggleBtn = document.querySelector("#sidebarToggle");

    avatar.addEventListener('click', function (e) {
      e.stopPropagation();
      dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
    });

    document.addEventListener('click', function (e) {
      if (!dropdown.contains(e.target) && e.target !== avatar) {
        dropdown.style.display = 'none';
      }
    });
    toggleBtn.addEventListener("click", () => {
      sidebar.classList.toggle("active");
    });

  });
</script>