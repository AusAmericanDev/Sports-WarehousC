@extends('layouts.app')

@section('content')
<section class="featured-products" aria-labelledby="category-heading">
    <h2 id="category-heading" class="featured-heading">{{ $category->name }}</h2>

    <div class="product-grid">
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
        <p class="no-products" style="width: 100%; padding: 40px 0; text-align: center; color: var(--gray);">
            No products are currently available in this section.
        </p>
        @endforelse
    </div>
</section>
@endsection