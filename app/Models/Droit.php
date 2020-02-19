<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Droit extends Model
{

    protected $guarded = [];


    public function profil_utilisateurs()
    {
        return $this->belongsToMany(ProfilUtilisateur::class, 'droit_habilitations')->withTimestamps();
    }
}
