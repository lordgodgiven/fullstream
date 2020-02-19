<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeCompte extends Model
{

    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function compte_utilisateurs()
    {
        return $this->hasMany(CompteUtilisateur::class);
    }
}
