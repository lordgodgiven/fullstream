<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilCompteUtilisateur extends Model
{


    protected $guarded = [];
    protected $with = ['profil_utilisateur'];

    public function compte_utilisateur()
    {
        return $this->belongsTo(CompteUtilisateur::class);
    }

    public function profil_utilisateur()
    {
        return $this->belongsTo(ProfilUtilisateur::class);
    }
}
