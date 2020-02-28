<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EligibilitePrestataire extends Model
{
    protected $guarded = [];

    public function dossier_prestataire()
    {
        return $this->belongsTo(DossierPrestataire::class)->withDefault();
    }

    public function decision_eligibilite()
    {
        return $this->belongsTo(DecisionEligibilite::class)->withDefault();
    }

    public function etat_dossier()
    {
        return $this->belongsTo(EtatDossier::class)->withDefault();
    }
}
