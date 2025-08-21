@extends('layouts.ctmindex')
@section('content')
<link rel="stylesheet" href="{{ asset('css/layouts.css') }}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
.content {
  display: flex;
  flex-direction: row;
  justify-content: space-evenly;
  align-items: center;
  flex-wrap: wrap;
  padding: 95px 20px;
  gap: 40px;
}

.left-content {
  flex: 1;
  min-width: 280px;
  max-width: 500px;
}

.left-content p {
  font-style: italic;
  font-size: 16px;
  line-height: 1.6;
  color: #ccc;
  margin-bottom: 20px;
}

.features {
  list-style: none;
  padding: 0;
  color: #f5c012;
}

.features li {
  margin-bottom: 10px;
  font-size: 16px;
}

.features i {
  margin-right: 10px;
}
  .right-content {
    /* min-height: 300px;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: end;
    width: 400px; */

    img{
      max-width: 400px;
      /* height: 400px; */
      
    }

  }
  .right-content {
  flex: 1;
  min-width: 280px;
  max-width: 500px;
  text-align: center;
}
.right-content img {
  width: 100%;
  max-width: 400px;
  height: auto;
  border-radius: 10px;
}

  main {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
  }
  .new-arrivals {
    padding: 0 20px;
    text-align: center;
}

.section-title {
    font-size: 20px;
    color: white;
    margin-bottom: 30px;
    letter-spacing: 1px;
}

.product-grid {
    display: grid;
    grid-template-columns: repeat(4,1fr);
    gap: 40px;
    justify-content: center;
    align-items: center;
}

.product-card {
    border-radius: 10px;
    overflow: hidden;
    padding: 15px;
    transition: transform 0.3s;
}

.product-card:hover {
    transform: scale(1.05);
}

.product-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.product-card h3 {
    font-size: 14px;
    margin-top: 15px;
    min-height: 20px;
}

.product-card p {
    font-size: 13px;
    color: #ccc;
}
.featured-products {
  padding: 0 20px;
  text-align: center;
}

.section-title1 {
  font-size: 20px;
  color: white;
  margin-bottom: 30px;
  letter-spacing: 1px;
}

.product-grid1 {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
  gap: 40px;
  justify-content: center;
  align-items: center;
}

.product-card1 {
  border-radius: 10px;
  overflow: hidden;
  padding: 15px;
  transition: transform 0.3s;
  width: 100%;
}

.product-card1:hover {
  transform: scale(1.05);
}

.product-card1 img {
  width: 100%;
  height: 200px;
  object-fit: contain;
}

.product-card1 h3 {
  font-size: 14px;
  margin-top: 15px;
  min-height: 20px;
}

.product-card1 p {
  font-size: 13px;
  color: #ccc;
}
.viewbtn{
  display: flex;
  justify-content: center;
  align-items: center;
}

.viewbtn button{
  background-color: #541c1c;
  color: white;
  padding: 10px 15px;
  border: none;
  cursor: pointer;
  font-size: 11px;
}
.viewbtn a{
  text-decoration: none;
  color: white;
}
.viewbtn button:hover{
  background-color: #6a2525;
}
.intro{
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px 90px;
  background-color: transparent;
}
.left-intro{
  width: 60%;
}
.left-intro h2{
  font-size: 26px;
  color: #D4AF37;
  text-shadow: 1px 2px 3px red;
}
.left-intro p{
  /* font-size: 14px; */
  color: #7c7c7c;
  margin-top: 10px;
}
.right-intro img{
  width: 100%;
  border-radius: 20px;
}

.intro1{
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px 90px;
  background-color: transparent;
}
.right-intro1{
  width: 60%;
}
.right-intro1 h2{
  font-size: 26px;
  color: #D4AF37;
  text-shadow: 1px 2px 3px red;
}
.right-intro1 p{
  /* font-size: 14px; */
  color: #7c7c7c;
  margin-top: 10px;
}
.left-intro1 img{
  width: 100%;
  border-radius: 20px;
}
.slider-container {
  position: relative;
  overflow: hidden;
  width: 100%;
  margin-top: 90px;
}
.slider-wrapper {
  display: flex;
  width: 200%; /* 2 slides */
  transition: transform 0.7s ease-in-out;
}
.slide {
  width: 100%;
  flex-shrink: 0;
}

