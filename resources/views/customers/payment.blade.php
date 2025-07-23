@extends('layouts.ctmindex')
<meta name="viewport" content="width=device-width, initial-scale=1" />
<style>
    body {
        background-color: #0f0f0f;
        font-family: 'Inter', sans-serif;
        margin: 0;
        padding: 0;
        color: #fff;
    }

    .Payment {
        max-width: 1000px;
        margin: 140px auto 60px;
        display: flex;
        justify-content: space-between;
        padding: 20px;
    }

    .left, .right {
        width: 48%;
    }

    h1 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 8px;
    }

    h3 {
        font-size: 16px;
        font-weight: bold;
        margin: 20px 0 15px;
    }

    p {
        font-size: 14px;
        color: #ccc;
        margin-bottom: 20px;
    }

    label {
        font-size: 13px;
        margin-bottom: 6px;
        display: block;
        color: #e0e0e0;
    }

    .left input[type="text"],
    .left input[type="email"] {
        width: 85%;
        padding: 12px;
        margin-bottom: 15px;
        border: 1px solid #444;
        background-color: transparent;
        color: #fff;
        font-size: 14px;
    }

    input::placeholder {
        color: #aaa;
    }

    .card-field {
        margin-bottom: 15px;
        width: 85%;
    }

    .card-info {
        display: flex;
        justify-content: space-between;
        gap: 10px;
        width: 90%;
    }

    #card-number, #card-exp, #card-cvc {
        padding: 12px;
        background-color: transparent;
        border: 1px solid #444;
        font-size: 14px;
        color: #fff;
        height: 20px;
        
    }

    .StripeElement {
        background-color: transparent;
        color: #fff;
    }

    #card-errors {
        color: #ff5252;
        font-size: 12px;
        margin-bottom: 12px;
    }

    button {
        width: 90%;
        padding: 14px;
        background-color: #541c1c;
        color: #fff;
        font-weight: bold;
        border: none;
        cursor: pointer;
        font-size: 14px;
        margin-top: 10px;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #6a2424;
    }

    .note1 {
        font-size: 12px;
        color: #aaa;
        line-height: 1.5;
        margin-top: 20px;
    }

    .note1 a {
        color: #fff;
        text-decoration: underline;
    }

    .right-info {
        font-size: 14px;
        line-height: 2;
    }

    .right-info a {
        text-decoration: none;
        color: #f5c012;
    }

    .right-info span.label {
        color: #aaa;
        display: inline-block;
        width: 130px;
    }

    .note2 {
        font-size: 12px;
        color: #aaa;
        margin-top: 20px;
        padding: 12px;
        border: 1px solid #444;
        background-color: #141414;
        border-radius: 6px;
    }

    .alert {
        margin-top: 20px;
        padding: 12px;
        background-color: #ff5252;
        color: white;
        font-size: 14px;
        border-radius: 6px;
    }

    @media screen and (max-width: 768px) {
        .Payment {
            flex-direction: column;
        }
        .right {
        order: -1;
        margin-bottom: 20px;
    }


        .left, .right {
            width: 100%;
        }

        .card-info {
            flex-direction: column;
        }

        button {
            width: 90%;
        }
    }
</style>
@section('content')

<div class="Payment">
    <div class="left">
        <h1>PAYMENT</h1>
        <p>All transactions are secure and encrypted.</p>

        <h3>CARD INFORMATION</h3>

        <form id="payment-form" method="POST" action="{{ route('stripepay') }}">
            @csrf

            <label for="card-number">Card Number</label>
            <div id="card-number" class="card-field"></div>

            <div class="card-info">
                <div class="card-field">
                    <label for="card-exp" class="payment-label">Expiry Date</label>
                    <div id="card-exp"></div>
                </div>
                <div class="card-field">
                    <label for="card-cvc" class="payment-label">CVC</label>
                    <div id="card-cvc" style="color: white;"></div>
                </div>
            </div>

            <span id="card-errors" style="color:red;"></span>
            <input type="hidden" name="amount" value="{{ $totalAmount }}">

            <button type="submit" id="pay-btn">Pay</button>

            <p class="note1">
                Your info will be saved to a Shop account. By continuing, you agree to Shop’s
                <a href="#">Terms of Service</a> and acknowledge the <a href="#">Privacy Policy</a>.
            </p>
        </form>

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
    </div>

    <div class="right">
        <h3>DELIVERY INFORMATION</h3>
        @if(auth('customer')->check())
            <div class="right-info">
                <div><span class="label">Customer's Name:</span> {{ auth('customer')->user()->name }}</div>
                <div><span class="label">Email:</span> {{ auth('customer')->user()->email }}</div>
                <div><span class="label">Phone Number:</span> {{ auth('customer')->user()->phone }}</div>
                <div><span class="label">Delivery Address:</span> {{ auth('customer')->user()->address }}</div>
                <div><span class="label">Total Amount:</span> {{ number_format($totalAmount) }} MMK</div>
            </div>
        @else
            <div class="right-info">
                <div>Please <a href="{{ route('login.form') }}">log in</a> to see your delivery information.</div>
            </div>
        @endif

        <p class="note2">
            <i class="fa-solid fa-circle-exclamation" style="color: #FFD43B;"></i>
            The total amount you pay includes all applicable customs duties & taxes.
            We guarantee no additional charges on delivery.
        </p>
    </div>
</div>

{{-- Stripe Scripts --}}
<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{ config('services.stripe.key') }}');
    const elements = stripe.elements();

    const style = {
        base: {
            color: '#ffffff', // Set text color to white
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aaa' // Set placeholder text color to white
            }
        },
        invalid: {
            color: '#fa755a', // Optional: error color
            iconColor: '#fa755a'
        }
    };

    const card = elements.create('cardNumber', { style });
    const cardExp = elements.create('cardExpiry', { style });
    const cardCvc = elements.create('cardCvc', { style });

    card.mount('#card-number');
    cardExp.mount('#card-exp');
    cardCvc.mount('#card-cvc');

    const form = document.getElementById('payment-form');
    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        document.getElementById('pay-btn').disabled = true;

        const { token, error } = await stripe.createToken(card);
        if (error) {
            document.getElementById('card-errors').textContent = error.message;
            document.getElementById('pay-btn').disabled = false;
        } else {
            const hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
            form.submit();
        }
    });
</script>
@endsection
