<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function customer()
{
    return $this->belongsTo(Customer::class);
}

public function items()
{
    return $this->hasMany(OrderItem::class);
}

protected $fillable = ['customer_id', 'total_price', 'status', 'ordered_date'];


}
