<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
  
    protected $fillable = [
        'manager_id',
        'brand_id',
        'departments_name'
    ];
}
