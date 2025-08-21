<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\CustomerResetPasswordNotification;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'usertype',
        'phone',
        'date_of_birth',
        'address',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function sendPasswordResetNotification($token)
{
    $this->notify(new CustomerResetPasswordNotification($token));
}
}
