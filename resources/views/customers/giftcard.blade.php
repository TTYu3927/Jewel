@extends('layouts.ctmindex')
@section('content')
<link rel="stylesheet" href="{{ asset('css/customergiftcard.css') }}">

<style>

</style>

<div class="giftcard-container">
    <div class="giftcard-left">
        <img src="{{ asset('images/giftcard.jpg') }}" alt="Gift Card" >
    </div>

    <div class="giftcard-right">
        <h2>GIFT CARD</h2>
        <div class="price" id="selected-price">100,000 MMK</div>

        <div class="giftcard-options">
            <button type="button" class="amount-btn selected" data-amount="100000">100,000 MMK</button>
            <button type="button" class="amount-btn" data-amount="200000">200,000 MMK</button>
            <button type="button" class="amount-btn" data-amount="300000">300,000 MMK</button>
            <button type="button" class="amount-btn" data-amount="500000">500,000 MMK</button>
            <button type="button" class="amount-btn" data-amount="1000000">1,000,000 MMK</button>
        </div>

        <div class="quantity-selector">
            <label style="margin-right: 10px;">Qty:</label>
            <button type="button" onclick="decreaseQty()">-</button>
            <input type="text" value="1" id="qty" readonly>
            <button type="button" onclick="increaseQty()">+</button>
        </div>

        <form action="{{ route('giftcard.addtocart') }}" method="POST">
            @csrf
            <input type="hidden" name="amount" value="100000" id="giftAmount">
            <input type="hidden" name="quantity" value="1" id="giftQty">
            <button type="submit" class="add-to-cart">ADD TO CART</button>
        </form>

        <div class="toggle-section1">DESCRIPTION +</div>
        <div class="toggle-section2">SHIPPING & RETURNS +</div>
    </div>
</div>

<script>
    function increaseQty() {
        let qty = document.getElementById('qty');
        qty.value = parseInt(qty.value) + 1;
        document.getElementById('giftQty').value = qty.value;
    }

    function decreaseQty() {
        let qty = document.getElementById('qty');
        if (parseInt(qty.value) > 1) qty.value = parseInt(qty.value) - 1;
        document.getElementById('giftQty').value = qty.value;
    }

    const amountButtons = document.querySelectorAll('.amount-btn');
    const giftAmountInput = document.getElementById('giftAmount');
    const selectedPriceDisplay = document.getElementById('selected-price');

    amountButtons.forEach(button => {
        button.addEventListener('click', function () {
            amountButtons.forEach(btn => btn.classList.remove('selected'));
            this.classList.add('selected');

            const selectedAmount = this.dataset.amount;
            giftAmountInput.value = selectedAmount;
            selectedPriceDisplay.textContent = parseInt(selectedAmount).toLocaleString() + ' MMK';
        });
    });
</script>

@endsection
