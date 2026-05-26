@extends('layouts.app')

@section('content')
<section class="featured-products" aria-labelledby="catalog-heading" style="max-width: 960px; margin: 0 auto; padding: 20px;">
    <h2 id="catalog-heading" class="featured-heading">All Products</h2>

    <div class="product-grid" style="display: flex; flex-wrap: wrap; gap: 15px; justify-content: flex-start; width: 100%; margin-inline: auto; padding: 15px;">
        @forelse($products as $product)
        <article class="product-card">
            <a href="{{ url('/products/' . $product->id) }}" style="text-decoration: none; display: flex; flex-direction: column; height: 100%; width: 100%; align-items: center; justify-content: space-between;">
                <h3 class="visually-hidden">{{ $product->name }}</h3>
                <img src="{{ asset('images/' . $product->image_path) }}" alt="{{ $product->name }}" />

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
            </a>
        </article>
        @empty
        <p style="width: 100%; padding: 40px; text-align: center; color: var(--gray);">
            No products are currently available in the catalog.
        </p>
        @endforelse
    </div>
</section>
@endsection