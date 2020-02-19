<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilUtilisateur extends Model
{

    protected $guarded = [];
    protected $with = ['droits'];

    public function profil_compte_users()
    {
        return $this->hasMany(ProfilCompteUtilisateur::class);
    }

    public function droits()
    {
        return $this->belongsToMany(Droit::class, 'droit_habilitations')->withTimestamps();
    }
}
