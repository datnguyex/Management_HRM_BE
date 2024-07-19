<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TeamDetail;

class Team extends Model
{
    use HasFactory;

    protected $table = "teams";

    protected $fillable = [
        "name",
        "img",
        "managerID",
        "roomID",
        "brandID",
        "description",
    ];

    //Khóa ngoại
    public function member() {
        return $this->hasMany(TeamDetail::class, "teamID" ,"id");
    }

}
