@extends('layouts.ctmindex')
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="{{ asset('css/payment.css') }}">

<style>

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
