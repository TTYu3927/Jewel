<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_code',
        'description',
        'purchased_price',
        'sale_price',
        'stock_qty',
        'karats',
        'category_id',
        'gender',
        'image',

    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getFormattedIdAttribute()
    {
        return 'P' . str_pad($this->id, 4, '0', STR_PAD_LEFT);
    }
    public $timestamps = true;

}
