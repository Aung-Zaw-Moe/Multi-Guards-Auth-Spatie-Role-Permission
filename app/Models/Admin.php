<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    // Explicitly define the guard
    protected $guard = 'admin';  // This is the important part for specifying the correct guard

    // Mass assignable attributes
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
    ];

    // Hidden attributes
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
