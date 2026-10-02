@extends('layouts.storefront')

@section('content')
<section class="hero-banner" aria-label="Featured campaign">
  <div class="hero-slides" aria-live="polite">
    <img src="{{ asset('images/hero-soccerBall.jpg') }}" alt="Soccer ball on grass" class="hero-image hero-slide is-active" />
  </div>
  <aside class="hero-promo" aria-hidden="true">
    <p class="hero-small-text">View our brand new range of</p>
    <p class="hero-title">Sports balls</p>
    <a href="{{ url('/category/3') }}" class="hero-button">Shop now</a>
  </aside>
  <div class="hero-dots" role="group" aria-label="Slideshow controls">
    <button type="button" class="hero-dot is-active" aria-label="Show slide 1"></button>
    <button type="button" class="hero-dot" aria-label="Show slide 2"></button>
    <button type="button" class="hero-dot" aria-label="Show slide 3"></button>
  </div>
</section>

<section class="featured-products" aria-labelledby="featured-heading">
  <h2 id="featured-heading" class="featured-heading">Featured Products</h2>

  <div class="product-grid">
    @foreach($featuredProducts as $product)
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
    @endforeach
  </div>
</section>

<section class="brands" aria-labelledby="brands-heading">
  <h2 id="brands-heading">Our brands and partnerships</h2>
</section>

<section class="brands-content" aria-label="Brands content">
  <div>
    <p class="brands-description">
      These are some of our top brands and partnerships.
      <span class="brands-highlight">The best of the best is here.</span>
    </p>
  </div>
  <section class="brands-logos" aria-label="Brand logos">
    <div>
      <ul class="brand-list">
        <li><img src="{{ asset('images/logo-nike.png') }}" alt="Nike logo" /></li>
        <li><img src="{{ asset('images/logo-adidas.png') }}" alt="Adidas logo" /></li>
        <li><img src="{{ asset('images/logo-skins.png') }}" alt="Skins logo" /></li>
        <li><img src="{{ asset('images/logo-asics.png') }}" alt="Asics logo" /></li>
        <li><img src="{{ asset('images/logo-newbalance.png') }}" alt="New Balance logo" /></li>
        <li><img src="{{ asset('images/logo-wilson.png') }}" alt="Wilson logo" /></li>

      </ul>
    </div>
  </section>
</section>
@endsection