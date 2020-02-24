<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DecisionEligibilitePrestataire extends Model
{


    protected $guarded = [];
    protected $with = ['avis_decision'];


    public function avis_decision()
    {
        return $this->belongsTo(AvisDecision::class);
    }

    public function dossier_prestataire()
    {
        return $this->belongsTo(DossierPrestataire::class);
    }
}
