<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens; // 👉 enables API tokens
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // 👉 fields allowed for mass assignment
    protected $fillable = [
        'name',
        'email',
        'password'
    ];
}
