<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Shwe Luck San')</title>
    <link rel="icon" href="images/logoo.png" type="image">
    <title>Document</title>
    <style>
        body {
            background-color: #070707;
            font-family: 'Inter', sans-serif;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .left-side {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .left-side img {
            width: 100%;
            height: 100vh;
        }

        .right-side {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .right-side .title h1{
            color: #f5c012;
            margin-top: 0;
            font-size: 25px;
            margin-bottom: 0;

        }

        .right-side .title p {
            font-size: 12px;
            color: #ccc;
            text-align: center;
            margin-top: 0px;
            margin-bottom: 20px;
        }

        .form {
            width: 100%;
            max-width: 400px;
            background-color: #1a1a1a;
            padding: 40px;
            
        }

        .form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form label {
            display: block;
            margin-bottom: 5px;
        }

        .form input[type="email"],
        .form input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: 1px solid #444;
            background-color: transparent;
            color: #fff;
        }

        .form button {
            width: 100%;
            padding: 10px;
            background-color: #541c1c;
            color: white;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }

        .form button:hover {
            background-color: #541c1c;
        }
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
                        <a href="#" style="color: #444; text-decoration: none;">Forgot Password?</a>
                    </div>

                    <button type="submit">Login</button>
                </form>
                </div>

        </div>
    </div>
</body>
</html>