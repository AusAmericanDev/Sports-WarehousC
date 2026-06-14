@extends('layouts.storefront')

@section('content')
<main style="max-width: 650px; margin: 40px auto; padding: 0 20px; font-family: sans-serif;">

    <h2 style="font-size: 2.2rem; font-weight: 700; color: #1a202c; margin: 0 0 10px 0;">Contact Sports Warehouse</h2>

    <p style="font-size: 1.1rem; color: #4a5568; line-height: 1.6; margin: 0 0 30px 0;">
        Have a question about our sports gear or need help with an order? Send us a message and our team will get back to you shortly.
    </p>

    @if(session('success'))
    <div style="background-color: #d1e7dd; color: #0f5132; border: 1px solid #badbcc; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
        <strong>Success!</strong> {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('contact.index') }}" method="POST" style="background-color: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 30px; display: flex; flex-direction: column; gap: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
        @csrf

        <div style="display: flex; flex-direction: column; gap: 6px;">
            <label for="name" style="font-weight: 600; color: #2d3748; font-size: 0.95rem;">Full Name</label>
            <input type="text" id="name" name="name" placeholder="Your name" required style="width: 100%; padding: 11px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 1rem; box-sizing: border-box; background-color: #ffffff;" />
        </div>

        <div style="display: flex; flex-direction: column; gap: 6px;">
            <label for="email" style="font-weight: 600; color: #2d3748; font-size: 0.95rem;">Email Address</label>
            <input type="email" id="email" name="email" placeholder="you@example.com" required style="width: 100%; padding: 11px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 1rem; box-sizing: border-box; background-color: #ffffff;" />
        </div>

        <div style="display: flex; flex-direction: column; gap: 6px;">
            <label for="subject" style="font-weight: 600; color: #2d3748; font-size: 0.95rem;">Subject</label>
            <input type="text" id="subject" name="subject" placeholder="What is this regarding?" required style="width: 100%; padding: 11px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 1rem; box-sizing: border-box; background-color: #ffffff;" />
        </div>

        <div style="display: flex; flex-direction: column; gap: 6px;">
            <label for="message" style="font-weight: 600; color: #2d3748; font-size: 0.95rem;">Your Message</label>
            <textarea id="message" name="message" rows="5" placeholder="Type your message here..." required style="width: 100%; padding: 11px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 1rem; font-family: sans-serif; resize: vertical; box-sizing: border-box; background-color: #ffffff; line-height: 1.5;"></textarea>
        </div>

        <div style="margin-top: 10px;">
            <button type="submit" style="background-color: #1a202c; color: #ffffff; padding: 13px 24px; font-size: 1.05rem; font-weight: 600; border: none; border-radius: 6px; cursor: pointer; width: 100%; transition: background-color 0.2s;">
                Send Message
            </button>
        </div>
    </form>
</main>
@endsection