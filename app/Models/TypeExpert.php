<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeExpert extends Model
{
    protected $guarded = [];

    public function dossier_prestataire()
    {
        return $this->hasMany(DossierPrestataire::class);
    }
}
