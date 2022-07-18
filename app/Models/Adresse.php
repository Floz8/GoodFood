<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;

        //L'adresse appartient à un fournisseur
    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }
    public function commandes()
    {
        return $this->belongsToMany(Adresse::class);
    }
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

}
