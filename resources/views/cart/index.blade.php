@extends('layouts.storefront')

@section('content')
<main style="max-width: 960px; margin: 0 auto; padding: 20px;">
    <h2 style="color: var(--dark-blue); font-weight: 400; margin-bottom: 20px;">Your Shopping Cart</h2>

    @if(count($cart) > 0)
    <div style="display: flex; flex-direction: column; gap: 15px;">
        @php $total = 0; @endphp
        @foreach($cart as $id => $details)
        @php $total += $details['price'] * $details['quantity']; @endphp

        <div style="display: flex; align-items: center; justify-content: space-between; padding: 15px; border: 1px solid var(--border-gray); border-radius: 5px; background: white; gap: 15px; flex-wrap: wrap;">
            <img src="{{ asset('images/' . $details['image_path']) }}" alt="{{ $details['name'] }}" style="width: 60px; height: 60px; object-fit: contain;">

            <div style="flex: 2; min-width: 200px;">
                <h4 style="color: var(--mid-blue); font-weight: 400;">{{ $details['name'] }}</h4>
                <p style="color: var(--gray); font-size: 0.9rem;">Price: ${{ number_format($details['price'], 2) }}</p>
            </div>

            <div style="flex: 1; text-align: center;">
                <span style="color: var(--gray);">Qty: <strong>{{ $details['quantity'] }}</strong></span>
            </div>

            <div style="flex: 1; text-align: right; color: var(--dark-blue); font-weight: bold;">
                ${{ number_format($details['price'] * $details['quantity'], 2) }}
            </div>

            <div style="flex: 0 0 auto; text-align: right; min-width: 80px;">
                <form action="{{ route('cart.remove', $id) }}" method="POST" onsubmit="return confirm('Remove this item from your cart?');">
                    @csrf
                    <button type="submit" style="background: none; border: 0; color: #d93025; cursor: pointer; font-size: 0.9rem; text-decoration: underline; padding: 0; display: inline-flex; align-items: center; gap: 4px;">
                        <i class="fa-solid fa-trash-can" aria-hidden="true"></i> Remove
                    </button>
                </form>
            </div>
        </div>
        @endforeach

        <div style="text-align: right; margin-top: 20px; padding: 20px; border-top: 2px solid var(--dark-blue);">
            <h3 style="color: var(--dark-blue); font-weight: 400; margin-bottom: 15px;">
                Total: <span style="color: var(--orange); font-weight: bold;">${{ number_format($total, 2) }}</span>
            </h3>
            <a href="{{ route('checkout.index') }}" style="background: var(--mid-blue); color: white; padding: 12px 30px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block;">
                Proceed to Checkout
            </a>
        </div>
    </div>
    @else
    <div style="text-align: center; padding: 60px 20px; color: var(--gray);">
        <i class="fa fa-shopping-cart" style="font-size: 3rem; margin-bottom: 15px; color: var(--border-gray);"></i>
        <p>Your cart is empty. Head back to the shop to find some premium gear!</p>
        <a href="{{ url('/') }}" style="color: var(--light-blue); text-decoration: none; display: inline-block; margin-top: 10px;">Browse Products &rarr;</a>
    </div>
    @endif
</main>
@endsection