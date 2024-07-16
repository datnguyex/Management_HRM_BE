<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Employee extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $guard = 'employee';
    
    protected $fillable = [
        'department_id',
        'fullName',
        'DOB',
        'phone',
        'img',
        'email',
        'address',
    ];
    protected $hidden = [
      
    ];
}
