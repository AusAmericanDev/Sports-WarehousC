@extends('layouts.app')

@section('content')
<main style="max-width: 960px; margin: 0 auto; padding: 20px;">
    <h2 style="color: var(--dark-blue); font-weight: 400; margin-bottom: 10px;">
        Search Results for: <span style="color: var(--orange);">"{{ $searchTerm }}"</span>
    </h2>
    <p style="color: var(--gray); margin-bottom: 25px;">Found {{ $products->count() }} item(s)</p>

    <div class="product-grid" style="display: flex; flex-wrap: wrap; gap: 15px; justify-content: flex-start;">
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
        <div style="width: 100%; padding: 40px; text-align: center; color: var(--gray);">
            <p>Sorry, we couldn't find any sports gear matching that term. Try searching for something else like "ball" or "helmet"!</p>
        </div>
        @endforelse
    </div>
</main>
@endsection