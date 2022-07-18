<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prix extends Model
{
    use HasFactory;

    public function restaurants(){
        return $this->belongsToMany(Restaurant::class);
    }
    public function plats()
    {
        return $this->belongsToMany(Plat::class);
    }
}
