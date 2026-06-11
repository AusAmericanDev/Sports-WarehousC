@extends('layouts.app')

@section('content')
<main style="max-width: 1000px; margin: 40px auto; padding: 20px; font-family: 'Open Sans', sans-serif;">

    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom: 20px;">
        <h2 style="color: #333; margin:0;">Store Categories</h2>
        <a href="{{ route('categories.create') }}" style="background:#0284c7; color:white; text-decoration:none; padding:10px 16px; border-radius:4px; font-weight:600; font-size:0.9rem;">+ Add New Category</a>
    </div>

    @if(session('success'))
    <div style="background:#dcfce7; color:#166534; padding:12px; border-radius:4px; margin-bottom:20px; font-weight: 600;">
        {{ session('success') }}
    </div>
    @endif

    <div style="background:#fff; border:1px solid #e2e8f0; border-radius:6px; overflow:hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
        <table style="width:100%; border-collapse:collapse; text-align:left;">
            <thead>
                <tr style="background:#f8fafc; border-bottom:1px solid #e2e8f0;">
                    <th style="padding:12px 20px; color:#475569; font-weight:600;">ID</th>
                    <th style="padding:12px 20px; color:#475569; font-weight:600;">Category Name</th>
                    <th style="padding:12px 20px; color:#475569; font-weight:600; text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr style="border-bottom:1px solid #edf2f7;">
                    <td style="padding:12px 20px; color:#666;">{{ $category->id }}</td>
                    <td style="padding:12px 20px; color:#333; font-weight:600;">{{ $category->name }}</td>
                    <td style="padding:12px 20px; text-align:right; display:flex; gap:10px; justify-content:flex-end; align-items: center;">

                        <a href="{{ route('categories.edit', $category->id) }}" style="background:#e2e8f0; color:#333; text-decoration:none; padding:6px 12px; border-radius:4px; font-size:0.85rem; font-weight: 600;">Edit</a>

                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');" style="margin:0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background:#fee2e2; color:#991b1b; border:none; padding:6px 12px; border-radius:4px; cursor:pointer; font-size:0.85rem; font-weight: 600;">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div style="margin-top: 20px;">
        <a href="{{ route('admin.dashboard') }}" style="color: #666; text-decoration: none; font-size: 0.9rem;">➔ Back to Control Panel</a>
    </div>
</main>
@endsection