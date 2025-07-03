<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SHWE LUCK SAN</title>
  <link rel="stylesheet" href="style.css">
  <link rel="icon" href="images/logoo.png" type="image/png">
  <link href="{{ asset('css/layouts.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<style>
    .site-footer {
    background: url('{{ asset("images/footer.jpg") }}') no-repeat center center;
    background-size: cover;
    margin-top: 60px;
    color: #eee;
    font-size: 14px;
  }

</style>
<body>

<div class="container">
<div class="top-banner">
  <p>Free Shipping On Over 1,000,000 MMK</p>
  </div>

  <header class="main-header">
    <div class="logo">
      <img src="{{asset('images/logoo.png')}}" alt="Logo" width="55" height="55">
      <div class="title">
      <a href="{{ route('customers.index') }}" style="text-decoration: none; cursor: pointer;"><h1>SHWE LUCK SAN</h1></a>
      <p>Gold & Jewelry</p>
      </div>
    </div>
    <div class="icons">
    <a href="{{ route('register.form') }}"><i class="fa-regular fa-user"></i></a>
    <i class="fa-solid fa-magnifying-glass"></i>
      <i class="fa-solid fa-bag-shopping"></i>
    </div>
  </header>

  <nav class="navbar">
    <a href="#">GIFT GUIDE</a>
    <a href="#">SHOP BY COLLECTION</a>
    <a href="#">EARRINGS</a>
    <a href="#">NECKLACES</a>
    <a href="#">BRACELETS</a>
    <a href="#">RINGS</a>
    <a href="#">CONTACT US</a>
  </nav>
</div>
  @yield('content')

  <footer class="site-footer" >
  <div class="footer-overlay">
    <div class="footer-content-wrapper">

    <div class="footer-columns">
      <div class="footer-column">
        <h4>INFORMATION</h4>
        <ul>
          <li><a href="#">Contact</a></li>
          <li><a href="#">FAQs</a></li>
          <li><a href="#">Ring Size Guide</a></li>
          <li><a href="#">Care & Services</a></li>
        </ul>
      </div>
      <div class="footer-column">
        <h4>ABOUT</h4>
        <ul>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Gift Cards</a></li>
          <li><a href="#">Private Shopping</a></li>
        </ul>
      </div>
      <div class="footer-column">
        <h4>POLICIES</h4>
        <ul>
          <li><a href="#">Shipping & Returns</a></li>
          <li><a href="#">Terms</a></li>
          <li><a href="#">Privacy</a></li>
        </ul>
      </div>
    </div>
    <div class="map-box">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26974.085380188615!2d96.1563722782086!3d16.80950442485026!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1ecc8f3749e61%3A0x9e8be4b57c0f92d1!2sTamwe%20Township%2C%20Yangon!5e1!3m2!1sen!2smm!4v1751425286379!5m2!1sen!2smm" 
      width="100" height="50" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>


  </div>
  <div class="footer-social">
    <div class="icon">
  <i class="fa-brands fa-facebook-f fa-xl" style="color: #fcfcfd;"></i>
    </div>
    <i class="fa-brands fa-square-instagram fa-2xl" style="color: #e74d4d; "></i>
    <i class="fa-brands fa-tiktok fa-2xl"></i>
    </div>

  </div>
  </footer>
  <div class="footer-bottom">
      <p>&copy; 2025 - SHWE LUCK SAN</p>
    </div>

</body>
</html>
