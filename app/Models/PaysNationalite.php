<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaysNationalite extends Model
{
    protected $guarded = [];

    public function employeur()
    {
        return $this->hasMany(Employeur::class);
    }

    public function individus()
    {
        return $this->hasMany(Individu::class);
    }

    public function commune_villes()
    {
        return $this->hasMany(CommuneVille::class);
    }

    public function dossier_beneficiaires()
    {
        return $this->hasMany(DossierBeneficiaire::class);
    }

}
