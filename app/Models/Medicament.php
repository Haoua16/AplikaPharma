<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    use HasFactory;

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class, 'id_fournisseurs');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
}
