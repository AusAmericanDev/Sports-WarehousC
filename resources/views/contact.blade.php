@extends('layouts.app')

@section('content')
<main style="max-width: 800px; margin: 0 auto; padding: 40px 20px;">
    <h2 style="color: var(--dark-blue); font-weight: 400; margin-bottom: 10px; border-bottom: 2px solid var(--orange); padding-bottom: 10px;">
        Contact Sports Warehouse
    </h2>
    <p style="color: var(--gray); margin-bottom: 30px;">
        Have a question about our sports gear or need help with an order? Send us a message and our team will get back to you as soon as possible.
    </p>

    <form action="#" method="POST" style="background: var(--white); border: 1px solid var(--border-gray); padding: 30px; border-radius: 8px; display: flex; flex-direction: column; gap: 20px;">
        @csrf

        <div style="display: flex; flex-direction: column; gap: 6px;">
            <label for="name" style="color: var(--dark-blue); font-weight: 600; font-size: 0.9rem;">Full Name</label>
            <input type="text" id="name" name="name" required style="width: 100%; height: 40px; padding: 0 12px; border: 1px solid var(--gray); border-radius: 4px; font-size: 1rem;" placeholder="Your name">
        </div>

        <div style="display: flex; flex-direction: column; gap: 6px;">
            <label for="email" style="color: var(--dark-blue); font-weight: 600; font-size: 0.9rem;">Email Address</label>
            <input type="email" id="email" name="email" required style="width: 100%; height: 40px; padding: 0 12px; border: 1px solid var(--gray); border-radius: 4px; font-size: 1rem;" placeholder="you@example.com" required>
        </div>

        <div style="display: flex; flex-direction: column; gap: 6px;">
            <label for="subject" style="color: var(--dark-blue); font-weight: 600; font-size: 0.9rem;">Subject</label>
            <input type="text" id="subject" name="subject" required style="width: 100%; height: 40px; padding: 0 12px; border: 1px solid var(--gray); border-radius: 4px; font-size: 1rem;" placeholder="What is this regarding?">
        </div>

        <div style="display: flex; flex-direction: column; gap: 6px;">
            <label for="message" style="color: var(--dark-blue); font-weight: 600; font-size: 0.9rem;">Your Message</label>
            <textarea id="message" name="message" rows="6" required style="width: 100%; padding: 12px; border: 1px solid var(--gray); border-radius: 4px; font-size: 1rem; font-family: inherit; resize: vertical;" placeholder="Type your message here..."></textarea>
        </div>

        <div style="text-align: right; margin-top: 10px;">
            <button type="button" onclick="alert('Thank you for contacting Sports Warehouse! This prototype form submission was successful.');" style="background: var(--orange); color: var(--white); border: 0; padding: 12px 30px; font-size: 1rem; font-weight: 600; border-radius: 4px; cursor: pointer; transition: background 0.2s ease;">
                Send Message
            </button>
        </div>
    </form>
</main>
@endsection