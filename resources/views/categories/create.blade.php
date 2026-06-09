@extends('layouts.app')

@section('content')
<main style="max-width: 600px; margin: 40px auto; padding: 20px; font-family: 'Open Sans', sans-serif;">
    <h2 style="color: #333; margin-bottom: 20px;">Create Store Category</h2>

    <form action="{{ route('categories.store') }}" method="POST" style="background:#fff; border:1px solid #e2e8f0; padding:25px; border-radius:6px;">
        @csrf
        <div style="margin-bottom:20px;">
            <label style="display:block; margin-bottom:5px; font-weight:600; color:#444;">Category Name *</label>
            <input type="text" name="name" required style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px;">
        </div>

        <div style="display:flex; gap:10px; justify-content:flex-end;">
            <a href="{{ route('admin.dashboard') }}" style="background:#e2e8f0; color:#333; padding:10px 20px; text-decoration:none; border-radius:4px;">Cancel</a>
            <button type="submit" style="background:#0c232e; color:white; padding:10px 20px; border:none; border-radius:4px; cursor:pointer; font-weight:bold;">Save Category</button>
        </div>
    </form>
</main>
@endsection