<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    //to confirm
    public function addresses()
    {
        return $this->hasMany(Adresse::class);
    }
    //to confirm
    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class);
    }

    public function personnes()
    {
        return $this->belongsToMany(Personne::class);
    }
    public function fournisseur()
    {
        return $this->belongsToMany(Fournisseur::class);
    }
   
}
