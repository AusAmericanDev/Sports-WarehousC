@extends('layouts.app')

@section('content')
<main style="max-width: 1100px; margin: 40px auto; padding: 20px; font-family: 'Open Sans', sans-serif;">

    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom: 20px;">
        <h2 style="color: #333; margin:0;">Warehouse Inventory Items (Admin)</h2>
        <a href="{{ route('products.create') }}" style="background:#0284c7; color:white; text-decoration:none; padding:10px 16px; border-radius:4px; font-weight:600; font-size:0.9rem;">+ Add New Item</a>
    </div>

    @if(session('success'))
    <div style="background:#dcfce7; color:#166534; padding:12px; border-radius:4px; margin-bottom:20px; font-weight:600;">
        {{ session('success') }}
    </div>
    @endif

    <div style="background:#fff; border:1px solid #e2e8f0; border-radius:6px; overflow:hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
        <table style="width:100%; border-collapse:collapse; text-align:left;">
            <thead>
                <tr style="background:#f8fafc; border-bottom:1px solid #e2e8f0;">
                    <th style="padding:12px 15px; color:#475569; font-weight:600; width: 60px;">ID</th>
                    <th style="padding:12px 15px; color:#475569; font-weight:600;">Product Name</th>
                    <th style="padding:12px 15px; color:#475569; font-weight:600; width: 100px;">Base Price</th>
                    <th style="padding:12px 15px; color:#475569; font-weight:600; width: 100px;">Sale Price</th>
                    <th style="padding:12px 15px; color:#475569; font-weight:600; width: 100px; text-align:center;">Featured</th>
                    <th style="padding:12px 15px; color:#475569; font-weight:600; text-align:right; width: 150px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr style="border-bottom:1px solid #edf2f7;">
                    <td style="padding:12px 15px; color:#666;">{{ $product->id }}</td>
                    <td style="padding:12px 15px; color:#333; font-weight:600;">{{ $product->name }}</td>
                    <td style="padding:12px 15px; color:#333;">${{ number_format($product->price, 2) }}</td>
                    <td style="padding:12px 15px; color:#b91c1c; font-weight:600;">
                        {{ $product->sale_price ? '$' . number_format($product->sale_price, 2) : '-' }}
                    </td>
                    <td style="padding:12px 15px; text-align:center;">
                        <span style="padding:4px 8px; border-radius:12px; font-size:0.75rem; font-weight:bold; background: {{ $product->is_featured ? '#dcfce7; color:#166534;' : '#f1f5f9; color:#475569;' }}">
                            {{ $product->is_featured ? 'Yes' : 'No' }}
                        </span>
                    </td>
                    <td style="padding:12px 15px; text-align:right; display:flex; gap:8px; justify-content:flex-end; align-items: center;">
                        <a href="{{ route('products.edit', $product->id) }}" style="background:#e2e8f0; color:#333; text-decoration:none; padding:6px 12px; border-radius:4px; font-size:0.85rem; font-weight:600;">Edit</a>

                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Delete this inventory item?');" style="margin:0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background:#fee2e2; color:#991b1b; border:none; padding:6px 12px; border-radius:4px; cursor:pointer; font-size:0.85rem; font-weight:600;">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div style="margin-top: 25px;">
        <a href="{{ route('admin.dashboard') }}" style="color: #475569; text-decoration: none; font-size: 0.9rem; font-weight: 600;">➔ Return to Control Panel</a>
    </div>
</main>
@endsection