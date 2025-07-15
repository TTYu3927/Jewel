@extends('layouts.ctmindex')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    body {
        background-color: #0f0f0f;
        font-family: 'Inter', sans-serif;
        color: #fff;
        margin: 0;
        padding: 0;
    }

    .contact-up {
        display: flex;
        max-width: 1100px;
        margin: 140px auto 40px;
        padding: 15px 20px;
        gap: 40px;
        align-items: center;
    }

    .left-up {
        flex: 1;
    }

    .left-up img {
        width: 100%;
        border-radius: 8px;
        object-fit: cover;
    }

    .right-up {
        flex: 1;
    }

    .right-up h1 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .right-up p {
        font-size: 14px;
        line-height: 1.8;
        color: #ccc;
    }

    .contact-down {
        display: flex;
        max-width: 1100px;
        margin: 40px auto;
        padding: 0 20px;
        gap: 40px;
        align-items: center;
    }

    .left-down {
        flex: 1;
        font-size: 14px;
        line-height: 2;
        color: #ccc;
    }
    .left-down .phone a{
        text-decoration: none;
        color: #fff;
    }
    .left-down .phone a:hover {
        color: #FFD43B;
    }

    .left-down i {
        font-style: italic;
    }

    .left-down b {
        color: #fff;
        font-weight: bold;
        font-size: 16px;
    }

    .right-down {
        flex: 1;
    }

    .right-down img {
        width: 100%;
        border-radius: 8px;
    }

    .sign-up {
        text-align: center;
        margin-top: 60px;
        margin-bottom: 80px;
    }

    .sign-up h1 {
        font-size: 16px;
        font-weight: 500;
        color: #ccc;
        margin-bottom: 20px;
    }

    .signup {
        background-color: #541c1c;
        color: white;
        padding: 12px 30px;
        border: none;
        font-size: 14px;
        font-weight: bold;
        border-radius: 6px;
        cursor: pointer;
    }

    .signup:hover {
        background-color: #6a2424;
    }
</style>


<div class="contact-up">
    <div class="left-up">
        <img src="{{ asset('images/sls.jpg') }}" alt="Contact Us">
    </div>
    <div class="right-up">
        <h1>CURRENTLY OPEN STORES</h1>
        <p>Visit SHWE LUCK SAN in person at the following locations:<br>
        ADDRESS 1: <b>80th Street, 31st - 32nd Street, Mandalay.</b><br>
        ADDRESS 2: <b>02/C-026A, 1st floor, Junction City, Yangon.</b>
        </p>
        </div>
    </div>
<div class="contact-down">
    <div class="left-down">
    <p><i>"Enjoy a complimentary handmade chain service with the purchase of custom
        rings or bracelets in-store."</i></p>
        <p>You may also call us to make an appointment.</p>
        <p class="phone"><i class="fa-solid fa-phone-volume" style="color: #FFD43B;"></i>
        <b><a href="#">+95 123 456 789</a></b></p>
    </div>

    <div class="right-down">
        <img src="{{ asset('images/contact1.jpg') }}" alt="Contact Us" width="100%">
    </div>
</div>

<div class="sign-up">
    <h1>SIGN UP AND ENJOY 10% OFF YOUR FIRST ORDER</h1>
        <a href="{{ route('register.form') }}"><button class="signup" type="submit">SIGN UP</button></a>

</div>

@endsection
