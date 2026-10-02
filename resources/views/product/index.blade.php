@extends('layouts.storefront')

@section('content')
<section class="featured-products" aria-labelledby="catalog-heading">
    <h2 id="catalog-heading" class="featured-heading">All Products</h2>

    <div class="product-grid">
        @forelse($products as $product)
        <article class="product-card">
            <a href="{{ url('/products/' . $product->id) }}" class="product-card-link">
                <h3 class="visually-hidden">{{ $product->name }}</h3>

                <div class="product-img-wrapper">
                    <img src="{{ asset('images/' . $product->image_path) }}" alt="{{ $product->name }}" />
                </div>

                <div class="product-info-wrapper">
                    <div class="price-container">
                        @if($product->sale_price)
                        <span class="current-price">${{ number_format($product->sale_price, 2) }}</span>
                        <span class="was-price">
                            <span class="was-label">WAS</span>
                            <del class="original-price">${{ number_format($product->price, 2) }}</del>
                        </span>
                        @else
                        <span class="price">${{ number_format($product->price, 2) }}</span>
                        @endif
                    </div>
                    <p class="product-name">{{ $product->name }}</p>
                </div>
            </a>
        </article>
        @empty
        <p class="no-products">No products are currently available in the catalog.</p>
        @endforelse
    </div>
</section>
@endsection