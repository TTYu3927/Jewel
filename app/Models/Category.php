<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    protected $fillable = ['name'];
    

    public function getFormattedIdAttribute()
    {
        return 'CT' . str_pad($this->id, 4, '0', STR_PAD_LEFT);
    }

}
