<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Account extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $guard = 'account';

    protected $fillable = [
        'email',
        'username',
        'password',
    ];
    protected $hidden = [
        'password'
    ];

}
