<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendeur extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
    // cette fonction explique qu'un utilisateur peut effectuer plusieurs ventes
    public function vente()
    {
        return $this->hasMany(Vente::class, 'id_users');
    }
}
