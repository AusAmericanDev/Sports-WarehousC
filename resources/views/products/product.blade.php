@extends('layouts.app')

@section('content')
<div class="product-detail-container">

    <div class="detail-image-column">
        <img src="{{ asset('images/' . $product->image_path) }}" alt="{{ $product->name }}" class="detail-product-img">
    </div>

    <div class="detail-info-column">
        <h1 class="detail-product-title">{{ $product->name }}</h1>

        <div class="detail-price-box">
            @if($product->sale_price)
            <span class="detail-current-price">${{ number_format($product->sale_price, 2) }}</span>
            <span class="detail-was-price">
                <span class="was-label">WAS</span>
                <del class="original-price">${{ number_format($product->price, 2) }}</del>
            </span>
            @else
            <span class="detail-base-price">${{ number_format($product->price, 2) }}</span>
            @endif
        </div>

        <hr class="detail-divider">

        <div class="product-description">
            <h3 class="description-heading">Product Description</h3>
            <p class="description-text">{{ $product->description }}</p>
        </div>

        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="add-to-cart-form">
            @csrf
            <button type="submit" class="add-to-cart-btn">
                Add to Cart
            </button>
        </form>

        @if(session('success'))
        <div class="cart-success-alert">
            {{ session('success') }}
        </div>
        @endif
    </div>
</div>
@endsection