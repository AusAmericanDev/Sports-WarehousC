@extends('layouts.app')

@section('content')
<main class="text-page-container">
    <h2 class="page-main-heading">
        Contact Sports Warehouse
    </h2>
    <p class="page-intro-text">
        Have a question about our sports gear or need help with an order? Send us a message and our team will get back to you as soon as possible.
    </p>

    <form action="#" method="POST" class="custom-contact-form">
        @csrf

        <div class="form-group-block">
            <label for="name" class="form-input-label">Full Name</label>
            <input type="text" id="name" name="name" class="form-text-input" placeholder="Your name" required>
        </div>

        <div class="form-group-block">
            <label for="email" class="form-input-label">Email Address</label>
            <input type="email" id="email" name="email" class="form-text-input" placeholder="you@example.com" required>
        </div>

        <div class="form-group-block">
            <label for="subject" class="form-input-label">Subject</label>
            <input type="text" id="subject" name="subject" class="form-text-input" placeholder="What is this regarding?" required>
        </div>

        <div class="form-group-block">
            <label for="message" class="form-input-label">Your Message</label>
            <textarea id="message" name="message" class="form-textarea-input" rows="6" placeholder="Type your message here..." required></textarea>
        </div>

        <div class="form-submit-block">
            <button type="button" onclick="alert('Thank you for contacting Sports Warehouse! This prototype form submission was successful.');" class="form-submit-btn">
                Send Message
            </button>
        </div>
    </form>
</main>
@endsection