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
</section>


@endsection

 
