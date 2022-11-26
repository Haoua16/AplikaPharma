<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    use HasFactory;

    public function user()
    {
        // Ici id_users represente les personnes qui peuvent effectuer les operations de vente

        return $this->belongsTo(User::class, 'id_users');
    }


    public function operation_recente()
    {
        return $this->hasMany(Vente::class, 'id_ventes');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_clients');
    }
}
