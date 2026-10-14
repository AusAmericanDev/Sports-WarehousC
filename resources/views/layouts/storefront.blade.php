<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sports Warehouse</title>
    <meta name="description" content="Sports Warehouse offers quality sports gear, balls, apparel, protective equipment, and fitness accessories at competitive online prices." />
    {{-- Self-hosted Open Sans (variable, latin): no third-party connections, no render-blocking font CSS --}}
    <link rel="preload" href="{{ asset('fonts/open-sans-latin-wght-normal.woff2') }}" as="font" type="font/woff2" crossorigin />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ filemtime(public_path('css/style.css')) }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.prod.js"></script>
</head>

<body>
    @include('partials.icons')
    <a href="#main-content" class="skip-link">Skip to main content</a>

    <div class="site-wrapper">
        <header class="site-header">
            <input type="checkbox" id="menu-toggle-check" class="visually-hidden" />
            <nav class="top-nav" aria-label="Mobile navigation">
                <label for="menu-toggle-check" class="menu-toggle">
                    <svg class="icon bars-icon" aria-hidden="true" focusable="false">
                        <use href="#icon-bars"></use>
                    </svg>
                    <svg class="icon close-icon" aria-hidden="true" focusable="false">
                        <use href="#icon-xmark"></use>
                    </svg>
                    <span class="menu-text">Menu</span>
                </label>

                <div class="cart-info">
                    <a href="{{ route('cart.index') }}">
                        <svg class="icon" aria-hidden="true" focusable="false">
                            <use href="#icon-cart"></use>
                        </svg>
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
                        <li><a href="{{ route('storefront.products') }}">View Products</a></li>
                        <li class="nav-spacer" aria-hidden="true"></li>

                        <li class="nav-login">
                            <a href="{{ route('login') }}">
                                <svg class="icon icon-lock" aria-hidden="true" focusable="false">
                                    <use href="#icon-lock"></use>
                                </svg> Login
                            </a>
                        </li>

                        <li class="nav-cart">
                            <a href="{{ route('cart.index') }}">
                                <svg class="icon" aria-hidden="true" focusable="false">
                                    <use href="#icon-cart"></use>
                                </svg>
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
                        <img src="{{ asset('images/sports-warehouse-logo-600.png') }}" alt="Sports Warehouse logo" width="600" height="82" />
                    </div>

                    <div class="search-container">
                        <form action="{{ url('/search') }}" method="GET" role="search" class="search-form">
                            <label for="site-search" class="visually-hidden">Search products</label>
                            <div class="search">
                                <input id="site-search" name="query" type="search" placeholder="Search products" value="{{ request('query') }}" />
                            </div>
                            <button type="submit" class="submit-btn">
                                <span class="search-icon-stack" aria-hidden="true">
                                    <svg class="icon search-icon-bg" aria-hidden="true" focusable="false">
                                        <use href="#icon-circle"></use>
                                    </svg>
                                    <svg class="icon search-icon-fg" aria-hidden="true" focusable="false">
                                        <use href="#icon-search"></use>
                                    </svg>
                                </span>
                                <span class="visually-hidden">Submit search</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <section class="product-categories">
                <div class="categories categories-track">
                    @foreach($navCategories as $category)
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
                        <li><a href="{{ route('storefront.products') }}">View Products</a></li>
                        <li><a href="#">Privacy policy</a></li>
                    </ul>
                </nav>

                <nav class="footer-categories" aria-labelledby="footer-categories-heading">
                    <h3 id="footer-categories-heading">Product categories</h3>
                    <ul>
                        @foreach($navCategories as $category)
                        <li><a href="/category/{{ $category->id }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </nav>

                <section class="contact-info">
                    <h3>Contact Sports Warehouse</h3>
                    <ul class="social-icons">
                        <li>
                            <a href="#" aria-label="Sports Warehouse on Facebook">
                                <svg class="icon" aria-hidden="true" focusable="false">
                                    <use href="#icon-facebook"></use>
                                </svg> Facebook
                            </a>
                        </li>
                        <li>
                            <a href="#" aria-label="Sports Warehouse on Twitter">
                                <svg class="icon" aria-hidden="true" focusable="false">
                                    <use href="#icon-twitter"></use>
                                </svg> Twitter
                            </a>
                        </li>
                        <li>
                            <a href="#" aria-label="Other contact options">
                                <svg class="icon" aria-hidden="true" focusable="false">
                                    <use href="#icon-send"></use>
                                </svg> Other
                            </a>
                        </li>
                    </ul>
                </section>
            </div>
            <!-- ================================================================= -->
            <!-- FEATURE 1: JS FRAMEWORK (VUE.JS) NEWSLETTER SIGN-UP FORM POC       -->
            <!-- ================================================================= -->
            <section id="vue-newsletter-app" class="newsletter-section" style="background: #002b49; color: #fff; padding: 40px 20px; margin-top: 40px; font-family: sans-serif;">
                <div style="max-width: 600px; margin: 0 auto;">
                    <h2 style="color: #ff6600; margin-bottom: 8px;">Stay in the Game – Newsletter Sign-up</h2>
                    <p style="font-size: 0.95rem; margin-bottom: 20px;">Subscribe for exclusive deals, new gear alerts, and local sports events.</p>

                    <!-- Success Banner -->
                    <div v-if="submitted" style="background: #28a745; color: white; padding: 15px; border-radius: 4px; margin-bottom: 15px;">
                        <strong>Success!</strong> Thank you, @{{ formData.name }}. You are subscribed to updates for <em>@{{ formData.category }}</em>
                    </div>

                    <!-- Reactive Form -->
                    <form v-else @submit.prevent="handleSubmit" novalidate style="display: flex; flex-direction: column; gap: 14px;">

                        <!-- Customer Name -->
                        <div>
                            <label for="nl-name" style="display: block; font-weight: bold; margin-bottom: 4px;">Customer Name: *</label>
                            <input
                                id="nl-name"
                                type="text"
                                v-model.trim="formData.name"
                                placeholder="Enter your full name"
                                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" />
                            <small v-if="errors.name" style="color: #ffb4a2; font-weight: bold; display: block; margin-top: 4px;">@{{ errors.name }}</small>
                        </div>

                        <!-- Customer Email -->
                        <div>
                            <label for="nl-email" style="display: block; font-weight: bold; margin-bottom: 4px;">Email Address: *</label>
                            <input
                                id="nl-email"
                                type="email"
                                v-model.trim="formData.email"
                                placeholder="example@domain.com"
                                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" />
                            <small v-if="errors.email" style="color: #ffb4a2; font-weight: bold; display: block; margin-top: 4px;">@{{ errors.email }}</small>
                        </div>

                        <!-- Main Product Category of Interest (Dropdown) -->
                        <div>
                            <label for="nl-category" style="display: block; font-weight: bold; margin-bottom: 4px;">Main Product Category of Interest: *</label>
                            <select
                                id="nl-category"
                                v-model="formData.category"
                                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
                                <option value="">-- Please select a category --</option>
                                <option value="Balls">Balls</option>
                                <option value="Tops">Tops</option>
                                <option value="Pants">Pants</option>
                                <option value="Equipment">Equipment</option>
                                <option value="Training Gear">Training Gear</option>
                            </select>
                            <small v-if="errors.category" style="color: #ffb4a2; font-weight: bold; display: block; margin-top: 4px;">@{{ errors.category }}</small>
                        </div>

                        <button
                            type="submit"
                            style="background: #ff6600; color: #fff; border: none; padding: 12px; font-size: 1rem; font-weight: bold; border-radius: 4px; cursor: pointer; margin-top: 10px;">
                            Subscribe Now
                        </button>
                    </form>
                </div>
            </section>

            <!-- ================================================================= -->
            <!-- FEATURE 2: CUSTOMER SERVICE FAQ CHATBOT PROOF OF CONCEPT WIDGET    -->
            <!-- ================================================================= -->
            <div id="sw-chatbot-root">
                <!-- Floating Button -->
                <button
                    id="sw-chat-toggle"
                    aria-label="Open Sports Warehouse Customer Support Chatbot"
                    style="position: fixed; bottom: 25px; right: 25px; background: #ff6600; color: white; border: none; border-radius: 50%; width: 60px; height: 60px; font-size: 26px; cursor: pointer; box-shadow: 0 4px 12px rgba(0,0,0,0.3); z-index: 99999;">
                    💬
                </button>

                <!-- Chat Window -->
                <div
                    id="sw-chat-window"
                    style="display: none; position: fixed; bottom: 95px; right: 25px; width: 340px; height: 460px; background: #fff; border-radius: 8px; box-shadow: 0 5px 25px rgba(0,0,0,0.25); flex-direction: column; overflow: hidden; z-index: 99999; font-family: sans-serif; border: 1px solid #ddd;">
                    <!-- Header -->
                    <div style="background: #002b49; color: #fff; padding: 14px; display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <strong style="font-size: 1rem; display: block;">Sports Warehouse Assistant</strong>
                            <span style="font-size: 0.75rem; color: #8bc34a;">● Online | Automated FAQ Support</span>
                        </div>
                        <button id="sw-chat-close" style="background: transparent; border: none; color: #fff; font-size: 18px; cursor: pointer;" aria-label="Close Chat">✖</button>
                    </div>

                    <!-- Messages Container -->
                    <div id="sw-chat-messages" style="flex: 1; padding: 14px; overflow-y: auto; background: #f8f9fa; display: flex; flex-direction: column; gap: 10px;">
                        <div style="background: #e9ecef; color: #333; padding: 10px; border-radius: 8px 8px 8px 0; max-width: 85%; font-size: 0.9rem;">
                            Hi! I'm your automated assistant. Ask me about <strong>shipping</strong>, <strong>returns</strong>, <strong>store hours</strong>, or <strong>orders</strong>!
                        </div>
                    </div>

                    <!-- Input Box -->
                    <form id="sw-chat-form" style="display: flex; border-top: 1px solid #ddd; margin: 0;">
                        <input
                            id="sw-chat-input"
                            type="text"
                            placeholder="Type your question..."
                            style="flex: 1; border: none; padding: 12px; font-size: 0.9rem; outline: none;"
                            required />
                        <button
                            type="submit"
                            style="background: #ff6600; color: #fff; border: none; padding: 0 16px; font-weight: bold; cursor: pointer;">
                            Send
                        </button>
                    </form>
                </div>
            </div>
            <div class="sub-footer">
                <div class="copyright">
                    <p>© Copyright 2026 Sports Warehouse. All rights reserved. Website made by Awesomesauce Design and Cynthia Burns.</p>
                </div>
            </div>
        </footer>
    </div>
    <script src="{{ asset('js/slideshow.js') }}" defer></script>

    <script>
        // ==========================================
        // 1. VUE.JS NEWSLETTER SIGN-UP LOGIC
        // ==========================================
        const {
            createApp
        } = Vue;

        createApp({
            data() {
                return {
                    formData: {
                        name: '',
                        email: '',
                        category: ''
                    },
                    errors: {},
                    submitted: false
                };
            },
            methods: {
                validateEmail(email) {
                    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    return re.test(email);
                },
                handleSubmit() {
                    this.errors = {};

                    if (!this.formData.name) {
                        this.errors.name = 'Customer name is required.';
                    }

                    if (!this.formData.email) {
                        this.errors.email = 'A valid email address is required.';
                    } else if (!this.validateEmail(this.formData.email)) {
                        this.errors.email = 'Please provide a valid email format (e.g. name@domain.com).';
                    }

                    if (!this.formData.category) {
                        this.errors.category = 'Please choose your main product category of interest.';
                    }

                    // If no errors, mark as submitted (Proof of Concept - no DB needed)
                    if (Object.keys(this.errors).length === 0) {
                        this.submitted = true;
                    }
                }
            }
        }).mount('#vue-newsletter-app');


        // ==========================================
        // 2. CHATBOT FAQ-MATCHING LOGIC
        // ==========================================
        document.addEventListener('DOMContentLoaded', () => {
            const toggleBtn = document.getElementById('sw-chat-toggle');
            const chatWindow = document.getElementById('sw-chat-window');
            const closeBtn = document.getElementById('sw-chat-close');
            const chatForm = document.getElementById('sw-chat-form');
            const chatInput = document.getElementById('sw-chat-input');
            const messagesContainer = document.getElementById('sw-chat-messages');

            // Official Sports Warehouse FAQ Database from CI_ResearchAndQuality_AE_pro2of2_Part5_FAQ.docx
            const faqs = [{
                    keywords: ['payment', 'pay', 'visa', 'mastercard', 'amex', 'paypal', 'method'],
                    reply: 'We accept Visa, MasterCard, American Express, and PayPal.'
                },
                {
                    keywords: ['stock', 'out of stock', 'sold out', 'missing item'],
                    reply: "If an item you've ordered is sold out, we will ship all other products and confirm the plan for the missing items. We will refund payment if the item cannot be supplied."
                },
                {
                    keywords: ['return', 'refund', 'policy', 'exchange'],
                    reply: 'See our detailed policy pages on our website for full information.'
                },
                {
                    keywords: ['security', 'secure', 'safe', 'encryption', 'protect'],
                    reply: 'Your personal information and payment information is protected by several leading technologies including encryption during the transport of data and while it is being stored (data at rest).'
                },
                {
                    keywords: ['where to send', 'return address', 'send return', 'label'],
                    reply: 'Use the return label that was sent to you after your enquiry and refer to the physical address provided.'
                },
                {
                    keywords: ['international', 'overseas', 'ship internationally'],
                    reply: 'No, international shipping is not currently available.'
                },
                {
                    keywords: ['pick up', 'pickup', 'click and collect', 'collect'],
                    reply: 'No, all items will be delivered to the provided delivery address.'
                },
                {
                    keywords: ['po box', 'post office box', 'p.o. box'],
                    reply: 'Yes, we deliver to any PO Box address in Australia.'
                },
                {
                    keywords: ['track', 'tracking', 'order status', 'where is my order'],
                    reply: 'Use the tracking information provided via email or log into your account online and view the order information for more details.'
                },
                {
                    keywords: ['personal data', 'privacy', 'data', 'handle data'],
                    reply: 'Your personal data is kept secure on all of our servers and equipment, and is only accessible and viewable by authorised employees. Your personal details will not be shared with third parties outside of the agreed use cases and certainly will not be sold to third parties.'
                },
                {
                    keywords: ['store payment', 'save card', 'credit card details'],
                    reply: "No, we never store payment details. We use reputable payment gateways to safely and securely process your payments so that we don't have to!"
                },
                {
                    keywords: ['brand', 'brands', 'nike', 'adidas', 'reebok', 'skins'],
                    reply: 'We have a huge selection of popular brands including Nike, Adidas, Reebok, Skins and many more!'
                },
                {
                    keywords: ['type of product', 'products do you sell', 'what do you sell', 'range'],
                    reply: 'We sell balls, pants, equipment, tops, and much more! View our full range of product categories on the home page of our website.'
                },
                {
                    keywords: ['find product', 'search', 'find quickly'],
                    reply: 'Use our helpful search feature to quickly and easily find the products you are looking for. You can also browse for a product using our category menu/navigation, or look for featured products on the home page.'
                }
            ];

            function toggleChat() {
                const isHidden = chatWindow.style.display === 'none' || chatWindow.style.display === '';
                chatWindow.style.display = isHidden ? 'flex' : 'none';
                if (isHidden) chatInput.focus();
            }

            toggleBtn.addEventListener('click', toggleChat);
            closeBtn.addEventListener('click', toggleChat);

            chatForm.addEventListener('submit', (e) => {
                e.preventDefault();
                const query = chatInput.value.trim();
                if (!query) return;

                // Append User Message
                const userMsg = document.createElement('div');
                userMsg.style.cssText = 'background: #002b49; color: #fff; padding: 10px; border-radius: 8px 8px 0 8px; max-width: 85%; align-self: flex-end; font-size: 0.9rem;';
                userMsg.textContent = query;
                messagesContainer.appendChild(userMsg);

                chatInput.value = '';
                messagesContainer.scrollTop = messagesContainer.scrollHeight;

                // AI/Keyword Matching
                const lowerQuery = query.toLowerCase();
                let matchedReply = "I'm sorry, I couldn't find a direct match for that question. For specific assistance, please contact our support team at support@sportswarehouse.com.au.";

                for (const faq of faqs) {
                    if (faq.keywords.some(kw => lowerQuery.includes(kw))) {
                        matchedReply = faq.reply;
                        break;
                    }
                }

                // Bot Typing Delay
                setTimeout(() => {
                    const botMsg = document.createElement('div');
                    botMsg.style.cssText = 'background: #e9ecef; color: #333; padding: 10px; border-radius: 8px 8px 8px 0; max-width: 85%; font-size: 0.9rem;';
                    botMsg.innerHTML = matchedReply;
                    messagesContainer.appendChild(botMsg);
                    messagesContainer.scrollTop = messagesContainer.scrollHeight;
                }, 450);
            });
        });
    </script>
</body>

</html>