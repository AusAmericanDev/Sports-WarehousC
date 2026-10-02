@extends('layouts.storefront')

@section('content')
<main style="display: flex; gap: 40px; max-width: 1200px; margin: 30px auto; padding: 0 20px; align-items: flex-start; font-family: sans-serif;">

    <section style="flex: 1; max-width: 450px; background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px; padding: 20px; display: flex; justify-content: center; align-items: center;">
        <img src="{{ asset('images/' . $product->image_path) }}" alt="{{ $product->name }}" style="max-width: 100%; height: auto; object-fit: contain; display: block;" />
    </section>

    <section style="flex: 1; display: flex; flex-direction: column; gap: 15px;">
        <h2 style="font-size: 2.5rem; font-weight: 700; color: #1a202c; margin: 0;">{{ $product->name }}</h2>

        <div style="font-size: 1.8rem; font-weight: 600; margin-top: 5px;">
            @if($product->sale_price)
            <span style="color: #e53e3e; margin-right: 15px;">${{ number_format($product->sale_price, 2) }}</span>
            <span style="font-size: 1.1rem; color: #718096; font-weight: 400;">
                <span style="font-weight: 700; background-color: #edf2f7; padding: 2px 6px; border-radius: 4px; margin-right: 4px; font-size: 0.85rem;">WAS</span>
                <del>${{ number_format($product->price, 2) }}</del>
            </span>
            @else
            <span style="color: #2d3748;">${{ number_format($product->price, 2) }}</span>
            @endif
        </div>

        <hr style="border: 0; border-top: 1px solid #e2e8f0; margin: 10px 0;" />

        <div style="margin-top: 5px;">
            <h3 style="font-size: 1.3rem; color: #4a5568; margin: 0 0 8px 0; font-weight: 600;">Product Description</h3>
            <p style="font-size: 1.1rem; line-height: 1.6; color: #4a5568; margin: 0;">{{ $product->description }}</p>
        </div>

        <form action="{{ url('/cart/add/' . $product->id) }}" method="POST" style="margin-top: 15px;">
            @csrf
            <button type="submit" style="background-color: #1a202c; color: #ffffff; padding: 12px 30px; font-size: 1.1rem; font-weight: 600; border: none; border-radius: 6px; cursor: pointer; display: inline-block;">
                Add to Cart
            </button>
        </form>
    </section>

</main>
@endsection