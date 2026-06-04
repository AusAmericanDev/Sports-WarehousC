<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Make sure 'email_address' is written exactly here:
    protected $fillable = [
        'first_name',
        'last_name',
        'delivery_address',
        'contact_number',
        'email_address',
        'card_number',
        'expiry_date',
        'card_name',
        'total_price'
    ];
}
