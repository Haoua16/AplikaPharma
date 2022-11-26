<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    /*public function commande()
    {
        return $this->belongsTo(Client::class, 'id_clients');
    }*/

    public function operation_recente()
    {
        return $this->hasMany(Commande::class, 'id_commandes');
    }

    public function medicament()
    {
        return $this->belongsTo(Medicament::class, 'id_medicaments');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_clients');
    }
}
