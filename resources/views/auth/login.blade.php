@extends('layouts.storefront')

@section('content')
<main style="max-width: 500px; margin: 60px auto; padding: 30px; font-family: 'Open Sans', sans-serif; border: 1px solid #e2e8f0; border-radius: 8px; background: #ffffff; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">

    <h2 style="color: #333; margin-top: 0; margin-bottom: 20px; font-size: 1.75rem; text-align: center; font-weight: 700;">
        Staff Login
    </h2>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div style="margin-bottom: 20px;">
            <label for="email" style="display: block; color: #475569; font-weight: 600; font-size: 0.9rem; margin-bottom: 6px;">Email Address</label>
            <input id="email" type="text" name="email" value="admin" required autofocus autocomplete="username"
                style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 4px; font-family: 'Open Sans', sans-serif; font-size: 0.95rem; box-sizing: border-box;" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div style="margin-bottom: 20px;">
            <label for="password" style="display: block; color: #475569; font-weight: 600; font-size: 0.9rem; margin-bottom: 6px;">Password</label>
            <input id="password" type="password" name="password" value="password" required autocomplete="current-password"
                style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 4px; font-family: 'Open Sans', sans-serif; font-size: 0.95rem; box-sizing: border-box;" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div style="margin-bottom: 25px; display: flex; align-items: center;">
            <input id="remember_me" type="checkbox" name="remember" style="margin-right: 8px; width: 16px; height: 16px; cursor: pointer;">
            <label for="remember_me" style="color: #64748b; font-size: 0.85rem; user-select: none; cursor: pointer;">Remember this device</label>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center;">
            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" style="color: #475569; text-decoration: underline; font-size: 0.85rem;">
                Forgot password?
            </a>
            @endif

            <button type="submit" style="background: #0c232e; color: white; border: none; padding: 12px 24px; border-radius: 4px; font-size: 0.95rem; font-weight: 600; cursor: pointer; transition: background 0.2s;">
                Log In
            </button>
        </div>
    </form>
</main>
@endsection