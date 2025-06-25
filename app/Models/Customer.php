<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'order_quantity',
        'purchased_amount',
        'status',
        'last_login',
    ];

    protected $casts = [
        'last_login' => 'datetime',
    ];
}
