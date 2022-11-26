<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }

    public function commande()
    {
        return $this->hasMany(Commande::class, 'id_clients');
    }

    public function achat()
    {
        return $this->hasMany(Vente::class, 'id_clients');
    }
}
