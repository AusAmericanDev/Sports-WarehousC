@extends('layouts.storefront')

@section('content')
<section class="products-section">
    <div class="container">

        <h1 class="page-title">
            Search Results for "{{ $searchTerm }}"
        </h1>

        <div class="products-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 20px; width: 100%;">
            @forelse($products as $product)
            <article class="product-card">
                <a href="{{ url('/products/' . $product->id) }}" class="product-card-link">
                    <h3 class="visually-hidden">
                        {{ $product->name }}
                    </h3>

                    <div class="product-img-wrapper">
                        <img src="{{ asset('images/' . $product->image_path) }}" alt="{{ $product->name }}">
                    </div>

                    <div class="product-info-wrapper">
                        <div class="price-container">
                            @if($product->sale_price)
                            <span class="current-price">
                                ${{ number_format($product->sale_price, 2) }}
                            </span>
                            <span class="was-price">
                                <span class="was-label">WAS</span>
                                <del class="original-price">${{ number_format($product->price, 2) }}</del>
                            </span>
                            @else
                            <span class="price">
                                ${{ number_format($product->price, 2) }}
                            </span>
                            @endif
                        </div>
                        <p class="product-name">
                            {{ $product->name }}
                        </p>
                    </div>
                </a>
            </article>
            @empty
            <p class="no-results-text">No products found matching "{{ $searchTerm }}".</p>
            @endforelse
        </div>

    </div>
</section>
@endsection