/* nav buttons */
.slider-nav {
  position: absolute;
  top: 50%;
  width: 100%;
  display: flex;
  justify-content: space-between;
  transform: translateY(-50%);
}
.slider-nav button {
  background: rgba(0,0,0,0.5);
  border: none;
  color: white;
  font-size: 20px;
  padding: 10px 15px;
  border-radius: 50%;
  cursor: pointer;
}
.slider-nav button:hover {
  background: rgba(0,0,0,0.8);
}
.left-content1 {
  flex: 1;
  min-width: 280px;
  max-width: 500px;
  text-align: center;
}


@media screen and (max-width: 1024px) {
  .content {
    flex-direction: column;
    height: auto;
    padding: 155px 10px;
  }

  .left-content,
  .right-content {
    width: 90%;
    padding: 10px 0;
    text-align: center;
  }

  .right-content img {
    width: 100%;
    object-fit: cover;
    background-color: #6a2525;
  }

  .intro {
    flex-direction: column;
    padding: 20px 122px;
    text-align: center;
  }

.left-intro{
    width: 100%;
    overflow: hidden;
    object-fit: cover;
  }
  .right-intro{
    width: auto;
    overflow: hidden;
    object-fit: cover;
    margin-top: 20px;

  }

  .left-intro h2 {
    font-size: 22px;
  }

  .left-intro p {
    /* font-size: 13px; */
  }
  .intro1 {
    flex-direction: column;
    padding: 20px 122px;
    text-align: center;
  }

.right-intro1{
    width: 100%;
    overflow: hidden;
    object-fit: cover;
  }
  .left-intro1{
    width: auto;
    overflow: hidden;
    object-fit: cover;
    margin-top: 20px;

  }

  .right-intro1 h2 {
    font-size: 22px;
  }

  .right-intro1 p {
    /* font-size: 13px; */
  }


  .section-title, .section-title1 {
    font-size: 18px;
  }

  .product-grid,
  .product-grid1 {
    grid-template-columns: repeat(2,1fr);
    width: 100%;
    place-items: center;
    margin: 0 auto;

  }

  .product-card img,
  .product-card1 img {
    height: 200px;
    object-fit: contain;
  }

  .viewbtn button {
    padding: 8px 12px;
    font-size: 10px;
  }
}

/* responsive */

@media screen and (max-width: 768px) {
  .content {
    flex-direction: column;
    text-align: center;
    padding: 20px;
  }

  .left-content,
  .right-content {
    width: 100%;
    padding: 0;
    text-align: center;
  }

  .left-content p {
    font-size: 13px;
  }

  .features li {
    font-size: 14px;
  }

  .right-content img {
    max-width: 90%;
    margin: auto;
  }

  .intro {
    flex-direction: column;
    padding: 10px 20px;
    text-align: center;
  }

  .left-intro h2 {
    font-size: 18px;
  }

  .left-intro p {
    /* font-size: 12px; */
  }

  .intro1 {
    flex-direction: column;
    padding: 10px 20px;
    text-align: center;
  }

  .right-intro1 h2 {
    font-size: 18px;
  }

  .right-intro1 p {
    /* font-size: 12px; */
  }

  .product-grid,
  .product-grid1 {
    grid-template-columns: repeat(1fr);
    gap: 20px;
  }

  .product-card img,
  .product-card1 img {
    height: 180px;
    object-fit: cover;
  }

  .section-title, .section-title1 {
    font-size: 16px;
  }

  .viewbtn {
    margin-top: 20px;
  }

  .viewbtn button {
    padding: 8px 12px;
    font-size: 10px;
  }
}
@media screen and (max-width: 450px) {
  .content {
    flex-direction: column;
    text-align: center;
    margin-top: 170px;
  }

  .left-content,
  .right-content {
    width: 100%;
    padding: 0 20px;
  }

  .left-content {
    order: 2;
  }

  .right-content {
    order: 1;
  }
  
}

