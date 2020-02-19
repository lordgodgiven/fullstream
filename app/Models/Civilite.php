<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Civilite extends Model
{

    protected $guarded = [];


    public function individus()
    {
        return $this->hasMany(Individu::class);
    }

    public function compte_utilisateurs()
    {
        return $this->hasMany(CompteUtilisateur::class);
    }
}
