@extends('layouts.app')

@section('content')
<main style="max-width: 700px; margin: 40px auto; padding: 20px; font-family: 'Open Sans', sans-serif;">
    <h2 style="color: #333; margin-bottom: 20px;">Add New Inventory Item</h2>

    @if($errors->any())
    <div style="background: #fee2e2; color: #991b1b; padding: 12px; border-radius: 4px; margin-bottom: 20px; font-size: 0.9rem;">
        <ul style="margin: 0; padding-left: 20px;">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" style="background:#fff; border:1px solid #e2e8f0; padding:25px; border-radius:6px; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
        @csrf
        <div style="margin-bottom:15px;">
            <label style="display:block; margin-bottom:5px; font-weight:600; color:#444;">Product Name *</label>
            <input type="text" name="name" required style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px;">
        </div>
        <div style="margin-bottom:15px;">
            <label style="display:block; margin-bottom:5px; font-weight:600; color:#444;">Store Category Assignment *</label>
            <select name="category_id" required style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px; background:#fff;">
                <option value="">-- Choose a Category Selection --</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:15px; margin-bottom:15px;">
            <div>
                <label style="display:block; margin-bottom:5px; font-weight:600; color:#444;">Base Price ($) *</label>
                <input type="number" name="price" step="0.01" min="0" required style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px;">
            </div>
            <div>
                <label style="display:block; margin-bottom:5px; font-weight:600; color:#444;">Sale Discount Price ($)</label>
                <input type="number" name="sale_price" step="0.01" min="0" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px;">
            </div>
        </div>
        <div style="margin-bottom:15px;">
            <label style="display:block; margin-bottom:5px; font-weight:600; color:#444;">Item Specification Description</label>
            <textarea name="description" rows="4" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px; font-family: inherit;"></textarea>
        </div>
        <div style="margin-bottom:15px;">
            <label style="display:block; margin-bottom:5px; font-weight:600; color:#444;">Image File Name (e.g., ball_soccer.png)</label>
            <input type="text" name="image" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px;">
        </div>
        <div style="margin-bottom:25px; display:flex; align-items:center; gap:8px;">
            <input type="checkbox" name="is_featured" value="1" id="is_featured" style="width:16px; height:16px;">
            <label for="is_featured" style="font-weight:600; color:#444; cursor:pointer;">Promote and Feature Item on Store Homepage Highlight Bar</label>
        </div>
        <div style="display:flex; gap:10px; justify-content:flex-end;">
            <a href="{{ route('products.index') }}" style="background:#e2e8f0; color:#333; padding:10px 20px; text-decoration:none; border-radius:4px; font-size:0.9rem;">Cancel</a>
            <button type="submit" style="background:#0c232e; color:white; padding:10px 20px; border:none; border-radius:4px; cursor:pointer; font-weight:bold; font-size:0.9rem;">Save Item Entry</button>
        </div>
    </form>
</main>
@endsection