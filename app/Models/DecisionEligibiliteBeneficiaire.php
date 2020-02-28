<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class DecisionEligibiliteBeneficiaire extends Model
{


    protected $guarded = [];
    protected $with = ['avis_decision'];


    public function avis_decision()
    {
        return $this->belongsTo(AvisDecision::class)->withDefault();
    }

    public function dossier_beneficiaire()
    {
        return $this->belongsTo(DossierBeneficiaire::class)->withDefault();
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }
}
