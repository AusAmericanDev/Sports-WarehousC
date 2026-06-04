@extends('layouts.app')

@section('content')
<div class="confirmation-container" style="max-width: 600px; margin: 60px auto; padding: 40px; text-align: center; font-family: 'Open Sans', sans-serif; border: 1px solid #e2e8f0; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); background: #white;">
    <div style="margin-bottom: 20px;">
        <span style="font-size: 64px; color: #10b981;">✓</span>
    </div>

    <h1 style="color: #0c232e; margin-bottom: 10px; font-weight: 400;">Thank You for Your Order!</h1>
    <p style="color: #64748b; font-size: 16px; margin-bottom: 30px;">Your payment has been successfully processed.</p>

    <div style="background: #f8fafc; padding: 20px; border-radius: 6px; margin-bottom: 30px;">
        <span style="font-size: 14px; text-transform: uppercase; letter-spacing: 1px; color: #94a3b8; font-weight: 600; display: block; margin-bottom: 5px;">Your Order Reference Number</span>
        <strong style="font-size: 32px; color: #0284c7; font-family: monospace;">SW-{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</strong>
    </div>

    <p style="color: #64748b; font-size: 14px; margin-bottom: 30px;">Please keep this order number for future reference regarding your delivery.</p>

    <a href="{{ url('/') }}" style="background: #0c232e; color: white; padding: 12px 24px; text-decoration: none; font-weight: bold; border-radius: 4px; display: inline-block;">
        Continue Shopping
    </a>
</div>
@endsection