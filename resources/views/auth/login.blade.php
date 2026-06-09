@extends('layouts.app')

@section('content')
<main style="max-width: 450px; margin: 60px auto; padding: 30px; font-family: 'Open Sans', sans-serif; border: 1px solid #e2e8f0; border-radius: 8px; background: #fff; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
    <h2 style="color: #333; font-weight: 400; margin-bottom: 25px; text-align: center;">Staff Login</h2>

    @if(session('error'))
    <div style="background: #fee2e2; color: #991b1b; padding: 10px; border-radius: 4px; margin-bottom: 15px; font-size: 0.9rem;">
        {{ session('error') }}
    </div>
    @endif

    <form action="{{ url('/login') }}" method="POST">
        @csrf
        <div style="margin-bottom: 15px;">
            <label style="display:block; margin-bottom:5px; font-size:0.9rem; color:#555;">Username / Email *</label>
            <input type="text" name="email" required style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px;">
        </div>

        <div style="margin-bottom: 25px;">
            <label style="display:block; margin-bottom:5px; font-size:0.9rem; color:#555;">Password *</label>
            <input type="password" name="password" required style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px;">
        </div>

        <button type="submit" style="width: 100%; background: #0c232e; color: white; padding: 12px; border: none; border-radius: 4px; font-size: 1rem; font-weight: bold; cursor: pointer;">
            Login
        </button>
    </form>
</main>
@endsection