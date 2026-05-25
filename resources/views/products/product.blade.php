@extends('layouts.app')

@section('content')
<div class="product-detail-container" style="max-width: 960px; margin: 20px auto; padding: 20px; display: flex; gap: 4px; flex-wrap: wrap;">

    <div class="detail-image-column" style="flex: 1; min-width: 300px; text-align: center;">
        <img src="{{ asset('images/' . $product->image_path) }}" alt="{{ $product->name }}" style="max-width: 100%; height: auto; max-height: 400px; object-fit: contain; border: 1px solid var(--border-gray); padding: 10px; border-radius: 5px;">
    </div>

    <div class="detail-info-column" style="flex: 1; min-width: 300px; display: flex; flex-direction: column; gap: 15px;">
        <h1 style="color: var(--dark-blue); font-size: 2rem; font-weight: 400;">{{ $product->name }}</h1>

        <div class="price-container" style="display: flex; align-items: center; gap: 10px;">
            @if($product->sale_price)
            <span class="current-price" style="color: var(--orange); font-size: 28px;">${{ number_format($product->sale_price, 2) }}</span>
            <span class="was-price" style="color: var(--gray); font-size: 18px;">
                <span class="was-label">WAS</span>
                <del class="original-price">${{ number_format($product->price, 2) }}</del>
            </span>
            @else
            <span class="price" style="color: var(--gray); font-size: 28px;">${{ number_format($product->price, 2) }}</span>
            @endif
        </div>

        <hr style="border: 0; border-top: 1px solid var(--border-gray);">

        <div class="product-description">
            <h3 style="color: var(--mid-blue); margin-bottom: 10px; font-weight: 400;">Product Description</h3>
            <p style="color: var(--gray); line-height: 1.6;">{{ $product->description }}</p>
        </div>
        <form action="{{ route('cart.add', $product->id) }}" method="POST" style="margin-top: 20px;">
            @csrf
            <button type="submit" style="background: var(--orange); color: white; border: 0; padding: 12px 24px; font-size: 1rem; border-radius: 5px; cursor: pointer; font-weight: bold; width: 100%; max-width: 200px;">
                Add to Cart
            </button>
        </form>

        @if(session('success'))
        <div style="margin-top: 15px; padding: 10px; background: #e6f4ea; color: #137333; border-radius: 4px; font-size: 0.9rem;">
            {{ session('success') }}
        </div>
        @endif
    </div>
</div>
@endsection