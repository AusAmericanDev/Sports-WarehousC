@extends('layouts.app')

@section('content')
<main style="max-width: 1000px; margin: 40px auto; padding: 20px; font-family: 'Open Sans', sans-serif;">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom: 30px;">
        <h2 style="color: #333; margin:0;">Staff Control Panel</h2>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" style="background:#ef4444; color:white; border:none; padding:8px 16px; border-radius:4px; cursor:pointer;">Logout</button>
        </form>
    </div>

    @if(session('success'))
    <div style="background:#dcfce7; color:#166534; padding:12px; border-radius:4px; margin-bottom:20px;">
        {{ session('success') }}
    </div>
    @endif

    <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        <div style="border:1px solid #e2e8f0; padding:20px; border-radius:6px; background:#white;">
            <h3 style="color:#0284c7; margin-top:0;">Manage Categories</h3>
            <p style="color:#666; font-size:0.9rem;">Add, edit, or remove store classification categories.</p>
            <div style="margin-top:20px; display:flex; gap:10px;">
                <a href="{{ route('categories.index') }}" style="background:#0c232e; color:white; text-decoration:none; padding:10px 20px; border-radius:4px; font-size:0.9rem; font-weight:600;">View Categories</a>
                <a href="{{ route('categories.create') }}" style="background:#edf2f7; color:#333; text-decoration:none; padding:10px 20px; border-radius:4px; font-size:0.9rem; font-weight:600;">+ Add New</a>
            </div>
        </div>

        <div style="border:1px solid #e2e8f0; padding:20px; border-radius:6px; background:#white;">
            <h3 style="color:#0284c7; margin-top:0;">Manage Inventory Items</h3>
            <p style="color:#666; font-size:0.9rem;">Modify warehouse items, manage dynamic sorting pricing, and view stock lines.</p>
            <div style="margin-top:20px; display:flex; gap:10px;">
                <a href="{{ route('products.index') }}" style="background:#0c232e; color:white; text-decoration:none; padding:10px 20px; border-radius:4px; font-size:0.9rem; font-weight:600;">View Items</a>
                <a href="{{ route('products.create') }}" style="background:#edf2f7; color:#333; text-decoration:none; padding:10px 20px; border-radius:4px; font-size:0.9rem; font-weight:600;">+ Add New</a>
            </div>
        </div>
    </div>

    <div style="margin-top:30px; text-align:center; border-top:1px solid #eee; padding-top:20px;">
        <a href="{{ route('admin.password') }}" style="color:#475569; text-decoration:underline; font-size:0.9rem;">🔒 Change Security Password</a>
    </div>
</main>
@endsection