<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;

    public function commandes()
    {
        return $this->belongsToMany(Commande::class);
    }
    public function addresses()
    {
        return $this->hasMany(Adresse::class);
    }
    public function personnes()
    {
        return $this->hasMany(Personne::class);
    }
}
