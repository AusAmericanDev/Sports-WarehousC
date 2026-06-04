<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sports Warehouse</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    @vite(['resources/css/style.css', 'resources/js/app.js'])
</head>

<body>
    <a href="#main-content" class="skip-link">Skip to main content</a>

    <div class="site-wrapper">
        <header class="site-header">
            <input type="checkbox" id="menu-toggle-check" hidden />
            <nav class="top-nav" aria-label="Mobile navigation">
                <label for="menu-toggle-check" class="menu-toggle">
                    <i class="fa-solid fa-bars bars-icon" aria-hidden="true"></i>
                    <i class="fa-solid fa-xmark close-icon" aria-hidden="true"></i>
                    <span class="menu-text">Menu</span>
                </label>

                <div class="cart-info">
                    <a href="{{ route('cart.index') }}">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <span>View Cart</span>
                    </a>
                    <span class="cart-count" aria-live="polite">
                        {{ session('cart') ? array_sum(array_column(session('cart'), 'quantity')) : 0 }} items
                    </span>
                </div>
            </nav>

            <div class="nav-bar">
                <nav class="main-site-nav" aria-label="Primary navigation">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ route('about.index') }}">About SW</a></li>
                        <li><a href="{{ route('contact.index') }}">Contact Us</a></li>
                        <li><a href="{{ route('products.index') }}">View Products</a></li>
                        <li class="nav-spacer" aria-hidden="true"></li>
                        <li class="nav-login">
                            <a href="#">
                                <i class="fa-solid fa-lock" aria-hidden="true"></i> Login
                            </a>
                        </li>
                        <li class="nav-cart">
                            <a href="{{ route('cart.index') }}">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span>View Cart</span>
                            </a>
                            <span class="cart-count" aria-live="polite">
                                {{ session('cart') ? array_sum(array_column(session('cart'), 'quantity')) : 0 }} items
                            </span>
                        </li>
                    </ul>
                </nav>
            </div>

            @if(!Route::is('contact.index'))
            <div class="header-main">
                <div class="header-logo-search">
                    <div class="header-logo">
                        <img src="{{ asset('images/sports-warehouse-logo-600.png') }}" alt="Sports Warehouse logo" />
                    </div>

                    <div class="search-container">
                        <form action="{{ url('/search') }}" method="GET" role="search" class="search-form">
                            <label for="site-search" class="visually-hidden">Search products</label>
                            <div class="search">
                                <input id="site-search" name="query" type="search" placeholder="Search products" value="{{ request('query') }}" />
                            </div>
                            <button type="submit" class="submit-btn">
                                <span class="search-icon-stack" aria-hidden="true">
                                    <i class="fa-solid fa-circle search-icon-bg"></i>
                                    <i class="fa-solid fa-magnifying-glass search-icon-fg"></i>
                                </span>
                                <span class="visually-hidden">Submit search</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <section class="product-categories">
                <div class="categories categories-track">
                    @foreach(\App\Models\Category::all() as $category)
                    <a href="/category/{{ $category->id }}"
                        class="{{ request()->segment(2) == $category->id ? 'active' : '' }}">
                        {{ $category->name }}
                    </a>
                    @endforeach
                </div>
            </section>

            <div style="clear: both !important;"></div>
            @endif
        </header>

        <main id="main-content">
            @yield('content')
        </main>

        <footer class="site-footer">
            <div class="inner-footer">
                <nav class="footer-nav" aria-labelledby="footer-nav-heading">
                    <h3 id="footer-nav-heading">Site navigation</h3>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ route('about.index') }}">About SW</a></li>
                        <li><a href="{{ route('contact.index') }}">Contact Us</a></li>
                        <li><a href="{{ route('products.index') }}">View Products</a></li>
                        <li><a href="#">Privacy policy</a></li>
                    </ul>
                </nav>

                <nav class="footer-categories" aria-labelledby="footer-categories-heading">
                    <h3 id="footer-categories-heading">Product categories</h3>
                    <ul>
                        @foreach(\App\Models\Category::all() as $category)
                        <li><a href="/category/{{ $category->id }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </nav>

                <section class="contact-info">
                    <h3>Contact Sports Warehouse</h3>
                    <ul class="social-icons">
                        <li>
                            <a href="#" aria-label="Sports Warehouse on Facebook">
                                <i class="fa-brands fa-facebook-f" aria-hidden="true"></i> Facebook
                            </a>
                        </li>
                        <li>
                            <a href="#" aria-label="Sports Warehouse on Twitter">
                                <i class="fa-brands fa-twitter" aria-hidden="true"></i> Twitter
                            </a>
                        </li>
                        <li>
                            <a href="#" aria-label="Other contact options">
                                <i class="fa-solid fa-paper-plane" aria-hidden="true"></i> Other
                            </a>
                        </li>
                    </ul>
                </section>
            </div>

            <div class="sub-footer">
                <div class="copyright">
                    <p>© Copyright 2026 Sports Warehouse. All rights reserved. Website made by Awesomesauce Design and Cynthia Burns.</p>
                </div>
            </div>
        </footer>
    </div>
    <script src="{{ asset('js/slideshow.js') }}" defer></script>
</body>

</html>