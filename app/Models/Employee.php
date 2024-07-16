<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = "employees";

    protected $fillable = [
        'fullname',
        'nickname',
        'img',
        'address',
        'phone',
        'dob',
        'sex',
        'email',
        'start_date',
        'finish_date',
        'type',
        'position',
        'state_work'
    ];
}
