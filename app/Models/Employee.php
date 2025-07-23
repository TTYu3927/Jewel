<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'email',
        'password',
        'position',
        'status',
        'last_seen',
        'phone_number',
        'date_of_birth',
        'address',
    ];
}