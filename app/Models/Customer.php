<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Customer extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'usertype',
        'phone',
        'date_of_birth',
        'address',
        'password'
    ];

    protected $routeMiddleware = [
        
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
    ];
    
}
