<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{

    protected $guarded = [];


    public function dossier_prestataires()
    {
        return $this->hasMany(DossierPrestataire::class);
    }

    public function dossier_beneficiaires()
    {
        return $this->hasMany(DossierBeneficiaire::class);
    }
}
