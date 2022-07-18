<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Plat;

class Restaurant extends Model
{
    use HasFactory;

    //Un restaurant a plusieurs plats
    public function plats()
    {
        return $this->hasMany(Plat::class, 'restaurants_id');
    }
    //Un restaurant a plusieurs personnes 
    public function personnes()
    {
         return $this->hasMany(Personne::class);
    }
    
    public function commandes()
    {
        return $this->belongsToMany(Commande::class);
    }
    public function addresses()
    {
        return $this->hasMany(Adresse::class);
    }
    public function prix()
    {
        return $this->belongsToMany(Prix::class);
    }
}
