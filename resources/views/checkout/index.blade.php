@extends('layouts.app')

@section('content')
<div class="checkout-container" style="max-width: 800px; margin: 40px auto; padding: 20px; font-family: 'Open Sans', sans-serif;">
    <h1 style="color: #0c232e; border-bottom: 2px solid #eee; padding-bottom: 10px;">Secure Store Checkout</h1>

    <form action="{{ route('checkout.place') }}" method="POST" id="checkoutForm">
        @csrf

        <h3 style="color: #0284c7; margin-top: 20px;">1. Delivery Details</h3>
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <div>
                <label for="first_name">First Name *</label>
                <input type="text" id="first_name" name="first_name" required style="width:100%; padding:8px;" maxlength="50">
            </div>
            <div>
                <label for="last_name">Last Name *</label>
                <input type="text" id="last_name" name="last_name" required style="width:100%; padding:8px;" maxlength="50">
            </div>
        </div>

        <div style="margin-top:15px;">
            <label for="delivery_address">Delivery Address *</label>
            <input type="text" id="delivery_address" name="delivery_address" required style="width:100%; padding:8px;">
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-top: 15px;">
            <div>
                <label for="contact_number">Contact Number *</label>
                <input type="tel" id="contact_number" name="contact_number" required pattern="[0-9]{8,15}" style="width:100%; padding:8px;">
            </div>
            <div>
                <label for="email_address">Email Address *</label>
                <input type="email" id="site-email" name="email_address" required style="width:100%; padding:8px;">
            </div>
        </div>

        <h3 style="color: #0284c7; margin-top: 30px;">2. Payment Method (Credit Card Only)</h3>
        <div style="margin-top:15px;">
            <label for="card_name">Name on Credit Card *</label>
            <input type="text" id="card_name" name="card_name" required style="width:100%; padding:8px;">
        </div>

        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 15px; margin-top: 15px;">
            <div>
                <label for="card_number">Credit Card Number *</label>
                <input type="text" id="card_number" name="card_number" required pattern="[0-9]{16}" placeholder="16 digits no spaces" style="width:100%; padding:8px;">
            </div>
            <div>
                <label for="expiry_date">Expiry Date *</label>
                <input type="text" id="expiry_date" name="expiry_date" required placeholder="MM/YY" pattern="(0[1-9]|1[0-2])\/[0-9]{2}" style="width:100%; padding:8px;">
            </div>
        </div>

        <button type="submit" style="margin-top: 30px; background: #0c232e; color: white; padding: 12px 24px; border: none; font-size: 16px; cursor: pointer; font-weight: bold; width: 100%;">
            Place Order & Generate Reference Number
        </button>
    </form>
</div>
@endsection