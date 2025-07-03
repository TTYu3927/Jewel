@extends('layouts.ctmindex')
@section('content')

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
          body {
        margin: 0;
        font-family: 'Inter', sans-serif;
        background-color: #070707;
        color: #fff;
      }

      .top-banner {
        text-align: center;
        background-color: #070707;
        color: #ccc;
        font-size: 11px;
        width: 100%;
      }
      .main-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #070707;
        padding: 20px 50px;
      }

      .logo {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        margin-left: 450px;
      }


      .logo .title h1 {
        margin: 0;
        color: #f5c012;
        font-size: 25px;
      }

      .logo .title p {
        margin-left: 50px;
        color: #ccc;
        font-size: 12px;
      }
      
      .icons i {
        color: #f5c012;
        font-size: 18px;
        margin-left: 20px;
        cursor: pointer;
      }

      .navbar {
        display: flex;
        justify-content: center;
        gap: 25px;
        background-color: #070707;
        padding: 15px 0;
        border-bottom: 1px solid #333;
      }


      .navbar a {
        color: #fff;
        text-decoration: none;
        font-size: 14px;
      }

      .navbar a:hover {
        color: #f5c012;
      }

      .content {
        display: flex;
        justify-content: space-between;
        padding: 173px;
      }

      .left-content {
        max-width: 50%;
        padding-right: 40px;
        width: 250px;
      }

      .left-content p {
        font-style: italic;
        font-size: 22px;
        line-height: 1.6;
        margin-bottom: 30px;
      }

      .features {
        list-style: none;
        padding: 30px;
        color: #f5c012;
      }

      .features li {
        margin-bottom: 10px;
        font-size: 16px;
        margin-left: 30px;
      }

      .features i {
        margin-right: 10px;
      }

      .right-content {
        min-height: 300px;
        display: flex;
        flex-direction: row;
        justify-content: flex-end;   
      }

      main {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
      }

</style>

@section('content')
 <main class="content">
    <div class="left-content">
      <p>
        “ Elevate your elegance and
        express your confidence with
        Shwe San Eain’s timeless
        jewellery.”
      </p>

      <ul class="features">
        <li><i class="fa-solid fa-gem"></i> 999 24k fine gold</li>
        <li><i class="fa-solid fa-gem"></i> 18k gold jewellery</li>
        <li><i class="fa-solid fa-gem"></i> Diamond jewelery</li>
      </ul>
    </div>

    <div class="right-content">
      <img src="images/t12.jpg" alt="Image" style="width: 75%; height: auto; border-radius: 10px;">

    </div>
  </main>

@endsection

 
