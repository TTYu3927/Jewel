@extends('layouts.ctmindex')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/customercontact.css') }}">

<style>
    .contact-form {
    margin-top: 40px;
    background: #0f0f0f;
    border-radius: 10px;
    width: 100%;
    max-width: 400px;
    margin: 140px auto 40px;
    padding: 15px 20px;

}

.contact-form h2 {
    margin-bottom: 15px;
    color: #FFD43B;
    text-align: center;
    font-size: 1.5em;
}

.contact-form label {
    display: block;
    margin-top: 10px;
    font-weight: bold;
}

.contact-form input,
.contact-form textarea {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    border-radius: 5px;
    border: 1px solid #444;
    background-color: transparent;
    font-weight: bold;
    color: white;
    
}

.contact-form button {
    margin-top: 15px;
    background: #541c1c;
    border: none;
    color: white;
    padding: 10px 20px;
    font-weight: bold;
    cursor: pointer;
    border-radius: 5px;
}
.contact-form button:hover {
    background: #6a2525;
}

.error {
    color: red;
    font-size: 0.9em;
}

.success-message {
    background: #d4edda;
    padding: 10px;
    border-radius: 5px;
    color: #155724;
    margin-bottom: 10px;
}

</style>


<div class="contact-up">
    <div class="left-up">
        <img src="{{ asset('images/sls.jpg') }}" alt="Contact Us">
    </div>
    <div class="right-up">
        <h1>CURRENTLY OPEN STORES</h1>
        <p>Visit <a>SHWE LUCK SAN</a> in person at the following locations:<br>
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
        
        <div class="sign-up">
    <h1>SIGN UP AND ENJOY 10% OFF YOUR FIRST ORDER</h1>
        <a href="{{ route('register.form') }}"><button class="signup" type="submit">SIGN UP</button></a>

</div>
    </div>

    <div class="right-down">
        <img src="{{ asset('images/contact1.jpg') }}" alt="Contact Us" width="100%">
    </div>
</div>

<div class="contact-form">
    <h2>CONTACT US</h2>
    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    <form action="{{ route('contact.send') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        @error('name') <span class="error">{{ $message }}</span> @enderror

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        @error('email') <span class="error">{{ $message }}</span> @enderror

        <label for="subject">Subject:</label>
        <input type="text" name="subject" id="subject" value="{{ old('subject') }}" required>
        @error('subject') <span class="error">{{ $message }}</span> @enderror

        <label for="message">Message:</label>
        <textarea name="message" id="message" rows="5" required>{{ old('message') }}</textarea>
        @error('message') <span class="error">{{ $message }}</span> @enderror

        <button type="submit">SEND MESSAGE</button>
    </form>
</div>


@endsection
