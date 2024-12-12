<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Seller extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    // Explicitly define the guard
    protected $guard = 'seller';

    // Optionally, you can define the $fillable or $guarded properties if you want to make sure fields are mass assignable
    protected $fillable = [
        'name',
        'email',
        'password',
        'status'
    ];

    // Hide password and remember token from being serialized (JSON or API responses)
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
