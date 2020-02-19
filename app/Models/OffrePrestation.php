<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OffrePrestation extends Model
{
    protected $guarded = [];

    public function eligibilite_offre_prestations()
    {
        return $this->hasMany(EligibiliteOffrePrestation::class);
    }

    public function dossier_prestataire()
    {
        return $this->belongsTo(DossierPrestataire::class);
    }

    public function famille_intervention()
    {
        return $this->belongsTo(FamilleIntervention::class);
    }

    public function sous_categorie()
    {
        return $this->belongsTo(SousCategorie::class);
    }

    public function zone_intervention()
    {
        return $this->belongsTo(ZoneIntervention::class);
    }

    public function visa_decision()
    {
        return $this->belongsTo(VisaDecision::class);
    }

    public function appreciation()
    {
        return $this->belongsTo(Appreciation::class);
    }
}
