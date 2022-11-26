<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }


    public function operation_recente()
    {
        return $this->hasMany(Depense::class, 'id_depenses');
    }
}
