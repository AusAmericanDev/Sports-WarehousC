@extends('layouts.storefront')

@section('content')
<main style="max-width: 800px; margin: 40px auto; padding: 0 20px; font-family: sans-serif; line-height: 1.6;">
    <h2 style="font-size: 2.2rem; font-weight: 700; color: #1a202c; margin-bottom: 15px;">About Sports Warehouse</h2>
    <p style="font-size: 1.2rem; color: #4a5568; margin-bottom: 25px; font-weight: 500;">
        Welcome to <strong>Sports Warehouse</strong>, your premier destination for high-quality sports gear, apparel, and equipment.
    </p>

    <div style="color: #2d3748; font-size: 1.05rem; display: flex; flex-direction: column; gap: 20px;">
        <div>
            <h3 style="font-size: 1.4rem; color: #1a202c; margin: 0 0 8px 0; font-weight: 600;">Our Mission</h3>
            <p style="margin: 0;">
                Our mission is simple: to make top-tier sporting equipment accessible, affordable, and easy to find.
                We partner with the world's leading brands—including Nike, Adidas, Asics, and Wilson—to bring you a
                carefully curated selection of genuine gear that you can rely on when it matters most.
            </p>
        </div>

        <div>
            <h3 style="font-size: 1.4rem; color: #1a202c; margin: 0 0 8px 0; font-weight: 600;">Why Shop With Us?</h3>
            <ul style="margin: 0; padding-left: 20px; display: flex; flex-direction: column; gap: 8px;">
                <li><strong>Premium Quality:</strong> We only stock authentic products from trusted global manufacturers.</li>
                <li><strong>Expert Service:</strong> Our team lives and breathes sports, meaning you always get knowledgeable support.</li>
                <li><strong>Community Driven:</strong> We are proud to support local clubs, junior leagues, and community sports initiatives.</li>
            </ul>
        </div>

        <p style="font-style: italic; font-size: 1.2rem; color: #1a202c; font-weight: 600; text-align: center; margin-top: 15px; border-top: 1px solid #e2e8f0; padding-top: 20px;">
            "The best of the best is here."
        </p>
    </div>
</main>
@endsection