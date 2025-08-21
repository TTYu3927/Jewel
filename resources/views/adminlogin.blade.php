<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Shwe Luck San')</title>
    <link rel="icon" href="images/logoo.png" type="image">
    <link rel="stylesheet" href="{{ asset('css/adminlogin.css') }}">

    <title>adminpanel</title>
    <style>
</style>
</head>
<body>
    <div class="container">
        <div class="left-side">
            <img src="/images/c6.jpg" alt="Admin Login" width="30vw" height="100vh">
            </div>
        <div class="right-side">
            <img src="{{asset('images/logoo.png')}}" alt="Logo" width="70" height="75">
            <div class="title">
            <h1>SHWE LUCK SAN</h1>
            <p>Gold & Jewelry</p>
            </div>

            <div class="form">
                <h2>LOGIN</h2>
                <form action="{{route('adminlogin')  }}" method="POST">
                    @csrf
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required placeholder="Enter your email">

                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required placeholder="Enter your password">
                    <div class="forgot-password">
                        <a href="{{ route('customer.password.request') }}">Forgot Password?</a>
                    </div>

                    <button type="submit">Login</button>
                </form>
                </div>

        </div>
    </div>
</body>
</html>