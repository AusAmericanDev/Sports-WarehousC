@extends('layouts.app')

@section('content')
<section class="hero-banner" aria-label="Featured campaign">
  <div class="hero-slides" aria-live="polite">
    <img src="{{ asset('images/hero-soccerBall.jpg') }}" alt="Soccer ball on grass" class="hero-image hero-slide is-active" />
  </div>
  <aside class="hero-promo" aria-hidden="true">
    <p class="hero-small-text">View our brand new range of</p>
    <p class="hero-title">Sports balls</p>
    <a href="#" class="hero-button">Shop now</a>
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
    <article class="product-card">
      <h3 class="visually-hidden">adidas Euro16 Top Soccer Ball</h3>
      <img src="{{ asset('images/soccerBall.jpg') }}" alt="Adidas Euro 16 top soccer ball" />
      <div class="price-container">
        <span class="current-price">$34.95</span>
        <span class="was-price">
          <span class="was-label">WAS</span>
          <del class="original-price">$46.00</del>
        </span>
      </div>
      <p class="product-name">adidas Euro16 Top Soccer Ball</p>
    </article>

    <article class="product-card">
      <h3 class="visually-hidden">Pro-tec Classic Skate Helmet</h3>
      <img src="{{ asset('images/skateHelmet.jpg') }}" alt="Pro-tec classic skate helmet" />
      <p class="price">$70.00</p>
      <p class="product-name">Pro-tec Classic Skate Helmet</p>
    </article>

    <article class="product-card">
      <h3 class="visually-hidden">Nike Sport 600ml Water Bottle</h3>
      <img src="{{ asset('images/waterBottle.jpg') }}" alt="Nike 600ml sports water bottle" />
      <div class="price-container">
        <span class="current-price">$15.00</span>
        <span class="was-price">
          <span class="was-label">WAS</span>
          <del class="original-price">$17.50</del>
        </span>
      </div>
      <p class="product-name">Nike Sport 600ml Water Bottle</p>
    </article>

    <article class="product-card">
      <h3 class="visually-hidden">Sting ArmaPlus Boxing Gloves</h3>
      <img src="{{ asset('images/boxingGloves.jpg') }}" alt="Sting ArmaPlus boxing gloves" />
      <div class="price-container">
        <span class="price">$79.99</span>
      </div>
      <p class="product-name">Sting ArmaPlus Boxing Gloves</p>
    </article>

    <article class="product-card">
      <h3 class="visually-hidden">Asics Gel-Lethal 'Tiger 8' IT Men's</h3>
      <img src="{{ asset('images/footyBoots.jpg') }}" alt="Asics Gel-Lethal football boots" />
      <div class="price-container">
        <span class="current-price">$15.00</span>
        <span class="was-price">
          <span class="was-label">WAS</span>
          <del class="original-price">$17.50</del>
        </span>
      </div>
      <p class="product-name">Asics Gel-Lethal 'Tiger 8' IT Men's</p>
    </article>
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