</style>
@section('content')

<main class="slider-container">
  <div class="slider-wrapper" id="sliderWrapper">

    <!-- SLIDE 1 -->
    <div class="content slide">
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
          <li><i class="fa-solid fa-gem"></i> Diamond jewellery</li>
        </ul>
      </div>
      <div class="right-content">
        <img src="images/t12.jpg" alt="Image">
      </div>
    </div>

    <!-- SLIDE 2 -->
    <div class="content slide">
    <div class="left-content1">
        <img src="images/c13.jpg" alt="Image" width="400px" height="auto">
      </div>
      <div class="right-content">
        <img src="images/c11.jpg" alt="Image">
      </div>
    </div>

  </div>

  <!-- Navigation -->
  <div class="slider-nav">
    <button id="prevBtn"><i class="fa-solid fa-chevron-left"></i></button>
    <button id="nextBtn"><i class="fa-solid fa-chevron-right"></i></button>
  </div>
</main>

<section class="featured-products">
    <h2 class="section-title1">TIMELESS CLASSIC</h2>
    <div class="product-grid1">
        @foreach($latestProducts as $product)
        <div class="product-card1">
            <a href="{{ route('customers.shop') }}">
              <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->product_name }}">
            </a>
            <h3>{{ strtoupper($product->product_name) }}</h3>
            <p>{{ number_format($product->sale_price) }} MMK</p>
        </div>
        @endforeach
    </div>
</section>


<section class="intro1">
  <div class="left-intro1">
  <img src="images/c11.png" alt="Image" height="400px">
  </div>
  <div class="right-intro1">
  <h2>NATURAL BURMA RUBY DIAMOND EARRINGS</h2>
  
    <p style="font-size: 14px;">Elevate your elegance with our Natural Burma Ruby Diamond Earrings — a timeless blend of passion and brilliance.</br><br>
    A symbol of love and legacy, our Burma ruby earrings with diamond accents speak to those with a taste for timeless beauty.Crafted with the finest Burmese rubies and dazzling diamonds, these earrings are the epitome of luxury and heritage.</p>

</section>

  <section class="new-arrivals">
    <h2 class="section-title">BEST SELLER ITEMS</h2>
    <div class="product-grid">
        @foreach($latestProducts as $product)
        <div class="product-card">
            <a href="{{ route('customers.shop') }}"><img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->product_name }}"></a>
            <h3>{{ strtoupper($product->product_name) }}</h3>
            <p>{{ number_format($product->sale_price) }} MMK</p>
        </div>
        @endforeach
    </div>
    <div class="viewbtn">
            <a href="{{ route('customers.shop') }}"><button>View More</button></a>
        </div>
</section>
<section class="intro">
  <div class="left-intro">
    <h2>CHIC GOLD STYLES FOR EVERYDAY ELEGANCE</h2>
    <p style="font-size: 14px;">Discover the elegance of our 24k gold and 18k gold jewellery, crafted with precision and passion. Our collection features timeless pieces that reflect your unique style and confidence.<br><br>
    Explore our range of exquisite jewellery, from classic designs to modern masterpieces, and find the perfect piece to elevate your elegance.</p>
  </div>
  <div class="right-intro">
    <img src="images/c8.png" alt="Image" height="400px">
    </div>
</section>

</div>

<script>
  let currentSlide = 0;
const sliderWrapper = document.getElementById('sliderWrapper');
const totalSlides = document.querySelectorAll('.slide').length;

function showSlide(index) {
  currentSlide = index;
  sliderWrapper.style.transform = `translateX(-${index * 100}%)`;
}

document.getElementById('prevBtn').addEventListener('click', () => {
  currentSlide = (currentSlide === 0) ? totalSlides - 1 : currentSlide - 1;
  showSlide(currentSlide);
});

document.getElementById('nextBtn').addEventListener('click', () => {
  currentSlide = (currentSlide + 1) % totalSlides;
  showSlide(currentSlide);
});

setInterval(() => {
  currentSlide = (currentSlide + 1) % totalSlides;
  showSlide(currentSlide);
}, 5000);
</script>
@endsection

 
