<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationRecente extends Model
{
    use HasFactory;
    public function depense()
    {
        return $this->belongsTo(Depense::class, 'id_depenses');
    }
    public function vente()
    {
        return $this->belongsTo(Vente::class, 'id_ventes');
    }

    public function commande()
    {
        return $this->belongsTo(Commande::class, 'id_commandes');
    }
}
