@extends('layouts.app')

@section('content')
<main style="max-width: 600px; margin: 40px auto; padding: 20px; font-family: 'Open Sans', sans-serif;">
    <h2 style="color: #333; margin-bottom: 20px;">Edit Store Category</h2>

    @if($errors->any())
    <div style="background: #fee2e2; color: #991b1b; padding: 12px; border-radius: 4px; margin-bottom: 20px; font-size: 0.9rem;">
        <ul style="margin: 0; padding-left: 20px;">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('categories.update', $category->id) }}" method="POST" style="background:#fff; border:1px solid #e2e8f0; padding:25px; border-radius:6px; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
        @csrf
        @method('PUT') <div style="margin-bottom:20px;">
            <label style="display:block; margin-bottom:5px; font-weight:600; color:#444;">Category Name *</label>
            <input type="text" name="name" value="{{ old('name', $category->name) }}" required style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px;">
        </div>

        <div style="display:flex; gap:10px; justify-content:flex-end;">
            <a href="{{ route('categories.index') }}" style="background:#e2e8f0; color:#333; padding:10px 20px; text-decoration:none; border-radius:4px; font-size:0.9rem;">Cancel</a>
            <button type="submit" style="background:#0c232e; color:white; padding:10px 20px; border:none; border-radius:4px; cursor:pointer; font-weight:bold; font-size:0.9rem;">Update Category</button>
        </div>
    </form>
</main>
@endsection