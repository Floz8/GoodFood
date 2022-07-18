<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurant;

class Plat extends Model
{
    use HasFactory;

    public function restaurants()
    {
        return $this->belongsTo(Restaurant::class, 'id');
    }
    public function panier()
    {
        return $this->belongsToMany(Panier::class, 'id');
    }
    public function prix()
    {
        return $this->belongsToMany(Prix::class);
    }
}

