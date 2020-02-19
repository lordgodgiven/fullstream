<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DroitHabilitation extends Model
{


    protected $guarded = [];

    public function fonctionnalite()
    {
        return $this->belongsTo(ProfilUtilisateur::class);
    }

    public function droit()
    {
        return $this->belongsTo(Droit::class);
    }

    public function profil_utilisateur()
    {
        return $this->belongsTo(ProfilUtilisateur::class);
    }
}
