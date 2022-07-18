<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    use HasFactory;

    public function roles()
    {
        return $this->hasMany(Role::class);
    }
    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }
    public function commandes()
    {
        return $this->belongsToMany(Commande::class);
    }
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
