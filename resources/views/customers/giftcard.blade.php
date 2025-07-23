@extends('layouts.ctmindex')
@section('content')

<style>
    body {
        background-color: #0f0f0f;
        color: #fff;
        font-family: 'Inter', sans-serif;
    }

    .giftcard-container {
        display: flex;
        justify-content: space-between;
        max-width: 1100px;
        margin: 140px auto 60px;
        padding: 20px;
    }

    .giftcard-left img {
        width: 500px;
        border-radius: 4px;
    }

    .giftcard-right {
        width: 40%;
        padding-left: 40px;
    }

    .giftcard-right h2 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .price {
        font-size: 16px;
        color: #d4af37;
        margin-bottom: 20px;
    }

    .giftcard-options button {
        margin: 5px 5px 10px 0;
        padding: 10px 16px;
        background-color: transparent;
        border: 1px solid #fff;
        color: #fff;
        cursor: pointer;
        font-size: 14px;
    }

    .giftcard-options button:hover,
    .giftcard-options .selected {
        background-color: #d4af37;
        color: #000;
    }

    .quantity-selector {
        display: flex;
        align-items: center;
        margin: 15px 0;
    }

    .quantity-selector button {
        background: transparent;
        border: 1px solid #fff;
        color: #fff;
        width: 30px;
        height: 30px;
        cursor: pointer;
    }

    .quantity-selector input {
        width: 50px;
        text-align: center;
        background-color: transparent;
        color: #fff;
        border: none;
        font-size: 16px;
    }

    .gift-wrap {
        margin: 10px 0 20px;
    }

    .gift-wrap input {
        margin-right: 8px;
    }

    .add-to-cart {
        background-color: #541c1c;
        border: none;
        color: #fff;
        padding: 12px 30px;
        font-weight: bold;
        font-size: 14px;
        cursor: pointer;
        margin-bottom: 30px;
    }

    .add-to-cart:hover {
        background-color: #6a2424;
    }

    .toggle-section1,
    .toggle-section2 {
        margin-bottom: 15px;
        cursor: pointer;
        font-size: 14px;
        border-top: 1px solid #444;
        margin-top: 20px;
        padding-top: 20px;
        color: #aaa;
    }

    .toggle-section2 {
        border-bottom: 1px solid #444;
        padding-bottom: 20px;
    }
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
            <div class="gift-wrap">
                <input type="checkbox" name="gift_wrap" id="giftWrap"> Add Gift Wrapping (+20,000 MMK)
            </div>
            <button type="submit" class="add-to-cart">ADD TO CART</button>
        </form>

        <div class="toggle-section1">DESCRIPTION +</div>
        <div class="toggle-section2">SHIPPING & RETURNS +</div>
    </div>
</div>

<script>
    // Quantity logic
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

    // Amount button selection
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
