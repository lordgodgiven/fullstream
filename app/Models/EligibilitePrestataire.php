<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EligibilitePrestataire extends Model
{
    protected $guarded = [];

    public function dossier_prestataire()
    {
        return $this->belongsTo(DossierPrestataire::class);
    }

    public function decision_eligibilite()
    {
        return $this->belongsTo(DecisionEligibilite::class);
    }

    public function etat_dossier()
    {
        return $this->belongsTo(EtatDossier::class);
    }
}
