<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotationBeneficiaire extends Model
{

    protected $guarded = [];

    public function ligne_notations()
    {
        return $this->hasMany(LigneNotation::class);
    }

    public function dossier_prestataire()
    {
        return $this->belongsTo(DossierPrestataire::class);
    }

    public function dossier_beneficiaire()
    {
        return $this->belongsTo(DossierBeneficiaire::class);
    }

    public function famille_intervention()
    {
        return $this->belongsTo(FamilleIntervention::class);
    }

    public function dossier_mise_oeuvre()
    {
        return $this->hasMany(DossierMiseOeuvre::class);
    }
}
