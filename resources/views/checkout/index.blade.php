@extends('layouts.app')

@section('content')
<main style="max-width: 1100px; margin: 40px auto; padding: 20px; font-family: 'Open Sans', sans-serif;">

    <form action="{{ route('checkout.place') }}" method="POST" id="checkoutForm">
        @csrf

        <div style="display: flex; gap: 40px; flex-wrap: wrap; align-items: flex-start;">

            <div style="flex: 3; min-width: 350px;">

                <h2 style="color: #333; font-size: 1.4rem; font-weight: 600; margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 8px;">1. Shipping Details</h2>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                    <div>
                        <label style="display:block; margin-bottom:5px; font-size:0.9rem; color:#555; font-weight: 600;">First Name *</label>
                        <input type="text" name="first_name" required style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px;" maxlength="50">
                    </div>
                    <div>
                        <label style="display:block; margin-bottom:5px; font-size:0.9rem; color:#555; font-weight: 600;">Last Name *</label>
                        <input type="text" name="last_name" required style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px;" maxlength="50">
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                    <div>
                        <label style="display:block; margin-bottom:5px; font-size:0.9rem; color:#555; font-weight: 600;">Email *</label>
                        <input type="email" name="email_address" required style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px;">
                    </div>
                    <div>
                        <label style="display:block; margin-bottom:5px; font-size:0.9rem; color:#555; font-weight: 600;">Phone Number *</label>
                        <input type="tel" name="contact_number" required pattern="[0-9]{8,15}" placeholder="Digits only" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px;">
                    </div>
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="display:block; margin-bottom:5px; font-size:0.9rem; color:#555; font-weight: 600;">Street Address *</label>
                    <input type="text" name="delivery_address" required style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px;">
                </div>

                <div style="display: grid; grid-template-columns: 2fr 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                    <div>
                        <label style="display:block; margin-bottom:5px; font-size:0.9rem; color:#555; font-weight: 600;">Suburb *</label>
                        <input type="text" name="suburb" required style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px;">
                    </div>
                    <div>
                        <label style="display:block; margin-bottom:5px; font-size:0.9rem; color:#555; font-weight: 600;">State *</label>
                        <select name="state" required style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px; height: 41px; background-color: white;">
                            <option value="">Select</option>
                            <option value="NSW">NSW</option>
                            <option value="QLD">QLD</option>
                            <option value="VIC">VIC</option>
                            <option value="TAS">TAS</option>
                            <option value="WA">WA</option>
                            <option value="SA">SA</option>
                            <option value="ACT">ACT</option>
                            <option value="NT">NT</option>
                        </select>
                    </div>
                    <div>
                        <label style="display:block; margin-bottom:5px; font-size:0.9rem; color:#555; font-weight: 600;">Postcode *</label>
                        <input type="text" name="postcode" required pattern="[0-9]{4}" placeholder="4 digits" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px;">
                    </div>
                </div>

                <h2 style="color: #333; font-size: 1.4rem; font-weight: 600; margin-top: 40px; margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 8px;">2. Payment Information</h2>

                <div style="margin-bottom: 15px;">
                    <label style="display:block; margin-bottom:5px; font-size:0.9rem; color:#555; font-weight: 600;">Cardholder Name *</label>
                    <input type="text" name="card_name" required style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="display:block; margin-bottom:5px; font-size:0.9rem; color:#555; font-weight: 600;">Card Number *</label>
                    <input type="text" name="card_number" required pattern="[0-9]{16}" placeholder="16 digits no spaces" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px;">
                </div>

                <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 15px;">
                    <div>
                        <label style="display:block; margin-bottom:5px; font-size:0.9rem; color:#555; font-weight: 600;">Expiry Date (MM/YY) *</label>
                        <input type="text" name="expiry_date" required placeholder="MM/YY" pattern="(0[1-9]|1[0-2])\/[0-9]{2}" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px;">
                    </div>
                </div>

            </div>

            <div style="flex: 2; min-width: 300px; background: #fff; border: 1px solid #e2e8f0; padding: 25px; border-radius: 6px; box-shadow: 0 4px 6px rgba(0,0,0,0.02); height: fit-content;">
                <h2 style="color: #333; font-size: 1.4rem; font-weight: 600; margin-bottom: 20px; margin-top: 0;">Summary</h2>

                <div style="display: flex; gap: 10px; margin-bottom: 25px;">
                    <input type="text" placeholder="Promo Code" style="flex: 1; padding: 8px 12px; border: 1px solid #ccc; border-radius: 4px;">
                    <button type="button" style="background: #fff; border: 1px solid #ccc; padding: 0 15px; border-radius: 4px; cursor: pointer; font-size: 1.1rem; color: #555;">➔</button>
                </div>

                @php
                $subtotal = 0;
                foreach($cart as $item) {
                $subtotal += ($item['price'] ?? 0) * ($item['quantity'] ?? 1);
                }
                $shipping = 5.00;
                $total = $subtotal + $shipping;
                $gst = $total * 0.10;
                @endphp

                <div style="display: flex; justify-content: space-between; margin-bottom: 12px; color: #555;">
                    <span>Subtotal</span>
                    <span style="font-weight: 600;">${{ number_format($subtotal, 2) }}</span>
                </div>
                <div style="display: flex; justify-content: space-between; margin-bottom: 12px; color: #555;">
                    <span>Shipping</span>
                    <span style="font-weight: 600;">${{ number_format($shipping, 2) }}</span>
                </div>
                <div style="display: flex; justify-content: space-between; margin-bottom: 15px; color: #888; font-size: 0.85rem; font-style: italic;">
                    <span>GST (10% included)</span>
                    <span>${{ number_format($gst, 2) }}</span>
                </div>

                <div style="display: flex; justify-content: space-between; border-top: 1px solid #eee; padding-top: 15px; margin-bottom: 30px; font-size: 1.25rem; font-weight: bold; color: #111;">
                    <span>Total</span>
                    <span style="color: #333;">${{ number_format($total, 2) }}</span>
                </div>

                <div style="margin-bottom: 30px;">
                    <h4 style="color: #444; border-bottom: 1px solid #eee; padding-bottom: 8px; margin-bottom: 15px; font-weight: 600; font-size: 0.95rem; text-transform: uppercase; letter-spacing: 0.5px;">
                        Items in Order ({{ count($cart) }})
                    </h4>

                    @foreach($cart as $id => $details)
                    <div style="display: flex; gap: 15px; align-items: center; margin-bottom: 15px;">
                        <div style="width: 50px; height: 50px; border: 1px solid #eee; border-radius: 4px; background: #fff; display: flex; align-items: center; justify-content: center; padding: 4px;">
                            <img src="{{ asset('images/' . ($details['image_path'] ?? 'default.png')) }}" alt="{{ $details['name'] }}" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                        </div>
                        <div style="flex: 1;">
                            <h5 style="margin: 0; font-size: 0.9rem; color: #333; font-weight: 600;">{{ $details['name'] }}</h5>
                            <span style="font-size: 0.8rem; color: #777;">Qty: {{ $details['quantity'] }}</span>
                        </div>
                        <div style="font-size: 0.9rem; font-weight: bold; color: #333;">
                            ${{ number_format($details['price'] * $details['quantity'], 2) }}
                        </div>
                    </div>
                    @endforeach
                </div>

                <button type="submit" style="width: 100%; background: #00aced; color: white; padding: 14px; border: none; border-radius: 25px; font-size: 1rem; font-weight: bold; cursor: pointer; text-align: center; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
                    Place Order
                </button>

            </div>

        </div>
    </form>
</main>
@endsection