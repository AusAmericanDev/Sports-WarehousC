@extends('layouts.app')

@section('content')
<main style="max-width: 800px; margin: 0 auto; padding: 40px 20px; line-height: 1.6;">
    <h2 style="color: var(--dark-blue); font-weight: 400; margin-bottom: 10px; border-bottom: 2px solid var(--orange); padding-bottom: 10px;">
        About Sports Warehouse
    </h2>

    <div style="color: var(--gray); display: flex; flex-direction: column; gap: 20px; margin-top: 20px;">
        <p>
            Welcome to <strong>Sports Warehouse</strong>, your premier destination for high-quality sports gear, apparel, and equipment. Founded with a passion for athletics and outdoor performance, we strive to provide athletes of all levels—from weekend warriors to seasoned professionals—with the tools they need to succeed.
        </p>

        <h3 style="color: var(--mid-blue); font-weight: 400; margin-top: 10px;">Our Mission</h3>
        <p>
            Our mission is simple: to make top-tier sporting equipment accessible, affordable, and easy to find. We partner with the world’s leading brands—including Nike, Adidas, Asics, and Wilson—to bring you a carefully curated selection of genuine gear that you can rely on when it matters most.
        </p>

        <h3 style="color: var(--mid-blue); font-weight: 400; margin-top: 10px;">Why Shop With Us?</h3>
        <ul style="padding-left: 20px; display: flex; flex-direction: column; gap: 10px;">
            <li><strong>Premium Quality:</strong> We only stock authentic products from trusted global manufacturers.</li>
            <li><strong>Expert Service:</strong> Our team lives and breathes sports, meaning you always get knowledgeable support.</li>
            <li><strong>Community Driven:</strong> We are proud to support local clubs, junior leagues, and community sports initiatives.</li>
        </ul>

        <p style="margin-top: 20px; font-style: italic; text-align: center; color: var(--dark-blue);">
            "The best of the best is here."
        </p>
    </div>
</main>
@endsection