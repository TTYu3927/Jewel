@extends('layouts.ctmindex')
@section('content')
<link rel="stylesheet" href="{{ asset('css/layouts.css') }}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
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
      <img src="images/t12.jpg" alt="Image">

    </div>

  </main>

<section class="featured-products">
    <h2 class="section-title1">TIMELESS CLASSIC</h2>
    <div class="product-grid1">
        @foreach($latestProducts as $product)
        <div class="product-card1">
            <a href="{{ route('customers.shop') }}"><img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->product_name }}"></a>
            <h3>{{ strtoupper($product->product_name) }}</h3>
            <p>{{ number_format($product->sale_price) }} MMK</p>
        </div>
        @endforeach
    </div>
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
    <p>Discover the elegance of our 24k gold and 18k gold jewellery, crafted with precision and passion. Our collection features timeless pieces that reflect your unique style and confidence.</p>
    <p>Explore our range of exquisite jewellery, from classic designs to modern masterpieces, and find the perfect piece to elevate your elegance.</p>
  </div>
  <div class="right-intro">
    <img src="images/c8.png" alt="Image" height="400px">
</section>


@endsection

 
